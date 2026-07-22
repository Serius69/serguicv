<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Status — Kapitalya</title>
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="refresh" content="30">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --up:      #22c55e;
      --down:    #ef4444;
      --warn:    #f59e0b;
      --bg:      #0f172a;
      --surface: #1e293b;
      --border:  #334155;
      --text:    #e2e8f0;
      --muted:   #94a3b8;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }

    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 2rem;
      width: 100%;
      max-width: 720px;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
      gap: .75rem;
    }

    .header h1 {
      font-size: 1.125rem;
      font-weight: 600;
      letter-spacing: -.01em;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      gap: .375rem;
      padding: .35rem .75rem;
      border-radius: 999px;
      font-size: .8125rem;
      font-weight: 600;
    }

    .badge-up   { background: rgba(34,197,94,.15);  color: var(--up);   }
    .badge-down { background: rgba(239,68,68,.15);   color: var(--down); }

    .dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: currentColor;
    }

    .dot-pulse {
      animation: pulse 2s cubic-bezier(.4,0,.6,1) infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50%       { opacity: .4; }
    }

    .services { display: flex; flex-direction: column; gap: .625rem; }

    .group-label {
      font-size: .75rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--muted);
      padding: .5rem 0 .25rem;
      border-bottom: 1px solid var(--border);
      margin-bottom: .25rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .group-label .group-badge {
      display: inline-flex;
      align-items: center;
      gap: .25rem;
    }

    .service-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: .875rem 1rem;
      border-radius: 8px;
      border: 1px solid var(--border);
      background: var(--bg);
      transition: border-color .15s;
      gap: 1rem;
    }

    .service-row:hover { border-color: #475569; }

    .service-left  { display: flex; align-items: center; gap: .75rem; flex: 1; min-width: 0; }
    .service-right { display: flex; align-items: center; gap: 1rem; flex-shrink: 0; }

    .indicator {
      width: 10px; height: 10px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .indicator-up   { background: var(--up);   box-shadow: 0 0 6px var(--up); }
    .indicator-down { background: var(--down);  box-shadow: 0 0 6px var(--down); animation: pulse 1.5s infinite; }

    .service-name {
      font-size: .9375rem;
      font-weight: 500;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .service-link {
      font-size: .8125rem;
      color: var(--muted);
      text-decoration: none;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 220px;
    }

    .service-link:hover { color: var(--text); }

    .latency {
      font-size: .8125rem;
      color: var(--muted);
      font-variant-numeric: tabular-nums;
    }

    .status-label {
      font-size: .8125rem;
      font-weight: 600;
      min-width: 36px;
      text-align: right;
    }

    .status-up   { color: var(--up); }
    .status-down { color: var(--down); }

    .footer {
      margin-top: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: .5rem;
    }

    .footer-left a {
      font-size: .8125rem;
      color: var(--muted);
      text-decoration: none;
    }

    .footer-left a:hover { color: var(--text); }

    .footer-right {
      font-size: .75rem;
      color: var(--muted);
    }
  </style>
</head>
<body>
<div class="card">

  <div class="header">
    <h1>Kapitalya — System Status</h1>
    <span class="badge {{ $all_up ? 'badge-up' : 'badge-down' }}">
      <span class="dot {{ $all_up ? 'dot-pulse' : '' }}"></span>
      {{ $all_up ? 'All systems operational' : 'Degraded' }}
    </span>
  </div>

  <div class="services">
    @php
      $grouped = collect($services)->groupBy('group');
      $groupMeta = [
        'A' => ['label' => 'Grupo A — Producción', 'upKey' => 'grupoAUp'],
        'B' => ['label' => 'Grupo B — Portfolio ML', 'upKey' => 'grupoBUp'],
      ];
    @endphp

    @foreach (['A', 'B'] as $g)
    @if($grouped->has($g))
    @php
      $gUp = $g === 'A' ? $grupoAUp : $grupoBUp;
    @endphp
    <div class="group-label">
      <span>{{ $groupMeta[$g]['label'] }}</span>
      <span class="group-badge">
        <span class="dot" style="color: {{ $gUp ? 'var(--up)' : 'var(--down)' }}"></span>
        <span style="color: {{ $gUp ? 'var(--up)' : 'var(--down)' }}; font-size:.7rem">
          {{ $gUp ? 'OK' : 'DEGRADED' }}
        </span>
      </span>
    </div>
    @foreach ($grouped[$g] as $svc)
    <div class="service-row">
      <div class="service-left">
        <span class="indicator indicator-{{ $svc['status'] }}"></span>
        <div>
          <div class="service-name">{{ $svc['name'] }}</div>
          @if($svc['public'])
          <a href="{{ $svc['public'] }}" class="service-link" target="_blank" rel="noopener">
            {{ parse_url($svc['public'], PHP_URL_HOST) }}
          </a>
          @endif
        </div>
      </div>
      <div class="service-right">
        @if($svc['status'] === 'up')
        <span class="latency">{{ $svc['latency'] }}ms</span>
        @endif
        <span class="status-label status-{{ $svc['status'] }}">
          {{ strtoupper($svc['status']) }}
        </span>
      </div>
    </div>
    @endforeach
    @endif
    @endforeach
  </div>

  <div class="footer">
    <div class="footer-left">
      <a href="{{ url('/') }}">← cv.kapitalya.com.bo</a>
    </div>
    <div class="footer-right">
      Updated {{ \Carbon\Carbon::parse($checked)->diffForHumans() }} &nbsp;·&nbsp; auto-refresh 30s
    </div>
  </div>

</div>
</body>
</html>
