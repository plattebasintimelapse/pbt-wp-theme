<?php
/**
 * The Learning Object format for interactives
 */

$url = get_field('interactive_url');
$slug = sanitize_title( get_the_title() );
?>

<section id="lo-<?php echo $lo_id ?>" <?php post_class('row row-padding'); ?>>
	<div class="col-xs-12">
		<div id="<?php $slug; ?>"></div>
	</div>
	<?php
		$iframe =   '<div id="' . $slug . '"></div>
		                <script type="text/javascript" src="' . get_template_directory_uri() . '/assets/scripts/lib/pym.min.js"></script>
		                <script type="text/javascript">
		                    var pymParent = new pym.Parent("' . $slug . '", "' . $url . '", {});
		                </script>';

		echo $iframe;
	?>
</section>

<section>
	<div class="row">
		<div class="col-xs-12">
			<?php if ($has_lesson) { the_field('pre_learn_more', $lo_id ); } else { echo get_the_content_by_id( $lo_id ); } ?>
		</div>
	</div>
</section>



