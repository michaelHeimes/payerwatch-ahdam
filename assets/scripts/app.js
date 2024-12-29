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
 
 // Anchor Link Scrolling
 //@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js


// JS Form Validation
//@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// Accordion
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
//@prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js


// Sticky Elements
//@prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

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
    
    _app.nav_spacer = function() {
        $(window).on("load resize", function(e) {
            let $navHeight = $('#top-bar-menu').outerHeight();
            $('.banner').css('padding-top', $navHeight);
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
    
    _app.expanding_card_slider = function() {
        if( $('.expanding-card-slider').length ) {
            $('.expanding-card-slider').each(function( index ) {
                let $slider = $(this).find('.slider');
                
                $($slider).slick({
                    infinite: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    speed: 300,
                    rows: 0,
                    variableWidth: true,
                }).on({

                    afterChange: function (event, slick, currentSlide, nextSlide) {
                        let $slide = $($slider).find('.single-slide');
                        
                        $($slide).each(function( index ) {
                            
                            if( $(this).hasClass('slick-current') ) {
                                $(this).addClass('widen');
                            } else {
                                $(this).removeClass('widen');
                            }
                                                    
                        });

                    }
                });
                
                
            });
        }
    
    }
    
    _app.g_pipe = function() {
        if( $('.g-pipe').length ) {
            $('.g-pipe').each(function( index ) {
                let gPipe = $(this);
                
                gsap.from( gPipe, {
                    width:'0%',
                    ease: 'circ.out',
                    duration: .7,
                    scrollTrigger: {
                        start: 'top 80%',
                        end: 'bottom top',
                        toggleActions: "play none none reverse",
                        trigger: gPipe,
                    }
                });					
            
            });
        }
    }
    
    _app.arrow_checklist = function() {
        if( $('.copy-and-arrow-checklist .right li').length ) {
            $('.copy-and-arrow-checklist .right li').each(function( index ) {
    
                gsap.from( this, {
                    autoAlpha: 0,
                    y: 50,
                    ease: 'power2.out',
                    duration: .7,
                    scrollTrigger: {
                        start: 'top bottom-=50px',
                        toggleActions: "play none none reverse",
                        trigger: this,
                    }
                });	
                
            });
        }
    }
    
    _app.partner_quotes = function() {
        
        const pqSliders = document.querySelectorAll('.pq-slider');
        
        if( pqSliders.length < 0 ) return;
        
        
        pqSliders.forEach( pqSlider => {
            const pagination = pqSlider.parentElement.querySelector('.dots-container');
            
            const swiper = new Swiper(pqSlider, {
                slidesPerView: 1,
                spaceBetween: 0,
                speed: 500,
                loop: true,
                centeredSlides: true,
                spaceBetween: 28,
                pagination: {
                    el: pagination,
                    clickable: true,
                },
                breakpoints: {
                    480: {
                        centeredSlides: false,
                    },
                },
            });    
        });
        
    }
    
    _app.webinars_slider = function() {
        
        const webinarsSliders = document.querySelectorAll('.post-slider');
        
        if( webinarsSliders.length < 1 ) return;
        
        webinarsSliders.forEach( slider => {
            const pagination = slider.parentElement.querySelector('.dots-container');
            
            const swiper = new Swiper(slider, {
                loop: true,
                slidesPerView: 1,
                centeredSlides: true,
                speed: 500,
                pagination: {
                    el: pagination, 
                    clickable: true,
                },
                navigation: {
                    nextEl: null,
                    prevEl: null,
                },
            });
            
            if ($(slider).hasClass('webinars-slider')) {
                
                $(slider).next().find('.link-text').text('View All Webinars');					
            }
            
            if ($(slider).hasClass('interview-slider')) {
                $(slider).next().find('.link-text').text('View All Interviews');				
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
                .to(leftInner, {
                    y: 0, opacity: 1, ease:"power2.inOut", duration:.5
                })
                .to(bigBtn, {
                    x: 0, opacity: 1, ease:"power2.inOut", duration:.5
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
    
    _app.team_cards = function() {
                    
        if($('.team-preview').length) {
            const $slider = $('.team-preview .slider');
            const $card1 = $('.single-card[data-order="1"]');
            const card1Img = $('.single-card[data-order="1"] .photo-wrap');
            const card2Img = $('.single-card[data-order="2"] .photo-wrap');
            const card3Img = $('.single-card[data-order="3"] .photo-wrap');
            const card1Mint = $('.single-card[data-order="1"] .mint');
            const card2Mint = $('.single-card[data-order="2"] .mint');
            const card3Mint = $('.single-card[data-order="3"] .mint');
            const $card1Text = $('.single-card[data-order="1"] .copy-wrap');
            const $card2Text = $('.single-card[data-order="2"] .copy-wrap');
            const $card3Text = $('.single-card[data-order="3"] .copy-wrap');
            const $card2 = $('.single-card[data-order="2"]');
            const $card3 = $('.single-card[data-order="3"]');
            const $white = '#ffffff';
            const $lightViolet = 'rgba(18,5,143,.23)';
            const $skyBlue = '#dce7f0';
            const $blue = '#12108f';
            const $scale = .7;
            const $shortDuration = .2;
            const $longDuration = .4;
            const $leftMost = '-105%';
            const $rightMost = '5%';
            const $easeIn = 'power2.in';
            const $easeOut = 'power2.out';
            
            gsap.from( $slider, {
                autoAlpha: .5,
                scaleX: .9,
                scaleY: .9,
                ease: 'circ.out',
                duration: .7,
                scrollTrigger: {
                    start: 'top 80%',
                    end: 'bottom top',
                    toggleActions: "play none none reverse",
                    trigger: $slider,
                    toggleClass: {targets: '.team-preview', className: 'active'},
                }
            });	
            
/*
            ScrollTrigger.create({
                trigger: '.team-preview .inner',
                start: 'top 75%',
                endTrigger: '.team-preview .inner',
                end: 'bottom 0%',
                toggleClass: {targets: '.team-preview', className: 'active'},
                toggleActions: 'play none play reverse',
            });
*/

            $('.team-preview .single-card:nth-child(1)').addClass('front');
            gsap.to($card1Text, {delay: $longDuration, duration: $shortDuration, color: $white, ease: $easeIn});	
            gsap.to(card1Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: 1, ease: $easeIn});	
            gsap.to(card1Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(0)', ease: $easeIn});							
            $('.card-nav li:nth-child(1) button').addClass('clicked');
            $('.card-nav li:nth-child(1) button').attr('aria-selected', true);

            $('.card-nav button').click(function(e){
                $order = $(this).data('order');
                $activeCard = $($slider).attr('data-slide');
                $(this).addClass('clicked');
                $(this).attr('aria-selected', true);
                $(this).parent().siblings().find('button').removeClass('clicked');
                $(this).parent().siblings().find('button').attr('aria-selected', false);
                
                if ($order == 1 ) {
                    
                    if ( $($card1).hasClass('front') ) {

                    } else {
                        
                        gsap.to($card1Text, {delay: $longDuration, duration: $shortDuration, color: $white, ease: $easeIn});
                        gsap.to(card1Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: 1, ease: $easeIn});	
                        gsap.to(card1Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(0)', ease: $easeIn});							


                        gsap.to($card2Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                        gsap.to($card3Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                        gsap.to(card2Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: .2, ease: $easeIn});	
                        gsap.to(card3Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: .2, ease: $easeIn});	
                        gsap.to(card2Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(1)', ease: $easeIn});	
                        gsap.to(card3Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(1)', ease: $easeIn});	


                        if ($activeCard == 2) {
                            gsap.to($card1, {duration: $longDuration, x: '-200%', scaleX: $scale, scaleY: $scale, zIndex: 3, ease: $easeOut});						
                            gsap.to($card1, {delay: $longDuration, duration: $shortDuration, x: '0%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeIn});
                            
                            gsap.to($card2, {duration: $longDuration, x: '50%', scaleX: 1, scaleY: 1, zIndex: 4, ease: $easeOut});
                            gsap.to($card2, {delay: $longDuration, duration: $shortDuration, x: $rightMost, scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 3, ease: $easeIn});

                            gsap.to($card3, {duration: $longDuration, x: $leftMost, scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 1, ease: $easeIn});
                        }

                        if ($activeCard == 3) {
                            gsap.to($card1, {duration: $longDuration, x: '100%', scaleX: $scale, scaleY: $scale, zIndex: 2, ease: $easeOut});						
                            gsap.to($card1, {delay: $longDuration, duration: $shortDuration, x: '0%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeIn});
                            gsap.to($card1Text, {delay: $longDuration, duration: $shortDuration, color: $white, ease: $easeIn});

                            gsap.to($card2, {zIndex: 0});
                            gsap.to($card2, {delay: $longDuration, duration: $longDuration, x: $rightMost, scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 0, ease: $easeIn});
                            gsap.to($card2Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                            
                            gsap.to($card3, {duration: $shortDuration, x: '-150%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeOut});
                            gsap.to($card3, {delay: $longDuration, duration: $shortDuration, x: $leftMost, scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 1, ease: $easeIn});
                            gsap.to($card3Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                        }

                        $($card1).addClass('front');
                        $($card1).siblings().removeClass('front');	
                        $($slider).attr('data-slide', 1);
                            
                    }
                    
                }				

                if ($order == 2 ) {
                    
                    if ( $($card2).hasClass('front') ) {

                    } else {
                        
                        gsap.to($card2Text, {delay: $longDuration, duration: $shortDuration, color: $white, ease: $easeIn});
                        gsap.to(card2Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: 1, ease: $easeIn});	
                        gsap.to(card2Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(0)', ease: $easeIn});						

                        gsap.to($card1Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                        gsap.to($card3Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                        gsap.to(card1Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: .2, ease: $easeIn});	
                        gsap.to(card3Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: .2, ease: $easeIn});	
                        gsap.to(card1Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(1)', ease: $easeIn});	
                        gsap.to(card3Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(1)', ease: $easeIn});						
                        
                        if ($activeCard == 1) {
                            gsap.to($card1, {duration: $longDuration, x: '-200%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeOut});
                            gsap.to($card1, {delay: $longDuration, duration: $shortDuration, x: '-55%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 3, ease: $easeIn});
                                                        
                            gsap.to($card2, {duration: $longDuration, x: '50%', scaleX: $scale, scaleY: $scale, zIndex: 2, ease: $easeOut});
                            gsap.to($card2, {delay: $longDuration, duration: $shortDuration,  x: '-50%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeIn});
                            
                            gsap.to($card3, {duration: $shortDuration, x: $rightMost, scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 1, ease: $easeIn});
                        }
                        
                        if ($activeCard == 3) {
                            gsap.to($card1, {duration: $longDuration, x: '-55%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 1, ease: $easeIn});
                            
                            
                            gsap.to($card2, {duration: $longDuration, x: '-200%', scaleX: $scale, scaleY: $scale, zIndex: 2, ease: $easeOut});
                            gsap.to($card2, {delay: $longDuration, duration: $shortDuration,  x: '-50%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeIn});

                            gsap.to($card3, {duration: $longDuration, x: '100%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeOut});
                            gsap.to($card3, {delay: $longDuration, duration: $shortDuration, x: $rightMost, scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 1, ease: $easeIn});
                        }						
                        
                        $($card2).addClass('front');
                        $($card2).siblings().removeClass('front');						
                        $($slider).attr('data-slide', 2);
                    }
                    
                }	
                
                if ($order == 3 ) {

                    if ( $($card3).hasClass('front') ) {

                    } else {
                        
                        gsap.to($card3Text, {delay: $longDuration, duration: $shortDuration, color: $white, ease: $easeIn});
                        gsap.to(card3Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: 1, ease: $easeIn});	
                        gsap.to(card3Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(0)', ease: $easeIn});						
                        
                        gsap.to($card1Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                        gsap.to($card2Text, {delay: $longDuration, duration: $shortDuration, color: $lightViolet, ease: $easeIn});
                        gsap.to(card1Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: .2, ease: $easeIn});	
                        gsap.to(card2Img, {delay: $longDuration, duration: $shortDuration, autoAlpha: .2, ease: $easeIn});	
                        gsap.to(card1Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(1)', ease: $easeIn});	
                        gsap.to(card2Mint, {delay: $longDuration, duration: $shortDuration, filter: 'grayscale(1)', ease: $easeIn});						
                        
                        if ($activeCard == 1) {
                            gsap.to($card1, {duration: $longDuration, x: '-200%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 3, ease: $easeOut});
                            gsap.to($card1, {delay: $longDuration, duration: $shortDuration, x: '55%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 1, ease: $easeIn});
                            
                            gsap.to($card2, {duration: $longDuration, x: '-105%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 2, ease: $easeIn});
                            
                            gsap.to($card3, {duration: $longDuration, x: '500%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 1, ease: $easeOut});
                            gsap.to($card3, {delay: $longDuration, duration: $shortDuration, x: '-50%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeIn});
                        }
                        
                        if ($activeCard == 2) {
                            gsap.to($card2, {duration: $longDuration, x: '-200%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeOut});
                            gsap.to($card2, {delay: $longDuration, duration: $shortDuration, x: '-105%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 2, ease: $easeIn});
                            
                            gsap.to($card3, {duration: $longDuration, x: '90%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 3, ease: $easeOut});
                            gsap.to($card3, {delay: $longDuration, duration: $shortDuration, x: '-50%', scaleX: 1, scaleY: 1, backgroundColor: $blue, zIndex: 4, ease: $easeIn});
                            
                            gsap.to($card1, {duration: $longDuration, x: '55%', scaleX: $scale, scaleY: $scale, backgroundColor: $skyBlue, zIndex: 3, ease: $easeIn});
                        }
                        
                        $($card3).addClass('front');
                        $($card3).siblings().removeClass('front');						
                        $($slider).attr('data-slide', 3);

                    }

                }	

            });

        }

    }
    
    _app.stats_count = function() {
        if ($('.graphic-and-stats').length > 0) {
            
            $('.graphic-and-stats').each(function () {
                let $module = $(this);
            
                let counter1 = { var: 0 };
                let counter2 = { var: 0 };
            
                let $value1 = $module.find(".stat-1");
                let $value2 = $module.find(".stat-2");
            
                let num1 = $value1.data('stat1num');
                let num2 = $value2.data('stat2num');
            
            
                gsap.to(counter1, {
                    var: num1,
                    duration: 3,
                    onUpdate: function () {
                        $value1.html(numberWithCommas(Math.ceil(counter1.var)));
                    },
                    ease: "circ.out",
                    scrollTrigger: {
                        trigger: $value1[0], // Use the DOM element
                        start: 'bottom bottom',
                        toggleActions: 'play none play reverse',
                    },
                });
            
                gsap.to(counter2, {
                    var: num2,
                    duration: 3,
                    onUpdate: function () {
                        $value2.html(numberWithCommas(Math.ceil(counter2.var)));
                    },
                    ease: "circ.out",
                    scrollTrigger: {
                        trigger: $value2[0],
                        start: 'bottom bottom',
                        toggleActions: 'play none play reverse',
                    },
                });
            
                function numberWithCommas(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            });
            
        }
    }
    
    _app.appeal_letter = function() {
        if ($('.appeal-letter-template').length) {

            gsap.from( '.appeal-letter-template .bg.royal-blue-bg', {
                autoAlpha: 0,
                x: '-20%',
                ease: 'circ.out',
                duration: .7,
                scrollTrigger: {
                    start: 'top 75%',
                    toggleActions: "play none none reverse",
                    trigger: '.appeal-letter-template',
                }
            });	
            
            gsap.from( '.appeal-letter-template .animate', {
                autoAlpha: 0,
                x: '20%',
                ease: 'circ.out',
                duration: .7,
                scrollTrigger: {
                    start: 'top 75%',
                    toggleActions: "play none none reverse",
                    trigger: '.appeal-letter-template',
                }
            });				
            
        }
    }
    
    _app.jump_nav = function(){	 
        if( $('.sticky-heading-nav-paragraphs').length ) {
            
            $(document).imagesLoaded( function() {
            
                $(function(){
                    $(".sticky-heading-nav-paragraphs .nav-wrap a.is-active").bind('cssClassChanged', function(){ 
                        console.log("triggered")
                    });
                });
                
                $('.sticky-heading-nav-paragraphs .nav-wrap a').click(function(){
                    
                    if($(this).hasClass('is-active')) {
                        
                    } else {
                        
                        $(this).toggleClass('is-active');
                        $(this).parent().parent().siblings().find('a').removeClass('is-active');
                        
                    }
                });
                
            });
        
        }
        
    }

            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        _app.nav_spacer();
        _app.fixed_nav_hack();
        _app.display_on_load();
        _app.has_scrolled();
        
        // Custom Functions
        //_app.mobile_takover_nav();
        _app.home_banner();
        _app.page_banners();
        _app.has_scrolled();
        _app.home_banner();
        _app.page_banners();
        _app.expanding_card_slider();
        _app.partner_quotes();
        _app.g_pipe();
        _app.arrow_checklist();
        _app.webinars_slider();
        _app.team_cards();
        _app.stats_count();
        _app.appeal_letter();
        //_app.jump_nav();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);