<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ShenAleph
 */

?>
<div class=""="row">
 <div id="translation-control-panel" class="col-md-10 offset-md-2">
<p class="text-right"><a href="#" id="select-original">view original</a> <a href="" id="select-translation">view translation</a> <a href="#" id="select-sidebyside">view side-by-side</a></p>
</div>
</div>

<div class="row">
<div class="col-md-8 offset-md-2">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title('<h1 class="entry-title">','</h1>' );


		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<!-- add byline -->
				<div class="workAuthorByline"><?php
 				//shenAleph_filter_authors();
 			 the_author_meta('display_name') ?></div>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

</div>
</div>
	<div class="entry-content category-translations row">
		<div class="col-md-8 offset-md-2">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shenAleph' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shenAleph' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	</div><!-- .entry-content -->
<!-- author bio -->
<section class="row">
  <div class="col-md-8 offset-md-2"</div>
	<hr>
	<section class="workAuthorBio"><?php the_author_meta('description') ?></section>
<!-- add translator bio -->
<?php
$custom_fields = get_post_custom();

$my_custom_field = $custom_fields['translator_lastname'];

  foreach ( $my_custom_field as $key => $value ) {
  	//echo $key . " => " . $value . "<br />";


      $args_authors = array(

                   'meta_key' => "last_name",
                   'meta_value' => "$value",
                   'meta_compare' => 'LIKE'
                 );
        $author_loop = new WP_User_Query($args_authors);
        $author_names = $author_loop->get_results();


        if (! empty($author_names)) {

          foreach ($author_names as $author_name) {
?>
<section class="workAuthorBio translatorBio">
<?php
            echo "$author_name->description </section>";
          }
        }
          else {echo "No authors found";}


    }


?>
</div>
</section>
	<footer class="entry-footer">
		<?php shenAleph_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
</div>
</div>
