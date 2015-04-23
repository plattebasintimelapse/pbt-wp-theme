<?php
/**
 * The template for displaying the header.
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title> <?php wp_title( '| PBT', true, 'right' ); ?> </title>

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >
	<a name="top"></a>

	<nav class="collapse collapse-bar" role="navigation" id="navbarCollapse2">
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

	<div class="collapse collapse-bar" role="search" id="searchbarCollapse2">
		<div class="container-fluid">
				<div class="nav navbar-nav navbar-right">
					<?php get_search_form( ); ?>
				</div>
		</div>
	</div>

	<section class="featured hero-image">
		<div class="container-fluid">
			<?php get_template_part( 'templates/main_header' ); ?>
