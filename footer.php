<?php
/**
 * The template for displaying the footer.
 */

$options = get_option( 'pbt_settings' );
?>

<footer>
	<div class="container-fluid">
		<div class="row">
			<nav role="navigation">
				<div class="col-xs-12">
					<?php wp_nav_menu( array(
						'theme_location' 	=> 'footer',
						'depth'             => -1,
			            'container'         => 'div',
			            'container_class'	=> 'footer-menu',
			            'menu_class'        => 'nav navbar-nav navbar-left',
			            'menu_id'        	=> 'footer-menu'
					) ); ?>
				</div>
			</nav>
		</div>

		<div class="row row-padding">
			<div class="col col-md-4 col-md-offset-2 col-extra-padding">
				<?php dynamic_sidebar( 'pbt-footer-secondary-left' ); ?>
			</div>
			<div class="col col-md-4 col-extra-padding">
				<?php dynamic_sidebar( 'pbt-footer-main' ); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-sm-offset-2">
				
				<p class="text-center font-size-ex-small"><?php echo $options['pbt_legal_disclaimer']; ?></p>
				<p class="text-center font-size-ex-small"><?php echo 'Copyright &copy; 2011-' . date('Y') ?></p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>