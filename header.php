<?php
/**
 * The template for displaying the header.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<title> <?php wp_title( '| PBT', true, 'right' ); ?> </title>

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

	<script type="text/javascript" src="//use.typekit.net/dlv3qjg.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

	<nav class="collapse collapse-bar" role="navigation" id="navbarCollapse">
		<div class="container-fluid">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'depth'             => 2,
		            'container'         => 'div',
		            'menu_class'        => 'nav navbar-nav navbar-left'
				) ); ?>

				<div class="nav navbar-nav navbar-right">
					<ul>
						<li>
							<a target="_blank" href="http://www.facebook.com/plattebasin">
								<i class="fa fa-facebook fa-lg"></i>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://www.instagram.com/plattebasin">
								<i class="fa fa-instagram fa-lg"></i>
							</a>
						</li>

					</ul>
				</div>
		</div>
	</nav>

	<div class="collapse collapse-bar" role="search" id="searchbarCollapse">
		<div class="container-fluid">

				<div class="nav navbar-nav navbar-right">
					<?php get_search_form( ); ?>
				</div>
		</div>
	</div>

	

	