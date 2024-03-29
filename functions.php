<?php
/**
 * shenAlephLandingPage functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shenAlephLandingPage
 */

if ( ! function_exists( 'shenAlephLandingPage_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shenAlephLandingPage_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shenAlephLandingPage, use a find and replace
		 * to change 'custom-theme-for-the-shenandoah-literary-magazine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shenAlephLandingPage', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shenAlephLandingPage' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shenAlephLandingPage_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
		//	'height'      => 250,
		//	'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true
		) );
	}
endif;
add_action( 'after_setup_theme', 'shenAlephLandingPage_setup' );



function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'img-fluid', $html );
  //  $html = str_replace( 'custom-logo-link', 'your-custom-class', $html );

    return $html;
}

add_filter( 'get_custom_logo', 'change_logo_class' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shenAlephLandingPage_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shenAlephLandingPage_content_width', 640 );
}
add_action( 'after_setup_theme', 'shenAlephLandingPage_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shenAlephLandingPage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shenAlephLandingPage' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shenAlephLandingPage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shenAlephLandingPage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shenAlephLandingPage_scripts() {
	wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
	wp_enqueue_style( 'shenAlephLandingPage', get_stylesheet_uri());

  wp_enqueue_style('font', get_template_directory_uri().'/thein/Theinhardt-Medium.css');
	wp_enqueue_style('font-light', get_template_directory_uri().'/thein/Theinhardt-Light.css');

	wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.5.0/css/all.css');


	wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js');

	wp_enqueue_script( 'shenAlephLandingPage-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'shenAlephLandingPage-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( has_tag('translation')) {
		wp_enqueue_script('shenAlephLandingPage-toggle-translation', get_template_directory_uri() . '/js/toggle-translation.js', array('jquery'), 'null', true);
	}
	if ( has_tag('erasure')) {
		wp_enqueue_script('shenAlephLandingPage-toggle-erasure', get_template_directory_uri() . '/js/toggle-erasure.js', array('jquery'), 'null', true);
	}

}
add_action( 'wp_enqueue_scripts', 'shenAlephLandingPage_scripts' );



### Function: Add Author Custom Fields

function shenAlephLandingPage_add_author_fields($post_ID) {
	global $wpdb;
	$user_id = $wpdb->get_var("SELECT post_author FROM $wpdb->posts WHERE ID = $post_ID");
//	$author_last = $wpdb->get_var("SELECT meta_value FROM $wpdb->usermeta WHERE meta_key = 'last_name' AND user_id = $user_id");
$author_info = $wpdb->get_var("SELECT meta_value FROM $wpdb->usermeta WHERE meta_key = 'user_login' AND user_id = $user_id");
	//update_post_meta($post_ID, 'author_lastname', $author_last);
	update_post_meta($post_ID, 'username', $author_info);
}

add_action('publish_post', 'shenAlephLandingPage_add_author_fields');


function shenAlephLandingPage_empty_email_error( $arg ) {
    if ( !empty( $arg->errors['empty_email'] ) ) unset( $arg->errors['empty_email'] );
}
add_action( 'user_profile_update_errors', 'shenAlephLandingPage_empty_email_error' );

/******************************************
* Add WP ACF function to create options page
* Documentation: https://www.advancedcustomfields.com/resources/options-page/
*******************************************/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


/******************************************
* Paragraph spacing
* add as action?
* needs testing
* need to provide option so not to adjust poetry
*******************************************/
function shenAlephLandingPage_paragraph_spacing($text) {
	$text = str_replace('<br>', '</p><p>', $text);
	return $text;
}

add_filter('the_content', 'shenAlephLandingPage_paragraph_spacing');



/******************************************
* Section Break -- replace text and insert glpyh
*******************************************/
function shenAlephLandingPage_section_break($text) {
	$text = str_replace("[SECTION BREAK]", "<p class='text-center p-section-break'>&#9652;&nbsp;&#9652;&nbsp;&#9652;</p>", $text);
	return $text;
}

add_filter('the_content', 'shenAlephLandingPage_section_break');

/******************************************
* Clear Section Break -- for breaks that need space but not glyph
*******************************************/
function shenAlephLandingPage_clear_section_break($text) {
	$text = str_replace("[CLEAR SECTION BREAK]", "<p class='clear-section-break'></p>", $text);
	return $text;
}

add_filter('the_content', 'shenAlephLandingPage_clear_section_break');


/******************************************
* Stanza Break -- for breaks that need space but not glyph
*******************************************/
function shenAlephLandingPage_stanza_break($text) {
	$text = str_replace("[STANZA BREAK]", "<p class='stanza-break'></p>", $text);
	return $text;
}

add_filter('the_content', 'shenAlephLandingPage_stanza_break');


/******************************************
* Handles multiple authors per post
*******************************************/
function shenAlephLandingPage_filter_authors(){
	$custom_fields = get_post_custom();

	$my_custom_field = $custom_fields['author_lastname'];
	//echo "$my_custom_field[1]";

if (! empty($my_custom_field)) {

		foreach ( $my_custom_field as $key => $value ) {
		//	echo $key . " => " . $value . "<br />";

			if ($key > 0) {

				$args_authors = array(
									 // 'user_login'   => 'lillywimberly'
										 'meta_key' => "last_name",
										 //retrieve specific value b
										 'meta_value' => "$my_custom_field[1]",
										 'meta_compare' => 'LIKE',
										 'orderby' => 'meta_value',
										 'order' => 'ASC'
									 );
			//	echo '<pre>'; print_r($args_authors); echo '</pre>';
					$author_loop = new WP_User_Query($args_authors);
					$author_names = $author_loop->get_results();


					if (! empty($author_names)) {

						foreach ($author_names as $author_name) {

							echo "$author_name->display_name <br />";
						}
					}
						else {echo "No authors found";}

					}
			}
	}

}

/******************************************
* Displays second author of post
*******************************************/
function shenAlephLandingPage_filter_second_author(){
	$custom_fields = get_post_custom();

	$my_custom_field = $custom_fields['second_author'];
	//echo "$my_custom_field[1]";

	if (! empty($my_custom_field)) {


		foreach ( $my_custom_field as $key => $value ) {
		//	echo $key . " => " . $value . "<br />";


				$args_authors = array(
									 // 'user_login'   => 'lillywimberly'
										 'meta_key' => "last_name",
										 //retrieve specific value b
										 'meta_value' => "$my_custom_field[0]",
										 'meta_compare' => 'LIKE'
									 );
			//	echo '<pre>'; print_r($args_authors); echo '</pre>';
					$author_loop = new WP_User_Query($args_authors);
					$author_names = $author_loop->get_results();


					if (! empty($author_names)) {

						foreach ($author_names as $author_name) {

							echo "$author_name->display_name <br />";
						}
					}
						else {echo "No authors found";}


			}
  }
}

/**
 *
 * testing redirect
 */

//function wpse66115_redirect_front_page() {
//    if (is_main_site()) {
//			exit(wp_redirect( 'http://shendev-clone.local/672/', 301));

//		}
//}
//add_action( 'parse_request','wpse66115_redirect_front_page' );



/**
 *
 * add extra bio
 */
 function shenAlephLandingPage_filter_add_bio(){
 $custom_fields = get_post_custom();

 $my_custom_field = $custom_fields['add_bio'];

if (! empty($my_custom_field)) {

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
}

}

/**
 * Increase the number of custom fields that appear in dropdown
 */

add_filter( 'postmeta_form_limit', 'meta_limit_increase' );
function meta_limit_increase( $limit ) {
    return 75;
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
