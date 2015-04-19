<?php
/**
 * The template for displaying the footer.
 */
?>

<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'depth'             => -1,
		            'container'         => 'nav',
		            'menu_class'        => 'nav navbar-nav navbar-footer',
		            'menu_id'        	=> 'menu-footer'
				) ); ?>
			</div>
		</div>

		<div class="row row-padding">
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'pbt-footer-secondary-left' ); ?>
			</div>
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'pbt-footer-main' ); ?>
			</div>
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'pbt-footer-secondary-right' ); ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>