<?php
/**
 * The default Learning Object format
 */

?>

<section id="lo-<?php echo $lo_id ?>" <?php post_class('row row-padding'); ?>>
	<div class="col-xs-12 <?php if( get_field('two_columns', $lo_id  ) ) { echo 'split'; } ?>">
		<?php the_field('pre_learn_more', $lo_id ); ?>
	</div>
</section>