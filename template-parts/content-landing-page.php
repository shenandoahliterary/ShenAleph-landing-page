<?php
/**
 *
 *
 */
?>
<section class="container-fluid">
<div class="row cover-row text-center">
	<?php
$uploads = wp_upload_dir();
$upload_path =  $uploads['baseurl'];
/* need to set image in admin dashboard or in a custom field */
	?>
<!-- <img  class="img-fluid cover-image w-100" src="<?php echo $upload_path ?>/2018/12/cover-7-500.jpg"> -->
<img  class="img-fluid cover-image m-auto" src="https://shenandoahliterary.org/712/files/2022/06/572x700.jpg">
</div>
<div class="row volumeIssue">
</div>
</section>

<section class="container">
<div class="row">
	<div class="col-md-8 offset-md-2 TOC-column-1">

		<?php
		remove_all_filters('posts_orderby');
		$landingpage_args = array(
			'page_id' => '7084'
		);
		$landingpage_loop = new WP_Query($landingpage_args);
				while ($landingpage_loop->have_posts()) : $landingpage_loop->the_post();
				 ?>
				<div class="issue-entry-box">
					<?php the_content();  ?>
			</div>
		<?php endwhile;
		wp_reset_postdata();
		?>






	</div> <!-- close column -->
</div> <!-- close row -->


<div class="row">
	<div class="col-md-8 offset-md-2 single-space-paragraphs">




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
<p>&ldquo;I swallowed until the elephant trunk was empty, and I decided then that I’d shun my spit in favor of this: her fists fattening into clouds, wads of water filling my throat.&rdquo;<br />

&nbsp; <br />
—K-Ming Change, <a href="https://shenandoahliterary.org/712/lizard-luck/">&ldquo;Lizard Luck&rdquo;</a></p>

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
<!--  suppress error message when no features are presented
					 Oops, there are no features. Need to remove this section since quote is hardcoded for now.
-->
			<?php
				endif;
				wp_reset_postdata();
			?>

</section>
</div>
</div>
