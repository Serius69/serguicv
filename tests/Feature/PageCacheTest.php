<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

/**
 * CacheStaticPages: cachea la home 120 min, pero NUNCA debe cachear (ni servir
 * desde caché) una respuesta con estado flash de sesión — de lo contrario el
 * "mensaje enviado" de un visitante quedaría publicado para todos.
 *
 * APP_ENV=testing ≠ local, así que el middleware está activo en estos tests.
 */
class PageCacheTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // La home consulta tasas de Tromay al renderizar
        Http::fake(['*' => Http::response([], 200)]);
    }

    public function test_home_is_cached_after_first_hit(): void
    {
        $this->get('/')->assertOk()->assertHeader('X-Cache', 'MISS');
        $this->get('/')->assertOk()->assertHeader('X-Cache', 'HIT');
    }

    public function test_cached_home_preserves_html_content_type(): void
    {
        $this->get('/');

        $contentType = $this->get('/')->headers->get('Content-Type', '');
        $this->assertStringContainsString('text/html', $contentType);
    }

    public function test_flash_success_bypasses_cache_entirely(): void
    {
        // Calentar el caché sin flash
        $this->get('/')->assertHeader('X-Cache', 'MISS');

        // Con flash: ni HIT (el usuario debe ver su mensaje) ni MISS (no se almacena)
        $this->withSession(['success' => '¡Mensaje enviado!'])
            ->get('/')
            ->assertOk()
            ->assertHeaderMissing('X-Cache')
            ->assertSee('¡Mensaje enviado!');
    }

    public function test_locales_are_cached_separately(): void
    {
        $this->get('/')->assertHeader('X-Cache', 'MISS');
        $this->get('/en')->assertOk()->assertHeader('X-Cache', 'MISS');
        $this->get('/en')->assertHeader('X-Cache', 'HIT');
    }
}
