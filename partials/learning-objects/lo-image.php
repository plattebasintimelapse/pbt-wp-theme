<?php
/**
 * The Learning Object format for an image
 */ ?>

<section id="lo-<?php the_ID(); ?>" <?php post_class('row row-padding'); ?>>
	<div class="col col-sm-6">
        <?php the_post_thumbnail(); ?>
    </div>

    <div class="col col-sm-6">
        <?php the_content(); ?>
    </div>
</section>