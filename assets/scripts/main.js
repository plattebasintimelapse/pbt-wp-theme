(function($) {

    $(document).ready(function () {
        console.log('Scripts all work, eh?');

        $body                       = $('body');
        $window                     = $(window);
        $navbarCollapse             = $('#navbarCollapse');
        $searchbarCollapse          = $('#searchbarCollapse');
        $navbarCollapseLink         = $('a[data-target="#navbarCollapse"]');
        $searchbarCollapseLink      = $('a[data-target="#searchbarCollapse"]');
        $searchbarInput             = $('#searchbarCollapse input#s');
        $heroImageBehind            = $('.hero-image-behind');

        var s = skrollr.init();

        runHeightSpecificStyles();

        $.each( $('.post-meta-box-lg'), function() {
            // console.log( $(this).height() );
            if ( $(this).height() < 101 ) {
                $(this).addClass('post-meta-box-short');
            } else if ( $(this).height() < 148  && $window.width() > 768 ) {
                $(this).addClass('post-meta-box-normal');
            } else if ( $(this).height() < 210  && $window.width() > 768 ) {
                $(this).addClass('post-meta-box-tall');
            } else if ( $(this).height() >= 210  && $window.width() > 768 ) {
                $(this).addClass('post-meta-box-ex-tall');
            }
        });

        $.each( $('.post-meta-box-sm'), function() {
            // console.log( $(this).height() );
            if ( $(this).height() > 80 ) {
                $(this).addClass('post-meta-box-tall');
            } else {
                $(this).addClass('post-meta-box-normal');
            }
        });

        setTimeout(function() {
            $('.home .featured-meta-box h1').animate({
                'margin-top': '0px',
                'opacity': '1'
            },1000);
        }, 1000);
        setTimeout(function() {
            $('.home .featured-meta-box h2').animate({
                'margin-top': '0px',
                'opacity': '1'
            },1000);
        }, 2000);
        setTimeout(function() {
            $('.main-widgeted-text').find('span').animate({
                'opacity': '1'
            },1000);
        }, 4000);
    });

    $(window).resize(function(){
        runHeightSpecificStyles();
    });

    function runHeightSpecificStyles() {
        windowHeight = $window.height();

        $('.iframe-full-width-height').height( windowHeight );
        $heroImageBehind.height( getHeroImageHeight( windowHeight ) );
    }

    var getHeroImageHeight = function(h) {
        if ( h < 720 ) {
            return h - 20;
        } else {
            return h - 80;
        }
    }

    $(function() {

        $('.post-thumbnail').hover(function() {

            $this = $(this);
            $this.addClass('is-hovered');
            setTimeout(function(){
                $this.addClass('animation-complete');
            }, 500);

        },function(){

            $this = $(this);
            $this.removeClass('is-hovered');
            setTimeout(function(){
                $this.removeClass('animation-complete');
            }, 500);

        });

        $('.post-thumbnail').hover(function() {

            $this = $(this);
            $this.addClass('is-hovered');
            setTimeout(function(){
                $this.addClass('animation-complete');
            }, 500);

        },function(){

            $this = $(this);
            $this.removeClass('is-hovered');
            setTimeout(function(){
                $this.removeClass('animation-complete');
            }, 500);

        });

        $navbarCollapseLink.click(function(){
            $body.toggleClass('nav-is-open');

            $(this).find('i').toggleClass('fa-close').toggleClass('fa-bars');

            if ( $body.hasClass('search-is-open') ) {
                $searchbarCollapse.collapse('toggle');
                $body.toggleClass('search-is-open');
            }
        });

        $searchbarCollapseLink.click(function(){
            $body.toggleClass('search-is-open');

            if ( $body.hasClass('nav-is-open') ) {
                $navbarCollapse.collapse('toggle');
                $body.toggleClass('nav-is-open');
                $navbarCollapseLink.find('i').toggleClass('fa-close').toggleClass('fa-bars');
            }

            if ( $body.hasClass('search-is-open') ) {
                setTimeout(function() {
                    $searchbarInput.focus();
                }, 500);
            }
        });

        $('.toggle-info').click(function() {
            $(this).parent().siblings('#userImgCollapse').collapse('toggle');
            $(this).toggleClass('fa-plus-circle').toggleClass('fa-minus-circle');
        });
    });

    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });

})(jQuery);