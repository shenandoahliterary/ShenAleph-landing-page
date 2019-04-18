<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
	 <!-- removed topbanner class on section in order to remove border bottom color -->
 			<section class="container-fluid" id="typelogo-container">
 				<div class="row">
					<div class="col-md-2 offset-md-1 typelogo-column">
 			<?php	the_custom_logo(); ?>
 		</div>
 		<div class="col-md-8">
 			<h1 class="text-right" id="typelogo">Shenandoah</h1>
 			</div>
 		</div>
 		</section>



	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

			<?php
			if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
