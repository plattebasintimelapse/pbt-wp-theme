<?php
/**
 * The default Learning Object format
 */ ?>

<section id="lo-<?php the_ID(); ?>" <?php post_class('row row-padding'); ?>>
	<div class="col-xs-12">
		<?php the_content(); ?>
	</div>
</section>