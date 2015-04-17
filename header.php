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

	<nav class="navbar">
  		<div class="container-fluid">
    		<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo.png" alt=""></a>
    		</div>

  			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'depth'             => 2,
	            'container'         => 'nav',
	            'menu_class'        => 'nav navbar-nav navbar-right'
			) ); ?>

			<?php  wp_nav_menu( array(
				'theme_location' => 'secondary',
				'depth'             => 2,
	            'container'         => 'nav',
	            'menu_class'        => 'nav navbar-nav navbar-right',
	        ) );  ?>

  		</div><!-- /.container-fluid -->
	</nav>