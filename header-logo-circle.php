<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ShenAleph
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.jpg" />
<link rel="stylesheet" href="https://use.typekit.net/nci7nxi.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- start Bootstrap container -->
<div id="page" class="site">

			<section class="topbanner container-fluid" id="typelogo-container">
				<div class="row">
			<div class="col-md-2 offset-md-1 typelogo-column">
			<?php	the_custom_logo(); ?>
		</div>
		<div class="col-md-8">
			<h1 class="text-right" id="typelogo">Shenandoah</h1>
		<!--	<nav class="nav nav-pills mx-auto my-3 mr-md-3  my-md-3 d-flex flex-column flex-sm-row nav-justified" >
		<div class="nav nav-pills mx-auto my-3 mr-md-3  my-md-3 d-flex flex-column flex-sm-row" >
			<a class="nav-item nav-link btn-ilqmenu" href="#">Archives</a>
			<a class="nav-item nav-link  btn-ilqmenu" href="#">Masthead</a>
			<a class="nav-item nav-link btn-ilqmenu" href="#">Submit</a>
		</div>

-->
				<div class="shen-nav d-flex flex-column flex-sm-row justify-content-end" >
					<a class="nav-item nav-link" href="#">About</a>
					<a class="nav-item nav-link" href="#">Archives</a>
					<a class="nav-item nav-link" href="#">Submit</a>
				</div>
				</div>
		</div>
		</section>


	<div id="content" class="site-content">
