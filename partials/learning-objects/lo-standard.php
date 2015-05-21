<?php
/**
 * The default Learning Object format
 */

?>

<section id="lo-<?php echo $lo_id ?>" <?php post_class('row row-padding'); ?>>
	<div class="col-xs-12 <?php if( get_field('two_columns', $lo_id  ) ) { echo 'split'; } ?>">
		<?php if ($has_lesson) { the_field('pre_learn_more', $lo_id ); } else { echo get_the_content_by_id( $lo_id ); } ?>
	</div>
</section>