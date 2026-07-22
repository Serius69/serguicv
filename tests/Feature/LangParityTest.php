<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Validación descrita en el README (job CI "test"): las claves de traducción
 * es/portfolio.php y en/portfolio.php deben ser idénticas (es == en).
 */
class LangParityTest extends TestCase
{
    private function flatten(array $arr, string $prefix = ''): array
    {
        $keys = [];
        foreach ($arr as $k => $v) {
            $key = $prefix === '' ? (string) $k : "{$prefix}.{$k}";
            if (is_array($v)) {
                $keys = array_merge($keys, $this->flatten($v, $key));
            } else {
                $keys[] = $key;
            }
        }
        return $keys;
    }

    public function test_es_and_en_portfolio_keys_match(): void
    {
        $es = $this->flatten(require base_path('lang/es/portfolio.php'));
        $en = $this->flatten(require base_path('lang/en/portfolio.php'));

        sort($es);
        sort($en);

        $missingInEn = array_values(array_diff($es, $en));
        $missingInEs = array_values(array_diff($en, $es));

        $this->assertSame([], $missingInEn, 'Claves presentes en es pero ausentes en en: ' . implode(', ', $missingInEn));
        $this->assertSame([], $missingInEs, 'Claves presentes en en pero ausentes en es: ' . implode(', ', $missingInEs));
        $this->assertSame($es, $en);
    }
}
