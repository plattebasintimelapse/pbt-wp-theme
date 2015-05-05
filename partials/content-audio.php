<?php
/**
 * The content template for displaying audio posts
 */

	pbt_byline();

	the_content();

	$audio_file = get_field('audio_file'); ?>

	<div class="featured-audio container">
		<div class="col-sm-2">
			<h4 class="featured-audio-prompt">Listen</h4>
		</div>
		<div class="col-sm-10">
			<?php echo do_shortcode('[audio mp3='.$audio_file.' flip="y" title="" fontsize="32px"][/audio]'); ?>
		</div>
	</div>