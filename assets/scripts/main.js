$(document).ready(function () {
    console.log('Scripts all work, eh??');

    $body                       = $('body');
    $window                     = $(window);
    $navbarCollapse             = $('#navbarCollapse');
    $searchbarCollapse          = $('#searchbarCollapse');
    $navbarCollapseLink         = $('a[data-target="#navbarCollapse"]');
    $searchbarCollapseLink      = $('a[data-target="#searchbarCollapse"]');
    $searchbarInput             = $('#searchbarCollapse input#s');
    $heroImageBehind            = $('.hero-image-behind');

    windowHeight = $window.height();
    $heroImageBehind.height( getHeroImageHeight(windowHeight) );

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
    windowHeight = $window.height();

    $heroImageBehind.height( getHeroImageHeight(windowHeight) );
});

var getHeroImageHeight = function(h) {
    return h - 200;
}

$(function() {

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