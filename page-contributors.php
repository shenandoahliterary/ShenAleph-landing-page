<?php
/**
 * template for the Contributors page
 *
 *
 * @package ShenAleph
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="container-fluid">
			<div class="row volumeIssue">
			</div>
			</section>

			<section class="container page-contributors">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<h1 class="entry-header entry-title">Contributors</h1>
					<dl>
		<?php

// Search WP User Database for authors

						$args = array(
							'role' => 'Contributor',
							'meta_key' => 'last_name',
							'orderby'  => 'meta_value'
						);

						// The Query
						$user_query = new WP_User_Query( $args );

						// User Loop
						if ( ! empty( $user_query->get_results() ) ) {
							foreach ( $user_query->get_results() as $user ) {
								echo '<p class="contributor-page-bio text-justify">' . $user->description . '</p>';
							}
						} else {
							echo 'No users found.';
						}
						?>
					</dl>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
