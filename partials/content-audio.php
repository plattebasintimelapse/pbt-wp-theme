<?php
/**
 * The content template for displaying audio posts
 */

	echo '<h6 class="text-center font-size-ex-small"><em>Posted on ' . get_the_date( 'F j, Y' ) . '</em></h6>';

	pbt_bylines();

	the_content();

	$audio_file = get_field('audio_file'); ?>

	<div class="featured-audio">
		<?php echo do_shortcode('[audio mp3='.$audio_file.' flip="y" title="" fontsize="32px"][/audio]'); ?>
	</div>

	<aside class="post-meta"></aside>