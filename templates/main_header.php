<?php
/**
 * The main header that appears at the top of every page.
 * Provides buttons to access the hidden top nav menu.
 */
 ?>

<header>
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo.png" alt=""></a>
		</div>

		<a class="btn btn-prim pull-right" data-toggle="collapse" href="#navbarCollapse2" aria-expanded="false" aria-controls="navbarCollapse2">
			<span class="sr-only">Toggle navigation</span>
	    	<i class="fa fa-bars fa-lg"></i>
		</a>

		<a class="btn btn-prim pull-right" data-toggle="collapse" href="#searchbarCollapse2" aria-expanded="false" aria-controls="searchbarCollapse2">
			<span class="sr-only">Search</span>
	    	<i class="fa fa-search fa-lg"></i>
		</a>

	</div>
</header>