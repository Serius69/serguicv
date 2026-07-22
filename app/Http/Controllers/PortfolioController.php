<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class PortfolioController extends Controller
{
    private function getImagesFromFolder(string $folderRelative): array
    {
        $absPath = public_path($folderRelative);
        if (!is_dir($absPath)) return [];

        $images = [];
        $handle = opendir($absPath);
        if (!$handle) return [];

        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') continue;
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) continue;

            // Encode each path segment so special characters (spaces, ·, —) are URL-safe
            $segments = explode('/', $folderRelative);
            $encoded  = implode('/', array_map('rawurlencode', $segments));
            $images[] = url($encoded . '/' . rawurlencode($file));
        }
        closedir($handle);

        sort($images);
        return $images;
    }

    private function buildCoverUrl(string $folder, ?string $preferred, array $images): ?string
    {
        if ($preferred && file_exists(public_path("images/projects/{$folder}/{$preferred}"))) {
            return url('images/projects/' . rawurlencode($folder) . '/' . rawurlencode($preferred));
        }
        return $images[0] ?? null;
    }

    /**
     * Fuente única de verdad de los slugs de proyecto: la usan tanto
     * projectImages() como recordView() (validación de slug).
     */
    private function projectDefs(): array
    {
        return [
            // Original 6 projects
            'proj1'  => ['folder' => 'Kapitalya Forex AI',                                      'cover' => null],
            'proj2'  => ['folder' => 'Business Intelligence · Power BI Sistema BI Kapitalya',   'cover' => 'BI.webp'],
            'proj3'  => ['folder' => 'Findempro — Sector Lácteo',                               'cover' => 'findempro-ai.webp'],
            'proj4'  => ['folder' => 'Full Stack · Web Plataforma CNI Bolivia',                 'cover' => null],
            'proj5'  => ['folder' => 'Sistema de Riego Inteligente',                            'cover' => '07.webp'],
            'proj6'  => ['folder' => 'Findempro — Sector Lácteo',                               'cover' => 'findempro-lacteos1.webp'],
            // GitHub / data science projects (proj7–proj10 have no local images; proj11–12 do)
            'proj7'  => ['folder' => '',                                                         'cover' => null],
            'proj8'  => ['folder' => 'credit-scoring-latam',                                     'cover' => 'roc-auc.webp'],
            'proj9'  => ['folder' => 'portafolio-acciones-bolivia',                              'cover' => 'frontera-eficiente.webp'],
            'proj10' => ['folder' => '',                                                         'cover' => null],
            'proj11' => ['folder' => 'kioscoverdebo',                                            'cover' => 'Mesa de trabajo 1.webp'],
            'proj12' => ['folder' => 'Business Intelligence · Power BI Sistema BI Tromay',      'cover' => null],
            // Production kapitalya.com.bo services (proj13–proj20)
            'proj13' => ['folder' => '',                                                         'cover' => null],
            'proj14' => ['folder' => '',                                                         'cover' => null],
            'proj15' => ['folder' => '',                                                         'cover' => null],
            'proj16' => ['folder' => '',                                                         'cover' => null],
            'proj17' => ['folder' => '',                                                         'cover' => null],
            'proj18' => ['folder' => '',                                                         'cover' => null],
            'proj19' => ['folder' => '',                                                         'cover' => null],
            'proj20' => ['folder' => '',                                                         'cover' => null],
            // FX options valuation (Garman-Kohlhagen / Monte Carlo) — real code-output plots
            'proj21' => ['folder' => 'fx-options-market-maker',                                  'cover' => 'gk-vs-montecarlo.webp'],
            // Ecosystem flagships added 2026-07-12
            'proj22' => ['folder' => '',                                                         'cover' => null],
            'proj24' => ['folder' => '',                                                         'cover' => null],
        ];
    }

    private function projectImages(): array
    {
        return Cache::remember('portfolio_project_images_v3', 3600, function () {
            $result = [];
            foreach ($this->projectDefs() as $id => $def) {
                $images      = $this->getImagesFromFolder("images/projects/{$def['folder']}");
                $coverUrl    = $this->buildCoverUrl($def['folder'], $def['cover'], $images);
                $result[$id] = ['cover' => $coverUrl, 'images' => $images, 'count' => count($images)];
            }
            return $result;
        });
    }

    private function certImages(): array
    {
        return Cache::remember('portfolio_cert_images_v3', 3600, function () {
            $folder  = 'images/certifications';
            $absPath = public_path($folder);
            if (!is_dir($absPath)) return [];

            $certs  = [];
            $handle = opendir($absPath);
            if (!$handle) return $certs;

            while (($file = readdir($handle)) !== false) {
                if ($file === '.' || $file === '..') continue;
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) continue;

                $name = pathinfo($file, PATHINFO_FILENAME);
                $name = preg_replace('/Captura de pantalla \d{4}-\d{2}-\d{2} \d{6}/', 'Certificación Digital', $name);
                $name = preg_replace('/^\d{10,}$/', 'Certificación', $name);
                $name = str_replace(['-', '_', ';'], ' ', $name);
                $name = ucwords(trim($name));

                // Extract year from filename (2020–2030 range)
                preg_match('/20[2-3][0-9]/', $file, $yearMatch);
                $year = $yearMatch[0] ?? null;

                // Category detection by keyword
                $lower = mb_strtolower($name . ' ' . $file);
                $category = 'other';
                foreach (['data','analytic','machine','intelligence','python','power bi','google','ibm','ai','neural','scrum','agile','learning'] as $kw) {
                    if (str_contains($lower, $kw)) { $category = 'data-ai'; break; }
                }
                if ($category === 'other') {
                    foreach (['cloud','aws','azure','gcp','devops','kubernetes'] as $kw) {
                        if (str_contains($lower, $kw)) { $category = 'cloud'; break; }
                    }
                }
                if ($category === 'other') {
                    foreach (['project','manage','talent','transform','gobierno','government','digital','business','leadership'] as $kw) {
                        if (str_contains($lower, $kw)) { $category = 'management'; break; }
                    }
                }

                $certs[] = [
                    'src'      => url($folder . '/' . rawurlencode($file)),
                    'title'    => $name,
                    'year'     => $year,
                    'category' => $category,
                ];
            }
            closedir($handle);

            usort($certs, fn($a, $b) => strcmp($a['title'], $b['title']));
            return $certs;
        });
    }

    private function fetchTromayRates(): array
    {
        return Cache::remember('tromay_rates', 300, function () {
            try {
                $url = rtrim(config('portfolio.tromay_internal_url'), '/') . '/api/rates';
                $resp = Http::timeout(3)->get($url);
                if ($resp->successful()) {
                    return $resp->json() ?? [];
                }
            } catch (\Throwable $e) {
                // Silently fall through to empty array — tromay may be down
            }
            return [];
        });
    }

    private function viewData(): array
    {
        return [
            'projectImages' => $this->projectImages(),
            'certImages'    => $this->certImages(),
            'tromayRates'   => $this->fetchTromayRates(),
            'openToWork'    => (bool) config('portfolio.open_to_work'),
        ];
    }

    public function spanish()
    {
        App::setLocale('es');
        return view('onepage', array_merge($this->viewData(), ['lang' => 'es']));
    }

    public function english()
    {
        App::setLocale('en');
        return view('onepage', array_merge($this->viewData(), ['lang' => 'en']));
    }

    public function status(\Illuminate\Http\Request $request)
    {
        // Catálogo en config/portfolio.php (Grupo A: red interna · Grupo B: gateway público)
        $services = config('portfolio.status_services', []);

        // Cache 30s — evita martillar los servicios en cada visita
        $results = Cache::remember('ecosystem_status_v2', 30, function () use ($services) {
            $start = microtime(true);

            // Chequeos concurrentes: el peor caso pasa de sum(timeouts) a max(timeouts)
            $responses = Http::pool(function ($pool) use ($services) {
                foreach ($services as $svc) {
                    $pool->as($svc['id'])->timeout(4)->get($svc['url']);
                }
            });

            $elapsed = round((microtime(true) - $start) * 1000);

            $data = [];
            foreach ($services as $svc) {
                $resp = $responses[$svc['id']] ?? null;
                // Un fallo de conexión llega como Throwable, no como Response
                $isResponse = $resp instanceof \Illuminate\Http\Client\Response;
                $stats      = $isResponse ? $resp->transferStats : null;

                $data[] = [
                    'id'      => $svc['id'],
                    'name'    => $svc['name'],
                    'group'   => $svc['group'],
                    'public'  => $svc['public'],
                    'status'  => $isResponse && $resp->successful() ? 'up' : 'down',
                    'latency' => $stats ? round($stats->getTransferTime() * 1000) : $elapsed,
                    'code'    => $isResponse ? $resp->status() : 0,
                ];
            }
            return $data;
        });

        $allUp  = collect($results)->every(fn($s) => $s['status'] === 'up');
        $grupoAUp = collect($results)->where('group', 'A')->every(fn($s) => $s['status'] === 'up');
        $grupoBUp = collect($results)->where('group', 'B')->every(fn($s) => $s['status'] === 'up');

        if ($request->expectsJson()) {
            return response()->json([
                'hub'        => parse_url(config('app.url'), PHP_URL_HOST),
                'checked'    => now()->toIso8601String(),
                'all_up'     => $allUp,
                'grupo_a_up' => $grupoAUp,
                'grupo_b_up' => $grupoBUp,
                'services'   => $results,
            ]);
        }

        return view('status', [
            'services'   => $results,
            'checked'    => now()->toIso8601String(),
            'all_up'     => $allUp,
            'grupoAUp'   => $grupoAUp,
            'grupoBUp'   => $grupoBUp,
        ]);
    }

    public function recordView(string $slug): \Illuminate\Http\JsonResponse
    {
        if (!array_key_exists($slug, $this->projectDefs())) {
            return response()->json(['count' => 0], 404);
        }

        try {
            $count = Redis::incr("pf_views:{$slug}");
        } catch (\Throwable $e) {
            $count = 0;
        }

        return response()->json(['slug' => $slug, 'count' => $count]);
    }

    public function downloadCv(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        try {
            Redis::incr('pf_cv_downloads');
        } catch (\Throwable $e) {
            // Counter failure is non-fatal
        }

        foreach (['CV_SergioTroche.pdf', 'sergio-troche-cv.pdf'] as $filename) {
            $path = public_path("cv/{$filename}");
            if (file_exists($path)) {
                return response()->download($path, 'Sergio-Troche-CV.pdf');
            }
        }

        abort(404, 'CV not found');
    }
}
