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

get_header();
?>
<div class="row volumeIssue">
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
					 if ( has_tag('columns-3') ) :
						 get_template_part( 'template-parts/content', 'col3' );

						elseif ( has_tag('columns-12') ) :
							 get_template_part( 'template-parts/content', 'col12' );

					 elseif (has_tag('erasure') )  :
	 									get_template_part( 'template-parts/content', 'erasure' );

					elseif (has_tag('translation') )  :
							get_template_part( 'template-parts/content', 'translation' );



					 else :

					get_template_part( 'template-parts/content', get_post_type() );
				endif;
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
