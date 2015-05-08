<?php
/**
 * The Learning Object format for interactives
 */

$url = get_field('interactive_url');
$slug = sanitize_title( get_the_title() );
?>

<section id="lo-<?php the_ID(); ?>" <?php post_class('row row-padding'); ?>>
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



