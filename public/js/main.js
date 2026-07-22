'use strict'; 


/*----------------------------------------------------------------------*/
/* =  Preloader
/*----------------------------------------------------------------------*/
$(window).on('load', function () {

  // Preloader acelerado: el contenido se ve en ~1.1s en vez de ~3s (mejor lectura).
  gsap.to($('.preloader .circle'), .5, {strokeDashoffset:0, delay:.2 });
  //gsap.to('.preloader .profile-image', {duration: 4, rotationX:360, delay:1.7, ease:Cubic.easeOut});

  gsap.to($('.loading'), 0.5, {y:-100, autoAlpha:0, delay:.5 });
  gsap.to($('#loader'), 1, {y:-3000, delay:.6, ease:'easeOutExpo' } );

  setTimeout(function(){ $('#loader').remove(); }, 1100);
 

});

function initSection(name, callback) {
  if (typeof callback !== 'function') return;

  try {
    callback();
  } catch (error) {
    console.error('[portfolio] ' + name + ' init failed', error);
  }
}

function ajaxLoad(){

  initSection('header_options', header_options);
  initSection('testimonialSlider', testimonialSlider);
  initSection('workslider', workslider);
  initSection('lightbox', lightbox);
  initSection('ContactForm', ContactForm);
  initSection('videoPlay', videoPlay);
  initSection('charts', charts);
  initSection('isotope', isotope);
  initSection('contactmap', window.contactmap);
  setTimeout(() => {
    initSection('scrollAnimation', scrollAnimation);
  }, 300);
  setTimeout(() => {
   initSection('typed', typed);
   initSection('clientSlider', clientSlider);
  }, 250);
}

setTimeout(() => {

ajaxLoad();
}, 300);


  // BARBA JS
  $('.onepage .grid-item').attr('data-barba-prevent', 'all');

  function delay(n) {
    n = n || 500;
    return new Promise((done) => {
      setTimeout(() => {
        done();
      }, n);


    });
  }

  barba.init({
    transitions: [{
      async leave(data) {
        const done = this.async();
        pageTransition();
        await delay(700);
        done();
      },

      async enter(data) {
        ajaxLoad();
          window.scrollTo(0, 0);
        gsap.to(".page-cover", {'margin-top': '0px', autoAlpha:1, delay:.4, ease: Power3.easeOut });
        $('.page-cover').addClass('yoket');
        setTimeout(() => {
          $('.page-cover').removeClass('yoket');
        }, 1500);
      },
    }, ],
  });

  function pageTransition() {
    var tl = new gsap.timeline({
      yoyo: false,
      reversed: false
    });
    tl.to(".page-cover", .5, {'margin-top': '-50px', autoAlpha:0, ease: Power3.easeOut },"Start");
  }




// MAGNIFIC POPUP    
function lightbox() {
  if( $('.lightbox').length ){
    $('.lightbox').attr('data-barba-prevent', 'all');
    $('.lightbox').magnificPopup({
          type:'image',
          gallery:{enabled:true},
          zoom:{enabled: true, duration: 300}
      });
  }
}




// VIDEO HOVER PLAY
function videoPlay(){
  if($('.video-wrapper').length){
    setTimeout(() => {
      $('video').get(0).pause();
    }, 10);
  }


  if($('.grid-item.grid-video').length){
    $('.grid-video').on("mouseenter",  function() {
      $(this).find('video').get(0).play();
    }).on("mouseleave", function(){
      $(this).find('video').get(0).pause();
    });
  }

  if($('.work-hero.video-hero').length){
    setTimeout(() => {
      $('.work-hero').find('video').get(0).play();
    }, 10);
  }


}


  
  // SCROLL ANIMATION
  function scrollAnimation() {
  if( !$('.scroll-animation-on').length ) return;

  // ScrollMagic listens to native window.scroll, but SmoothScrollbar intercepts
  // scroll events and moves content via CSS transform without updating window.scrollY.
  // IntersectionObserver works correctly with SmoothScrollbar because it observes
  // real viewport intersection of physically-transformed elements.
  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (!entry.isIntersecting) return;
      var el = entry.target;
      var delay    = parseFloat($(el).data('delay'))    || 0;
      var duration = parseFloat($(el).data('duration')) || 1;

      if ($(el).hasClass('clip-animation')) {
        gsap.to(el, duration, { clipPath: 'polygon(-2% 0%, 100% 0%, 105% 100%, 0% 100%)', delay: delay, ease: 'expo.out' });
      } else {
        gsap.to(el, duration, { autoAlpha: 1, y: 0, scaleY: 1, scale: 1, delay: delay, ease: 'expo.out' });
      }
      observer.unobserve(el);
    });
  }, {
    threshold: 0,
    rootMargin: '0px 0px 200px 0px'
  });

  $('.classic-animation, .clip-animation, .scale-animation').each(function() {
    observer.observe(this);
  });

}

