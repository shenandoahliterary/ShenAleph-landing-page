<?php
/**
 *
 *
 */
?>
<section class="container-fluid">
<div class="row cover-row">
	<?php
$uploads = wp_upload_dir();
$upload_path =  $uploads['baseurl'];
/* need to set image in admin dashboard */
	?>
<img  class="img-fluid cover-image w-100" src="<?php echo $upload_path ?>/2018/12/cover-7-500.jpg">
</div>
<div class="row volumeIssue">
</div>
</section>

<section class="container TOCsection">
<div class="row">
	<div class="col-md-4 offset-md-1 TOC-column-1">








	</div> <!-- close column -->
	<div class="col-md-4 offset-md-1">
		<h3>Poetry</h3>



		<h3>Interview</h3>




</div> <!-- close column -->
</div> <!-- close row -->


<div class="row">
	<div class="col-md-8 offset-md-2 single-space-paragraphs">
<p><a href="https://shenandoahliterary.org/681/editors-note/">Editor&rsquo;s Note</a><br /><span class="author_name">Beth Staples</span></p>



	</div>
</div>
</section>

<!--  Features section -->
<section class="container TOC-quote">
<div class="row">
	<div class="col-md-10 offset-md-1 h-100">
<?php
$args = array(
    'meta_key'         => 'add-quote-to-toc',
		'meta_value'   => 'Yes',
		'compare' => 'Like',
		'post_type'        => 'page',
    'post_status'      => 'publish',

);
$query = new WP_Query($args);

if ($query->have_posts()) :
		 while($query->have_posts()) :
				$query->the_post();
?>

				<?php the_content() ?>

<?php
		 endwhile;
	else:
?>

		 Oops, there are no posts.

<?php
	endif;
	wp_reset_postdata();
?>
		</div>
	</div>
</section>
<section class="container-fluid TOC-features">
		<div class="card-group">
			<?php
			$args = array(
			    'category_name'         => 'feature',

			);
			$category_posts = new WP_Query($args);

			if ($category_posts->have_posts()) :
					 while($category_posts->have_posts()) :
							$category_posts->the_post();
			?>
			<div class="card"><a href="<?php echo get_permalink(); ?>">
		   <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
			 <?php  the_post_thumbnail( 'full', array( 'class'=>'card-img img-fluid' ) );  ?>
		    <div class="card-body">
				<p class="card-text"><?php	the_excerpt() ?></p>
			</div>
		</a>
		</div>

			<?php
					 endwhile;
				else:
			?>

					 Oops, there are no features.

			<?php
				endif;
				wp_reset_postdata();
			?>

</section>
</div>
</div>
