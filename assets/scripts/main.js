$(function() {
  	console.log('Scripts all work, eh??');

    $body = $('body');
    $navbarCollapse = $('a[data-target="#navbarCollapse"]');
    $searchbarCollapse = $('a[data-target="#searchbarCollapse"]');
    $searchbarInput = $('#searchbarCollapse input#s');

    $navbarCollapse.click(function(){
        $body.toggleClass('nav-is-open');
        // if ( $body.hasClass('nav-is-open') ) {
            // $(this).find('i').addClass('fa-close');
            // $(this).find('i').removeClass('fa-bars');
        // } else {
            $(this).find('i').toggleClass('fa-close').toggleClass('fa-bars');
        // }
    });

    $searchbarCollapse.click(function(){
        $body.toggleClass('search-is-open');
        if (!$body.hasClass('search-is-open') ) {
            $searchbarInput.focus();
        }
    });

    $('.toggle-info').click(function() {
        $(this).parent().siblings('#userImgCollapse').collapse('toggle');
    });

  	// $('.story-thumbnail').hover(
  	// 	function() {
	  // 		$(this).find('.post-title').fadeOut();
	  // 		$(this).find('.read-more-btn').fadeIn();
  	// 	},function() {
  	// 		$(this).find('.post-title').fadeIn();
	  // 		$(this).find('.read-more-btn').fadeOut();
  	// 	}
  	// );

    $(document).ready(function () {

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