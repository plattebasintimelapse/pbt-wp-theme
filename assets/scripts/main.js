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

        $.each( $('.post-meta-box'), function() {
            // console.log( $(this).height() );
            if ( $(this).height() < 101 ) {
                $(this).css('top', '25%');
            } else if ( $(this).height() < 148  && $window.width() > 768 ) {
                $(this).css('top', '15%');
            } else if ( $(this).height() < 210  && $window.width() > 768 ) {
                $(this).css('top', '8%');
            } else if ( $(this).height() >= 210  && $window.width() > 768 ) {
                $(this).css({
                    top: '2%',
                    width: '94%',
                    marginLeft: '-47%'
                });
            }
        });

        $.each( $('.post-meta-box-small'), function() {
            // console.log( $(this).height() );
            if ( $(this).height() > 130 ) {
                $(this).css('top', '0%');
            } else if ( $(this).height() > 110 ) {
                $(this).css('top', '5%');
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
                }, 1000);
            }
        });
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
})(jQuery);

(function($) {

    $('.post-thumbnail').hover(function() {

        $(this).find('img').animate({
            opacity: '.7'
        }, 'fast', 'linear');

        $(this).find('.post-title').animate({
            opacity: '0',
            marginTop: '-20px'
        }, 'fast', 'linear').fadeOut();

        $(this).find('.read-more-btn').animate({
            opacity: '1',
            marginTop: '20px'
        }, 'fast', 'linear');

    },function(){
        $(this).find('img').animate({
            opacity: '1'
        }, 'fast', 'linear');

        $(this).find('.post-title').animate({
            opacity: '1',
            marginTop: '0'
        }, 'fast', 'linear').fadeIn();

        $(this).find('.read-more-btn').animate({
            opacity: '0',
            marginTop: '0'
        }, 'fast', 'linear');
    });

    $('.toggle-info').click(function() {
        $(this).parent().siblings('#userImgCollapse').collapse('toggle');
        $(this).toggleClass('fa-plus-circle').toggleClass('fa-minus-circle');
    });

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

})(jQuery);
