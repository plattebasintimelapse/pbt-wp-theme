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

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
      			</button>
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

		