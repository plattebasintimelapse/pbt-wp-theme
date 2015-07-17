<?php
/**
 * The default Learning Object format
 */

?>

<section id="lo-<?php echo $lo_id ?>" <?php post_class('row row-padding'); ?>>
	<div class="col-xs-12 <?php if( get_field('two_columns', $lo_id ) ) { echo 'split'; } ?>">
		<?php echo '<h3>Chapter ' . $i . ': ' . get_the_title($lo_id) . '</h3>'; ?>
		<?php echo pbt_get_learning_object_lessoned_content($has_lesson, $has_more, $lo_id); ?>
	</div>
</section>