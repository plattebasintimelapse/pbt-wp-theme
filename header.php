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

	<title> <?php bloginfo( 'name' ); ?> </title>

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

	<script type="text/javascript" src="//use.typekit.net/dlv3qjg.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

	<nav class="navbar navbar-defalt navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">

      			<!-- <button type="button" class="pull-right">
			        <span class="sr-only">Toggle navigation</span>
			        <i class="fa fa-bars fa-2x"></i>
      			</button> -->

				<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo.png" alt=""></a>
    		</div>

  			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'depth'             => 2,
	            'container'         => 'div',
	            'container_class'   => 'collapse navbar-collapse',
	    		'container_id'      => 'bs-example-navbar-collapse-1',
	            'menu_class'        => 'nav navbar-nav navbar-right'
			) ); ?>

			<?php /** wp_nav_menu( array( 'theme_location' => 'secondary') ); */ ?>

  		</div><!-- /.container-fluid -->
	</nav>