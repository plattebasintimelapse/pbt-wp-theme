<?php
/**
 * The main header that appears at the top of every page.
 * Provides buttons to access the hidden top nav menu.
 */
 ?>

 <body <?php body_class(); ?> >
	<a name="top"></a>

	<nav class="collapse collapse-bar" role="navigation" id="navbarCollapse">
		<div class="container-fluid">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'depth'             => -1,
		            'container'         => 'div',
		            'container_class' 	=> 'main-nav',
		            'menu_class'        => 'nav navbar-nav navbar-left'
				) ); ?>

				<?php  wp_nav_menu( array(
					'theme_location' => 'secondary',
					'depth'             => -1,
		            'container'         => 'div',
		            'container_class' 	=> 'social-nav',
		            'menu_class'        => 'nav navbar-nav navbar-right',
		        ) );  ?>
		</div>
	</nav>

	<div class="collapse collapse-bar" role="search" id="searchbarCollapse">
		<div class="container-fluid">
				<div class="nav navbar-nav">
					<?php get_search_form( ); ?>
				</div>
		</div>
	</div>

	<header>
		<div class="container-fluid">
			<a class="navbar-brand hidden-xs" href="<?php echo home_url(); ?>">
				<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo-full.png" alt="">
			</a>

			<a class="pull-left hidden-sm hidden-md hidden-lg" href="<?php echo home_url(); ?>">
				<h3 class="site-title">PBT</h3>
			</a>

			<a class="btn pull-right" data-toggle="collapse" data-target="#searchbarCollapse" aria-expanded="false" aria-controls="searchbarCollapse">
				<span class="sr-only">Search</span>
		    	<i class="fa fa-search fa-lg"></i>
			</a>

			<a class="btn pull-right" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" aria-controls="navbarCollapse">
				<span class="sr-only">Toggle navigation</span>
		    	<i class="fa fa-bars fa-lg"></i>
			</a>

		</div>
	</header>