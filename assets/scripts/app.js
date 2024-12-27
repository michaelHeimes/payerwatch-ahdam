/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// Accordian
//@*prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@*prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Navigation Widget
//@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js

// Sticky Elements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// GSAP
//@prepros-prepend vendor/gsap/gsap.min.js
//@prepros-prepend vendor/gsap/ScrollTrigger.min.js

// Images Loaded
//@prepros-prepend vendor/imagesloaded.pkgd.min

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
        });
        
        $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                $('.off-canvas').foundation('close');
                $('header.site-header').removeClass('off-canvas-content has-transition-push');
                $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
        });    
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }
    
    // Custom Functions
    
    _app.mobile_takover_nav = function() {
        $(document).on('click', 'a#menu-toggle', function(){
            
            if ( $(this).hasClass('clicked') ) {
                $(this).removeClass('clicked');
                $('#off-canvas').fadeOut(200);
            
            } else {
            
                $(this).addClass('clicked');
                $('#off-canvas').fadeIn(200);
            
            }
            
        });
    }
    
    _app.has_scrolled = function() {
    
        // Fixed nav trigger
        $(window).on("load scroll resize", function(e) {
            var header_height = 1;
            var sticky_height = 1;
            var fade_height = 0;
            
            if ($(this).scrollTop() > (header_height)) {
                $('body').addClass('sticky-header');
            } else {
                $('body').removeClass('sticky-header');
            }
    
            if ($(this).scrollTop() > (header_height + sticky_height)) {
                $('body').addClass('fade-header');
            } else {
                $('body').removeClass('fade-header');
            }
    
            if ($(this).scrollTop() > (header_height + sticky_height + fade_height)) {
                $('body').addClass('has-scrolled');
            } else {
                $('body').removeClass('has-scrolled');
            }
    
        });
    
    };
    
    _app.home_banner = function() {
                
        if($('.banner.home-banner').length) {
            
            const firstElement = document.querySelector('section');
            
            if( firstElement.classList.contains('home-banner') ) {
                const gradientBg = document.querySelector('.site-header').querySelector('.bg');
                document.body.classList.add('home');
                
                if( gradientBg ) {
                    const updateMinHeight = function() {
                        if (firstElement && gradientBg) {
                            const height = firstElement.offsetHeight;
                            gradientBg.style.minHeight = `${height}px`;
                        }
                    }
                    updateMinHeight();
                    window.addEventListener('resize', updateMinHeight);
                }
                
            }            
            
            gsap.to( '.banner.home-banner .right span', {
                y: -18,
                x: 22,
                ease: 'circ.out',
                duration: .7,
                scrollTrigger: {
                    start: 'top 80%',
                    end: 'bottom top',
                    toggleActions: "play none none reverse",
                    trigger: '.banner.home-banner',
                }
            });			
            
        }
    
        if($('.banner-cta').length) {
            
            gsap.to( '.banner-cta .bg.mint-bg', {
                y: 23,
                x: -41,
                ease: 'circ.out',
                duration: .7,
                scrollTrigger: {
                    start: 'top 80%',
                    end: 'bottom top',
                    toggleActions: "play none none reverse",
                    trigger: '.banner-cta',
                }
            });			
            
        }
    
    }
    
    _app.page_banners = function() {
                
        if($('.page-banner:not(.post-banner)').length) {
            $('.page-banner:not(.post-banner)').imagesLoaded( function() {
                
                let leftInner = $('.page-banner .left-inner');
                let bigBtn = $('.page-banner .btn-link');
                let themeBg = $('.page-banner .theme-color-bg');
                let bannerImg = $('.page-banner .right img');
                
                let tl = gsap.timeline({scrollTrigger:{
                    trigger: '.page-banner',
                    start:"top 75%",
                    end:"bottom top",
                    delay: .1,
                    toggleActions: "play none none reverse",
                }})
                .from(leftInner, {
                    y: 70, opacity:0, ease:"power2.inOut", duration:.5
                })
                .from(bigBtn, {
                    x: -70, opacity:0, ease:"power2.inOut", duration:.5
                }, .2)
                .to(themeBg, {
                    x: 0, ease:"power2.inOut", duration:.5
                }, .4)
                .to(bannerImg, {
                    x: 0, opacity: 1, ease:"power2.inOut", duration: 1
                }, .5)
            });
        }
    }
    
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        _app.fixed_nav_hack();
        _app.display_on_load();
        _app.has_scrolled();
        
        // Custom Functions
        //_app.mobile_takover_nav();
        _app.home_banner();
        _app.page_banners();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);