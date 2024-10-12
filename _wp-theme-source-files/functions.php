<?php
/**
 * E2-lending Themes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package E2-lending
 */


/**
 * define version for control cache
 */
define('VERSION', time());


/**
 * Get assets directory
 */
function assetsPath() {
	return get_template_directory_uri() . '/assets';
}



/**
 * include needed files
 */
include_once( get_template_directory(). '/inc/custom-posttype.php' );



/**
 * Setup Theme
 */
add_action( 'after_setup_theme' , 'setup_theme' );
if ( ! function_exists( 'setup_theme' ) ) {
	function setup_theme() {
		/** automatic feed link*/
		add_theme_support( 'automatic-feed-links' );

		/** tag-title **/
		add_theme_support('title-tag');

		/** post thumbnail **/
		add_theme_support('post-thumbnails');

		/** image size **/
		set_post_thumbnail_size( 340, 200, true );
		add_image_size('img_540x540', 540, 540, true );

		/** refresh widgest **/
		add_theme_support( 'customize-selective-refresh-widgets' );

		/** HTML5 support **/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/** custom logo thme support **/
		$logo_width  = 200;
		$logo_height = 130;
		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

	    /** custom background **/
	    $bg_defaults = array(
	        'default-image'          => '',
	        'default-preset'         => 'default',
	        'default-size'           => 'cover',
	        'default-repeat'         => 'no-repeat',
	        'default-attachment'     => 'scroll',
	    );
	    add_theme_support( 'custom-background', $bg_defaults );

	    /** register nav menus **/
		register_nav_menus(
			array(
				'main-menu'    => esc_html__( 'Main Menu', 'e2lending' ),
				'footer-menu'  => esc_html__( 'Footer Menu', 'e2lending' )
			)
		);
	}
}


/**
 * enqueue css & js file
 *
 */
function include_css_js() {
	//enqueue css
	wp_enqueue_style('typekit-font', 'https://use.typekit.net/ouj6wrk.css' );
	wp_enqueue_style('font-awesome', assetsPath(). '/css/font-awesome.min.css' );
	wp_enqueue_style('fatNav', assetsPath(). '/css/jquery.fatNav.css' );
	wp_enqueue_style('owl-carousel', assetsPath(). '/css/owl.carousel.min.css' );
	wp_enqueue_style('main-style', get_stylesheet_uri(), array(), VERSION );
	wp_enqueue_style('responsive', assetsPath() . '/css/responsive.css', array(), VERSION );

	// enqueue js
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('fatNav', assetsPath() . '/js/jquery.fatNav.js', array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script('owl-carousel', assetsPath() . '/js/owl.carousel.min.js', array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script('custom', assetsPath() . '/js/custom.js', array( 'jquery' ), VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'include_css_js' );


/**
 * acf option page
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array(
		'page_title'   => __( 'Theme Options Page' , 'e2lending' ),
		'menu_title'   => __( 'Theme Option' , 'e2lending' ),
		'menu_slug'    => 'theme_options_page',
		'capability'   => 'edit_posts',
		'redirect'     => true
	) );
}

/**  hide acf menu from wp-admin **/
// add_filter('acf/settings/show_admin', '__return_false');


/**
 * Custom Excerpt Length
 */
function excerpt_length( $length ) {
   return 210;
}
add_filter( 'excerpt_length' , 'excerpt_length', 999 );

if ( ! function_exists( 'excerpt_more' ) && ! is_admin() ) :
function excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf( __( '...', 'e2lending' ))
		);
	return $link;
}
add_filter( 'excerpt_more', 'excerpt_more' );
endif;


/**
 *  custom admin excerpt height
 */
function admin_excerpt() { 
	echo "<style>"; echo "textarea#excerpt { height: 150px; }"; echo "</style>"; 
}
add_action('admin_head', 'admin_excerpt');



/**
 *  Image Alt Text
 */
function altText( $imgID ) {
	if( $imgID ) {
		return esc_attr( get_post_meta( $imgID , '_wp_attachment_image_alt', true) );
	}
}


/**
 *  Return 1st letter a string
 */
function firstLetter( $letterTitle ) {
	if( $letterTitle ) {
		return substr(trim( $letterTitle ), 0, 1);
	}
}


/**
 * This will remove the default image sizes and the medium_large size.
 */
function remove_default_images( $sizes ) {
	 // unset( $sizes['small']); // 150px
	 // unset( $sizes['medium_large']); // 768px
	 unset( $sizes['medium']); // 300px
	 unset( $sizes['large']); // 1024px
	 return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_images' );


/**
 * Pagination Functions
 */
function pagination_bar( $custom_query ) {
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ( $total_pages > 1 ) {
        $current_page = max( 1, get_query_var('paged') );
        echo paginate_links(array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => $current_page,
            'total'     => $total_pages,
            'mid_size'  => 3,
            'prev_text' => __('«'),
            'next_text' => __('»')
        ));
    }
}


/**
 * Load More Post - wp ajax
 */
function load_more_posts() {
    $posts_limit = $_POST['limit'];
    $catID       = $_POST['catID'];
    $offset      = $_POST['offset'];

    $query = new Wp_Query( array(
        'post_type'      => 'post',
        'category__in'   => $catID,
	    'post_status'    => 'publish',
	    'offset'         => $offset,
	    'posts_per_page' => $posts_limit
    ));

    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); 

    	get_template_part('template-parts/post-loop');

    endwhile; wp_reset_postdata(); endif; wp_reset_query();

    wp_die();
}
add_action( 'wp_ajax_load_more_posts', 'load_more_posts' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts' );