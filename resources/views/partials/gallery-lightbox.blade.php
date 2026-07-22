{{-- ══════════════════════════════════════════════════════════════════════
     MODAL OVERLAY
══════════════════════════════════════════════════════════════════════ --}}
{{-- ══════════════════════════════════════════════════════════════════════
     GALLERY LIGHTBOX
══════════════════════════════════════════════════════════════════════ --}}
<div id="gallery-lb" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Image gallery">
  <div class="gallery-lb-bg"></div>
  <div class="gallery-lb-wrap">
    <img id="gallery-lb-img" src="" alt="Gallery image">
    <div id="gallery-lb-counter" class="gallery-lb-counter"></div>
  </div>
  <button class="gallery-lb-close" id="gallery-lb-close" aria-label="Close gallery">✕</button>
  <button class="gallery-lb-nav gallery-lb-prev" id="gallery-lb-prev" aria-label="Previous image">&#8249;</button>
  <button class="gallery-lb-nav gallery-lb-next" id="gallery-lb-next" aria-label="Next image">&#8250;</button>
</div>

<div id="modal-overlay" role="dialog" aria-modal="true"></div>
