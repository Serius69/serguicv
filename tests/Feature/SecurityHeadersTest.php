<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * El middleware global SecurityHeaders debe aplicar a toda respuesta.
 */
class SecurityHeadersTest extends TestCase
{
    public function test_security_headers_present_on_every_response(): void
    {
        $res = $this->get('/health');

        $res->assertOk()
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');

        $this->assertNotEmpty($res->headers->get('Permissions-Policy'));
        $this->assertNotEmpty($res->headers->get('Content-Security-Policy'));
    }

    public function test_csp_allows_ecosystem_api_calls_from_browser(): void
    {
        // El dashboard en vivo y el sandbox hacen fetch() a *.kapitalya.com.bo
        $csp = $this->get('/health')->headers->get('Content-Security-Policy', '');

        $this->assertStringContainsString('connect-src', $csp);
        $this->assertStringContainsString('https://*.kapitalya.com.bo', $csp);
    }

    public function test_csp_blocks_framing_and_objects(): void
    {
        $csp = $this->get('/health')->headers->get('Content-Security-Policy', '');

        $this->assertStringContainsString("frame-src 'none'", $csp);
        $this->assertStringContainsString("object-src 'none'", $csp);
        $this->assertStringContainsString("base-uri 'self'", $csp);
    }
}
