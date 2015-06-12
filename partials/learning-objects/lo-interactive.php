<?php
/**
 * The Learning Object format for interactives
 */

$url = get_field('interactive_url', $lo_id);
$slug = sanitize_title( get_the_title(), $lo_id );
?>



<section id="lo-<?php echo $lo_id ?>" <?php post_class('row row-padding'); ?>>
	<div class="row">
		<div class="col-xs-12">
			<?php echo pbt_get_learning_object_lessoned_content($has_lesson, $lo_id); ?>
		</div>
	</div>
</section>

</div>

<div class="container-fluid">
	<section>
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
</div>

<div class="container">
	



