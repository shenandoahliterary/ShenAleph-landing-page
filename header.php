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

	<section class="topbanner-noborder container-fluid">

		<div class="d-flex justify-content-center align-items-center" style="background-color: white">
            <p>
                <img style="width:8vw; height:auto; padding-top:4vw; padding-right: 1.25vw" src="<?php echo get_stylesheet_directory_uri(); ?>/logo-1600.png" alt="Shenandoah Logo" itemprop="logo">
            </p>
            <p id="typelogo">
				<a href="https://shenandoahLiterary.org/721/" style="color: rgb(103,173,168)">Shenandoah</a>
			</p>
		</div>

		<div class="row nav-bar-row" style="margin-top:.25vw; padding-top:.5vw">
			<div class="col-md-4">
				<div class="volumeIssueBanner" style="padding-left: 6vw">
					Volume 72, Number 2 &middot; Spring 2023
				</div>
			</div>

			<div class="d-flex flex-nowrap col-md-8 float-md-end nav-bar" role="navigation">
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/721/#toc">Current Issue</a>
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/about/">About</a>
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/issues/">Archive</a>
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/submissions/">Submit</a>
				<a class="nav-link" style="padding-right:6.8vw" href="https://shenandoahliterary.org/thepeak">The Peak</a>
			</div>
		</div>

	</section>


	<div id="content" class="site-content">
