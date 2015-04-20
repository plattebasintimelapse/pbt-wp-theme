$(function() {
  	console.log('Scripts all work, eh?');

  	// $('.story-thumbnail').hover(
  	// 	function() {
	  // 		$(this).find('.post-title').fadeOut();
	  // 		$(this).find('.read-more-btn').fadeIn();
  	// 	},function() {
  	// 		$(this).find('.post-title').fadeIn();
	  // 		$(this).find('.read-more-btn').fadeOut();
  	// 	}
  	// );
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
});