//CARTS
function charts() {

  if( $('.chart').length ){
    var isWide = $(window).width() >= 991;
    var charSize = isWide ? 150 : 100;
    var charLine = isWide ? 8 : 6;
    var bartrack = getComputedStyle(document.documentElement).getPropertyValue('--border').trim() || '#363636';

    $(".chart").easyPieChart({
      barColor:  "#D1ED5D",
      scaleColor: "#D1ED5D",
      trackColor: bartrack,
      size: charSize,
      lineWidth: charLine,
      lineCap: "square",
      onStep: function(a, b, c) {
          $(this.el).find(".percent").text(Math.round(c));
      }
    });
  }

  $(".skill-list li").each(function() {
    var percentBar = $(this).find('.percentage');
    gsap.to(percentBar, { 'width': percentBar.attr("data-percent"), duration:2, delay:2, ease:Power2.easeOut });
  });

}


// HOME TYPED JS
function typed () {
  if ($('.element').length) {
    var animateSpan = jQuery('.element');
    var textWords   = animateSpan.data('values');
    var textArray   = textWords.split(',');
    var html        = [];
    var back_delay  = $('.element').data('backdelay') * 1000;

    for (var i = 0; i < textArray.length; i++) { html.push(textArray[i]); }

    $('.element').each(function () {
      // Guard: skip if already initialized to prevent double-typing after Barba re-entry
      if ($(this).data('typed-initialized')) return;
      $(this).data('typed-initialized', true);
      $(this).typed({
        strings:   html,
        loop:      $(this).data('loop') ? $(this).data('loop') : false,
        backDelay: back_delay,
        typeSpeed: 20,
      });
    });
  }
}

  //CLIENT SLIDER JS
  function clientSlider(){

    $(".bxslider").bxSlider({
      minSlides: 1,
      maxSlides: 5,
      slideMargin: 0,
      ticker: true,
      infiniteLoop: true,
      speed: 30000
    });

  }


  // SMOOTH SCROLL JS


  // ── Native scroll (SmoothScrollbar removed 2026-07-22 — de-jank) ──────────
  // Anchor nav uses native smooth scroll; the fixed-header offset is handled by
  // CSS `scroll-margin-top`. Active-section highlighting is done by the
  // IntersectionObserver in portfolio-enhanced.js (no per-frame reflow here).
  if( $('.onepage').length ){
    $('header nav ul li a').on('click', function (e) {
      var target = $(this).attr("href");
      if (target && target.charAt(0) === '#' && $(target).length) {
        e.preventDefault();
        $(target)[0].scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  }

  function header_options(){
    var headerAnimation = new gsap.timeline({yoyo: false,reversed: true });
    headerAnimation.pause();
    headerAnimation.to($('header nav ul li'), .4, { autoAlpha:1, x:0, stagger:0.05, ease:Power2.easeOut });

    // .off first prevents handler duplication on Barba re-entry
    $('.hamburger, header ul li a').off('click.header').on('click.header', function(){
      headerAnimation.reversed() ? headerAnimation.play() : headerAnimation.reverse();
      $('body').toggleClass('header-is-active');
      var expanded = $('body').hasClass('header-is-active');
      $('.hamburger').attr('aria-expanded', expanded ? 'true' : 'false');
    });
  }  


      // isotope
      function isotope(){
        if ( $('.masonry').length ){
        var $container = $('.masonry');  
        $container.imagesLoaded( function() {   
          $container.isotope({
            layoutMode: 'fitRows',
            itemSelector: '.grid-item',
            sortBy : 'parseInt',
            gutter:0,
            transitionDuration: "0.5s",
            columnWidth: '.grid-item'
          });
        });
        $('.portfolio_filter ul li a').off('click.isotope').on('click.isotope', function(){
          $(".portfolio_filter ul li a").removeClass("select-cat");
          $(this).addClass("select-cat");
          var selector = $(this).attr('data-filter');
          $(".masonry").isotope({
              filter: selector,
              animationOptions: {
                  duration: 750,
                  easing: 'linear',
                  queue: false,
              }
          });
          return false;
        });

    }
  }



  // SWIPER JS
function workslider(){
  var swiper = new Swiper(".work-carousel", {
      slidesPerView: 1,
      spaceBetween: 30,
      autoplay:{
          delay: 3000,
      },
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      });
}


// SWIPER JS
function testimonialSlider(){
  var swiper = new Swiper(".testimonial-carousel", {
      slidesPerView: 1,
      spaceBetween: 30,
      autoplay:{
          delay: 3000,
      },
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      breakpoints: {
        1200: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 2,
        },
      },
      });
}



  //CONTACT FORM
  function ContactForm() {
    // The portfolio form submits via standard HTML POST — no AJAX hijack here.
    // Only wire the float-label focus/blur animations (namespaced to prevent duplication).
    $("form .form-group input, form .form-group textarea, form .form-group select")
      .off('focus.cf blur.cf')
      .on('focus.cf', function(){
        $(this).parents('.form-group').addClass('in');
      })
      .on('blur.cf', function(){
        if (!$(this).val()) {
          $(this).parents('.form-group').removeClass('in');
        }
      });
  }//End ContactForm





