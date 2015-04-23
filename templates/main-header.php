<?php
/**
 * The main header that appears at the top of every page.
 * Provides buttons to access the hidden top nav menu.
 */
 ?>

<header>
	<div class="container-fluid">
		<a class="navbar-brand hidden-xs" href="<?php echo home_url(); ?>">
			<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo-full.png" alt="">
		</a>

		<a class="pull-left hidden-sm hidden-md hidden-lg" href="<?php echo home_url(); ?>">
			<h2 class="site-title">PBT</h2>
		</a>

		<a class="btn btn-prim pull-right" data-toggle="collapse" data-target="#searchbarCollapse" aria-expanded="false" aria-controls="searchbarCollapse">
			<span class="sr-only">Search</span>
	    	<i class="fa fa-search fa-2x"></i>
		</a>

		<a class="btn btn-prim pull-right" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" aria-controls="navbarCollapse">
			<span class="sr-only">Toggle navigation</span>
	    	<i class="fa fa-bars fa-2x"></i>
		</a>

	</div>
</header>