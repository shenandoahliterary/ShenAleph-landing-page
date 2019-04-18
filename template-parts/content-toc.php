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

		<h3>Fiction</h3>
		<div>
			<?php
			remove_all_filters('posts_orderby');
			$fiction_args = array(
				'category_name' => 'fiction',
				'order' => 'ASC',
				'meta_key' => 'TOC_order',
				'orderby' => 'meta_value_num',
				'meta_type' => 'NUMERIC',
				'nopaging' => 'true',

			);
			$fiction_loop = new WP_Query($fiction_args);
					while ($fiction_loop->have_posts()) : $fiction_loop->the_post();
					 ?>
					<p>	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />

						<span class="author_name"><?php the_author();  ?></span>

				</p>
			<?php endwhile;
wp_reset_postdata();
			?>

		</div>
		<h3>Nonfiction</h3>
		<div>
			<?php
			remove_all_filters('posts_orderby');
			$nonfiction_args = array(
				'category_name' => 'nonfiction',
				'order' => 'ASC',
				'meta_key' => 'TOC_order',
				'orderby' => 'meta_value_num',
				'meta_type' => 'NUMERIC',
				'nopaging' => 'true',

			);
			$nonfiction_loop = new  WP_Query($nonfiction_args);
					while ($nonfiction_loop->have_posts()) : $nonfiction_loop->the_post();
					 ?>
					 <p>
					 <a href="<?php the_permalink(); ?>">
 					<?php the_title(); ?>
 					</a><br />
					<span class="author_name"><?php the_author(); ?> </span>
</p>
			<?php endwhile;
wp_reset_postdata();
			?>
		</div>

		<h3>Translations</h3>
		<div>
			<?php
			remove_all_filters('posts_orderby');
			$translations_args = array(
				'category_name' => 'translations',
				'order' => 'ASC',
				'meta_key' => 'TOC_order',
				'orderby' => 'meta_value_num',
				'meta_type' => 'NUMERIC',
				'nopaging' => 'true',

			);


			$nonfiction_loop = new  WP_Query($translations_args);
					while ($nonfiction_loop->have_posts()) : $nonfiction_loop->the_post();
					 ?>
					 <p>
					 <a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
					</a><br />
					<span class="author_name"><?php the_author(); ?> </span><br />
					<?php
					$custom_fields = get_post_custom();

					$my_custom_field = $custom_fields['translator_byline'];
					echo "$my_custom_field[0]";
					?>
	</p>
			<?php endwhile;
	wp_reset_postdata();
			?>
		</div>

							<h3>Comics</h3>
			    			<div>
			    				<?php 	$visualarts_loop = new WP_Query('cat=7&orderby=meta_value&meta_key=author_lastname&order=asc&nopaging=true');
			    						while ($visualarts_loop->have_posts()) : $visualarts_loop->the_post();
			    						 ?>
											<p>
												<a href="<?php the_permalink(); ?>">
				    						<?php the_title(); ?>
											</a><br />
			    						<span class="author_name"><?php the_author(); ?> </span><br />
										</p>
			    				<?php endwhile;
wp_reset_postdata();

									?>
			    			</div>


	</div> <!-- close column -->
	<div class="col-md-4 offset-md-1">
		<h3>Poetry</h3>
		<div>

			<?php
			remove_all_filters('posts_orderby');
			$poetry_args = array(
				'category_name' => 'poetry',
				'order' => 'ASC',
				'meta_key' => 'TOC_order',
				'orderby' => 'meta_value_num',
				'meta_type' => 'NUMERIC',
				'nopaging' => 'true',

			);

			$poetry_loop = new WP_Query($poetry_args);
				$authornames = array();

					while ($poetry_loop->have_posts()) : $poetry_loop->the_post();
						$this_author= get_post_meta($post->ID, 'author_lastname', true);
						$this_author_id =get_the_author_meta('ID');
						$authornames[$this_author_id] = $this_author;

//needs refactoring

foreach ($authornames as $author_id=>$author_lastname) { ?>



<?php }


//print statement of title and author just below worked but put each work and author separately
?>

<?php
					endwhile;


//below should give posts by author

				foreach ($authornames as $author_id=>$author_lastname) {
					$args = array(
				'category_name' => 'poetry',
				'author' => $author_id,
				'orderby' => 'title',
				'order' => 'asc',
				'nopaging' => 'true'
				);
				?>
				<?php
				$poetry_loop_single = new WP_Query($args);

				$i = 0;
				//open paragraph for title(s)/author
				echo "<p>";
					while ($poetry_loop_single->have_posts()) : 				$poetry_loop_single->the_post();
					//for each author, print title, title, author
					?>

					<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
					</a><br />



					<?php
					if ($i == 0) { ?>



						<?php } ?>

					<?php
					$i++;
				endwhile;
				//print author outside of the loop
				?>
				<span class="author_name"><?php the_author(); ?> </span>
			</p>
<?php
				wp_reset_postdata();
				}
				?>

		</div>


		<h3>Interview</h3>
							<div>
								<?php
								remove_all_filters('posts_orderby');
								$interview_args = array(
									'category_name' => 'interviews',
									'order' => 'ASC',
									'meta_key' => 'TOC_order',
									'orderby' => 'meta_value_num',
									'meta_type' => 'NUMERIC',
									'nopaging' => 'true',

								);
									$reviews_loop = new WP_Query($interview_args);
										while ($reviews_loop->have_posts()) : $reviews_loop->the_post();
										 ?>
										 <p>
										 <a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
										</a><br />
										<span class="author_name"><?php the_author(); ?> </span><br />
										<?php shenAleph_filter_authors(); ?>

									</p>
								<?php endwhile;
	wp_reset_postdata();
								?>
							</div>



</div> <!-- close column -->
</div> <!-- close row -->


<div class="row">
	<div class="col-md-8 offset-md-2 single-space-paragraphs">
<p><a href="https://shenandoahliterary.org/681/editors-note/">Editor&rsquo;s Note</a><br /><span class="author_name">Beth Staples</span></p>
<p><a href="https://shenandoahliterary.org/681/contributors/">List of Contributors</a></p>


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
