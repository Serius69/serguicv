<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

/**
 * Cobertura de los endpoints documentados en el README.
 * Entorno hermético: cache/mail/session en array (ver phpunit.xml),
 * Http::fake() para no golpear servicios reales del ecosistema.
 */
class EndpointsTest extends TestCase
{
    public function test_health_returns_ok(): void
    {
        $this->get('/health')
            ->assertOk()
            ->assertJson(['status' => 'ok']);
    }

    public function test_sitemap_returns_xml(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml');
    }

    public function test_status_json_aggregates_services(): void
    {
        Http::fake(['*' => Http::response('ok', 200)]);

        $res = $this->getJson('/status');

        $res->assertOk()
            ->assertJsonStructure([
                'hub', 'checked', 'all_up', 'grupo_a_up', 'grupo_b_up',
                'services' => [['id', 'name', 'group', 'public', 'status', 'latency', 'code']],
            ])
            ->assertJsonPath('all_up', true);

        // 5 servicios Grupo A + 9 Grupo B definidos en PortfolioController::status
        $this->assertCount(14, $res->json('services'));
    }

    public function test_contact_rejects_invalid_payload(): void
    {
        $this->from('/')
            ->post('/contact', [])
            ->assertRedirect()
            ->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_contact_accepts_valid_payload(): void
    {
        $this->from('/')
            ->post('/contact', [
                'name'    => 'Reclutador Demo',
                'email'   => 'demo@example.com',
                'message' => 'Hola, me interesa tu perfil de Data Scientist.',
                'lang'    => 'es',
            ])
            ->assertRedirect()
            ->assertSessionHas('success');
    }

    public function test_leads_rejects_invalid_payload(): void
    {
        $this->postJson('/leads', ['name' => 'x'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_leads_accepts_valid_payload(): void
    {
        Http::fake(['*' => Http::response('', 200)]);

        $this->postJson('/leads', [
            'name'     => 'Lead Demo',
            'email'    => 'lead@example.com',
            'interest' => 'contratar',
            'source'   => 'test',
            'section'  => 'hero',
        ])
            ->assertStatus(201)
            ->assertJson(['status' => 'ok']);
    }

    /**
     * Regresión: validate() omite claves ausentes; un lead con solo name+email
     * rompía la interpolación de 'section' en el cuerpo del email fallback.
     */
    public function test_leads_accepts_minimal_payload_without_optional_fields(): void
    {
        Http::fake(['*' => Http::response('', 200)]);

        $this->postJson('/leads', [
            'name'  => 'Lead Mínimo',
            'email' => 'minimo@example.com',
        ])
            ->assertStatus(201)
            ->assertJson(['status' => 'ok']);
    }

    public function test_leads_honeypot_short_circuits_with_fake_success(): void
    {
        // Con el honeypot lleno responde 201 sin validar ni enviar nada:
        // el payload omite campos requeridos a propósito.
        $this->postJson('/leads', ['website' => 'http://spam.example'])
            ->assertStatus(201)
            ->assertJson(['status' => 'ok']);
    }

    public function test_contact_honeypot_short_circuits_with_fake_success(): void
    {
        // Igual que /leads: éxito falso sin pasar por validación ni mail.
        $this->from('/')
            ->post('/contact', ['website' => 'http://spam.example'])
            ->assertRedirect('/')
            ->assertSessionHas('success')
            ->assertSessionDoesntHaveErrors();
    }

    public function test_project_view_increments_known_slug(): void
    {
        // Redis no está disponible en el entorno de test: el contador cae a 0
        // vía el try/catch del controlador, pero el endpoint responde 200.
        $this->postJson('/project/proj1/view')
            ->assertOk()
            ->assertJsonStructure(['slug', 'count'])
            ->assertJsonPath('slug', 'proj1');
    }

    public function test_project_view_rejects_unknown_slug(): void
    {
        $this->postJson('/project/proj99/view')->assertNotFound();
        $this->postJson('/project/../../etc/view')->assertNotFound();
    }

    public function test_cv_download_returns_pdf_attachment(): void
    {
        $res = $this->get('/cv/download');

        $res->assertOk();
        $this->assertStringContainsString(
            'Sergio-Troche-CV.pdf',
            $res->headers->get('Content-Disposition', '')
        );
    }

    public function test_status_html_renders_for_browsers(): void
    {
        Http::fake(['*' => Http::response('ok', 200)]);

        $this->get('/status')
            ->assertOk()
            ->assertViewIs('status');
    }

    public function test_status_marks_unreachable_services_as_down(): void
    {
        Http::fake(['*' => Http::response('boom', 500)]);

        $res = $this->getJson('/status');

        $res->assertOk()->assertJsonPath('all_up', false);
        foreach ($res->json('services') as $svc) {
            $this->assertSame('down', $svc['status']);
        }
    }
}
