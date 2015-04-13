<?php
/**
 * The template for displaying the footer.
 */
?>

<footer>
	<div class="container-fluid">
		<div class="col-sm-4">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'depth'             => 2,
	            'container'         => 'div',
	            'container_class'   => 'collapse navbar-collapse',
	    		'container_id'      => 'bs-example-navbar-collapse-1',
	            'menu_class'        => 'nav navbr-nav navbar-right'
			) ); ?>
		</div>
		<div class="col-sm-4">
			<h2>A Signup form can go here</h2>
		</div>
		<div class="col-sm-4">
			<h3>Some other helpful things maybe</h3>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>