<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

  <url>
    <loc>{{ url('/') }}</loc>
    <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/') }}"/>
    <xhtml:link rel="alternate" hreflang="es" href="{{ url('/') }}"/>
    <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}"/>
    <lastmod>{{ now()->toDateString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>1.0</priority>
  </url>

  <url>
    <loc>{{ url('/en') }}</loc>
    <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/') }}"/>
    <xhtml:link rel="alternate" hreflang="es" href="{{ url('/') }}"/>
    <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}"/>
    <lastmod>{{ now()->toDateString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

</urlset>
