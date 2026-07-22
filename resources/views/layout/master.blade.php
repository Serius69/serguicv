<!DOCTYPE html>
<html lang="{{ ($lang ?? 'es') }}" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Tema: aplica la preferencia guardada antes de pintar (sin flash) --}}
  <script>(function(){try{var t=localStorage.getItem('kap-theme');if(t)document.documentElement.setAttribute('data-theme',t);}catch(e){}}());</script>

  <title>@yield('title', __('portfolio.meta_title'))</title>
  <meta name="description" content="@yield('description', __('portfolio.meta_description'))">
  <meta name="keywords" content="{{ __('portfolio.meta_keywords') }}">
  <meta name="author" content="Sergio Troche">
  <meta name="robots" content="index, follow">

  {{-- Open Graph / Twitter --}}
  <meta property="og:type" content="website">
  <meta property="og:title" content="{{ __('portfolio.og_title') }}">
  <meta property="og:description" content="{{ __('portfolio.og_description') }}">
  <meta property="og:image" content="{{ asset('images/og-preview.jpg') }}">
  <meta property="og:image:width" content="1280">
  <meta property="og:image:height" content="1280">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ __('portfolio.og_title') }}">
  <meta name="twitter:description" content="{{ __('portfolio.og_description') }}">
  <meta name="twitter:image" content="{{ asset('images/og-preview.jpg') }}">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="canonical" href="{{ url()->current() }}">

  {{-- Íconos (Font Awesome, ya self-hosted) --}}
  <link rel="stylesheet" href="{{ asset('icon-fonts/font-awesome/css/all.min.css') }}">
  {{-- Base de diseño Kapitalya (ex-Tromay) --}}
  <link rel="stylesheet" href="{{ asset('css/kapitalya-base.css') }}?v=20260722a">

  @stack('head')
</head>
<body>
  <a href="#main" class="skip-link" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden"
     onFocus="this.style.cssText='position:fixed;top:8px;left:8px;z-index:2000;padding:10px 16px;background:var(--gold);color:#1a1300;border-radius:6px;font-weight:600'"
     onBlur="this.style.cssText='position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden'">
     {{ __('portfolio.nav_home') }}
  </a>

  @yield('body')

  {{-- Toggle de tema --}}
  <script>
    (function () {
      function bind() {
        var btn = document.getElementById('theme-toggle');
        if (!btn) return;
        function sync() {
          var dark = document.documentElement.getAttribute('data-theme') !== 'light';
          btn.innerHTML = dark ? '<i class="fa-solid fa-moon"></i>' : '<i class="fa-solid fa-sun"></i>';
        }
        sync();
        btn.addEventListener('click', function () {
          var next = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
          document.documentElement.setAttribute('data-theme', next);
          try { localStorage.setItem('kap-theme', next); } catch (e) {}
          sync();
        });
      }
      if (document.readyState !== 'loading') bind(); else document.addEventListener('DOMContentLoaded', bind);
    }());
  </script>

  @stack('scripts')
</body>
</html>
