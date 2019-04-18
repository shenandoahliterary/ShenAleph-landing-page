<?php
/**
* Template Name: Front Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.

 *
 * @package ShenAleph
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :




							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								 *
								 *
								 * Pulls in content
								 */
								get_template_part( 'template-parts/content', 'landing-page' );
							endwhile;

						?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
