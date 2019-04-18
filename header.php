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
<!--	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.jpg" /> -->
<link rel="stylesheet" href="https://use.typekit.net/nci7nxi.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- start Bootstrap container -->
<div id="page" class="site">

			<section class="topbanner container-fluid" id="typelogo-container">
				<div class="row">
					<?php	the_custom_logo(); ?>
				</div>
				<div class="row">
		<div class="col-md-11">
			<h1 class="" id="typelogo"><a href="https://shenandoahLiterary.org/681/">Shenandoah</a></h1>
		</div>
		</div>
		<div class="row">
			<div class="col-md-5 offset-md-1">
				<div class="volumeIssueBanner">
				<span class="">Volume 68, Number 1 &middot; Fall 2018</span>
				</div>
		</div>
			<div class="col-md-5">
				<div class="shen-nav d-flex flex-column flex-sm-row justify-content-end" >
					<a class="nav-item nav-link" href="https://shenandoahliterary.org/681/about/">About</a>
					<a class="nav-item nav-link" href="https://shenandoahliterary.org/681/issues/">Issues</a>
					<a class="nav-item nav-link" href="https://shenandoahliterary.org/681/submit/">Submit</a>
					<a class="nav-item nav-link" href="https://shenandoahliterary.org/681/category/feature">The Peak</a>
				</div>
				</div>
		</div>
		</section>


	<div id="content" class="site-content">
