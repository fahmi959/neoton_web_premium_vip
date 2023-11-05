/**
*
* --------------------------------------------------------------------
*
* Template : Neoton - News Magazine WordPress Theme
* Author : backtheme
* Author URI : https://backtheme.tech/
*
* --------------------------------------------------------------------
*
**/

(function($) {
    "use strict";
    // sticky menu
    var header = $('.menu-sticky');
    var win = $(window);

    win.on('scroll', function() {
       var scroll = win.scrollTop();
       if (scroll < 50) {
           header.removeClass("sticky");                     
       } else {
           header.addClass("sticky");
       }
    });


    $(".widget_nav_menu li a").filter(function(){
        return $.trim($(this).html()) == '';
    }).hide();

    // Slider init   
    $('.back-slider-carousel').slick({
        centerPadding: '0px',
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });

    $('.back__topber__slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        vertical: true,
        verticalSwiping: true,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 400,
            settings: {
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1
           }
        }]
    });

    $('.back__related_post').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 400,
           settings: {
              arrows: false,
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }]
    });
    // collapse hidden
    $(function(){ 
        var navMain = $(".navbar-collapse"); // avoid dependency on #id
         // when you have dropdown inside navbar
         navMain.on("click", "a:not([data-toggle])", null, function () {
             navMain.collapse('hide');
        });
     });


    // video 
    if ($('.player').length) {
        $(".player").YTPlayer();
    }    

    $(".menu-area .navbar ul > li.menu-item-has-children").hover(
        function () {
            $(this).addClass('back-min');
        },
        function () {
            $(this).removeClass("back-min");
        }
    );


    $( ".showcase-item" ).hover(function() {
        $( this ).toggleClass("hover");
    });

    //Dark & Light jQuery

    
    var back_light = $('.back-dark-light');
        if(back_light.length){
        var toggle = document.getElementById("back-data-toggle");
        var storedTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");
        if (storedTheme)
            document.documentElement.setAttribute('data-theme', storedTheme)
        toggle.onclick = function() {
            var currentTheme = document.documentElement.getAttribute("data-theme");
            var targetTheme = "light";

            if (currentTheme === "light") {
                targetTheme = "dark";
            }
            document.documentElement.setAttribute('data-theme', targetTheme)
            localStorage.setItem('theme', targetTheme);
        };
    }
    

    //search 

    $('.sticky_search').on('click', function(event) {        
        $('.sticky_form').slideToggle('show');
        $( '.sticky_form input' ).focus();
    });


    $('.sticky_search').on('click', function() {
        $('body').removeClass('search-active').removeClass('search-close');
          if ($(this).hasClass('close-full')) {
            $('body').addClass('search-close');
        }
        else {
            $('body').addClass('search-active');
        }
        return false;
    });


    $('.sticky_form_search').on('click', function() {      
        $('body, html').removeClass('back-search-active').removeClass('back-search-close');
          if ($(this).hasClass('close-search')) {
          $('body, html').addClass('back-search-close');

        }
        else {
          $('body, html').addClass('back-search-active');
        }
        return false;
    });



    $("#back-header ul > li.classic").hover(
        function () {
            $('body').addClass('mega-classic');
        },
        function () {
            $('body.mega-classic').removeClass("mega-classic");
        }
    );

    $(document).ready(function(){
        function resizeNav() {
            $(".back-menu-ofcanvas").css({"height": window.innerHeight});
            var radius = Math.sqrt(Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2));
            var diameter = radius * 2;
            $(".off-nav-layer").width(diameter);
            $(".off-nav-layer").height(diameter);
            $(".off-nav-layer").css({"margin-top": -radius, "margin-left": -radius});
        }
        $(".menu-button, .close-button, .offwrap, .back-offcanvas").on('click', function() {
            $(".nav-toggle, .back-menu-ofcanvas, .close-button, body").toggleClass("back-offcanvas-open");
        });
        $(window).resize(resizeNav);
        resizeNav();
    });


    $('.menu li a').on('click', function () {
        $('.back-nav-container').removeClass('nav-active-menu-container')
    });

    // Get a quote popup

    $('.popup-quote').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#qname',
        removalDelay: 500, //delay removal by X to allow out-animation
        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#qname';
                }
            }
        }
    });

    $('.menu li a').on('click', function () {
        $('.back-menu-wrap-offcanvas').removeClass('back-offcanvas-open');
        $('body').removeClass('back-offcanvas-open')
    });


    $(function(){ 
        $( "ul.children" ).addClass( "sub-menu" );
    });

    $(".back-products-grid .product-btn .button").addClass("glyph-icon flaticon-shopping-bag");
    
     //Videos popup jQuery activation code
    $('.popup-videos').magnificPopup({
        disableOn: 10,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });


    // collapse hidden
    $(function(){ 
         var navMain = $(".navbar-collapse"); // avoid dependency on #id
         // "a:not([data-toggle])" - to avoid issues caused
         // when you have dropdown inside navbar
         navMain.on("click", "a:not([data-toggle])", null, function () {
             navMain.collapse('hide');
         });

     });


    //CountDown Timer
    var CountTimer = $('.CountDownTimer');
    if(CountTimer.length){ 
        $(".CountDownTimer").TimeCircles({
            fg_width: 0.030,
            bg_width: 0.8,
            circle_bg_color: "#ffffff",
            circle_fg_color: "#ffffff",
            time: {
                Days:{
                    text: countdown_data.day_text, 
                    color: "#fff"
                },
                Hours:{
                    text: countdown_data.hour_text, 
                    color: "#fff"
                },
                Minutes:{
                    text: countdown_data.sec_text, 
                    color: "#fff"
                },
                Seconds:{
                    text: countdown_data.min_text, 
                    color: "#fff"
                }
            }
        }); 
    }

    //Select box wrap css
    $( ".mptt-shortcode-wrapper .mptt-navigation-select" ).wrap( "<div class='mptt-select'></div>" ); 
    $(".menu-area .navbar ul > li.mega > ul.sub-menu").wrapInner("<div class='container flex-mega'></div>");
    $('.menu-area .navbar ul > li.mega > ul.sub-menu li').first().addClass('first-li-item');


    if ($('div').hasClass('openingfoot')) {
        $('body').addClass('openingfootwrap');
    }

    if ($('div').hasClass('menu-sticky')) {
        $('body').addClass('back-on-sticky');
    }
       
    // Sticky Sidebar
    $('.contents-sticky, .sticky-sidebar').theiaStickySidebar({
        additionalMarginTop: 160,
        additionalMarginBottom: 20,
    });

    if ($('.back__scroll__yes').length) {    
        $(".back__scroll__yes").niceScroll(".back__scroll__yes .row",{
            boxzoom:true,
            cursorcolor: "#0088CB",
            cursoropacitymax: 4,
            cursorwidth: "4px",
            cursorborder: "4px solid #0088CB", 
            cursorborderradius: "4px",
        });
    }

    //preloader
    $(window).on( 'load', function() {
        $("#back__preloader").delay(400).fadeOut(300);
        $("#back__preloader").delay(400).fadeOut(300);
    })

    // image loaded portfolio init
    $('.grid').imagesLoaded(function() {
        $('.portfolio-filter').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        var $grid = $('.grid').isotope({

            animationOptions: {
             duration: 750,
             easing: 'linear',
             queue: false
           },

            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-item',
            }
        });
    });
            
    // portfolio Filter
    $('.portfolio-filter button').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });
    

     // magnificPopup init
    $('.image-popup').magnificPopup({
        type: 'image',
        callbacks: {
            beforeOpen: function() {
               this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure animated zoomInDown');
            }
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return '<div class="gallery-title-wrap"><h3>' + item.el.attr('title') + '</h3>' + '<p>' + item.el.attr('caption') + '</p></div>';
            }
        },
        gallery: {
            enabled: true
        }
    });

    
    // scrollTop init
    var win=$(window);
    var totop = $('#scrollUp');    
    win.on('scroll', function() {
        if (win.scrollTop() > 150) {
            totop.fadeIn();
        } else {
            totop.fadeOut();
        }
    });
    totop.on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    });   

    $(function(){ 
        $( "ul.children" ).addClass( "sub-menu" );
    });    
    
    $( ".comment-body, .comment-respond" ).wrap( "<div class='comment-full'></div>" ); 
    $('.back-heading .description p:empty').remove();
    
    //woocommerce quantity style
    if ( ! String.prototype.getDecimals ) {
          String.prototype.getDecimals = function() {
              var num = this,
                  match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
              if ( ! match ) {
                  return 0;
              }
              return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
          }
      }
    // Quantity "plus" and "minus" buttons
    $( document.body ).on( 'click', '.plus, .minus', function() {
        var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $( this ).is( '.plus' ) ) {
            if ( max && ( currentVal >= max ) ) {
                $qty.val( max );
            } else {
                $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        } else {
            if ( min && ( currentVal <= min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        }
        // Trigger change event
        $qty.trigger( 'change' );
    });
})(jQuery);  