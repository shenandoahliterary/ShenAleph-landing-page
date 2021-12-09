<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ShenAleph
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content container">
		<div class="row">
			<div class="col-md-8 offset-2">
		<?php
		the_content();


		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
