<?php
/**
 * The content template for displaying audio posts
 */

	pbt_bylines();

	the_content();

	$audio_file = get_field('audio_file'); ?>

	<div class="featured-audio">
		<?php echo do_shortcode('[audio mp3='.$audio_file.' flip="y" title="" fontsize="32px"][/audio]'); ?>
	</div>