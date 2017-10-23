<?php
/**
 * XStudio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package XStudio
 */

if ( ! function_exists( 'xstudio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function xstudio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on XStudio, use a find and replace
		 * to change 'xstudio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'xstudio', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'xstudio' ),
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
		add_theme_support( 'custom-background', apply_filters( 'xstudio_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'xstudio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xstudio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xstudio_content_width', 640 );
}
add_action( 'after_setup_theme', 'xstudio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xstudio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'xstudio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'xstudio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'xstudio_widgets_init' );

function about_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'About us', 'xstudio' ),
        'id'            => 'about',
        'description'   => esc_html__( 'Add widgets here.', 'xstudio' ),
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ) );
}
add_action( 'widgets_init', 'about_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function xstudio_scripts() {
    wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', true);
    wp_enqueue_style('gulp', get_template_directory_uri() . '/css/libs.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');

	wp_enqueue_style( 'xstudio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'xstudio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'xstudio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script('gulp', get_template_directory_uri() . '/js/libs.min.js');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js');
}
add_action( 'wp_enqueue_scripts', 'xstudio_scripts' );


function add_isotope() {
    wp_register_script( 'isotope', get_template_directory_uri().'/js/isotope.pkgd.min.js', array('jquery'),  true );
    wp_register_script( 'isotope-init', get_template_directory_uri().'/js/isotope.js', array('jquery', 'isotope'),  true );
    //wp_register_style( 'isotope-css', get_stylesheet_directory_uri() . '/css/isotope.css' );

    wp_enqueue_script('isotope-init');
    //wp_enqueue_style('isotope-css');
}

add_action( 'wp_enqueue_scripts', 'add_isotope' );


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

//LOGO
add_theme_support( 'custom-logo' );

// Creates Custom Post Type Main Slider
function slider_reviews_init() {
    $args = array(
        'label' => 'Slider',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'slider-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'slider-reviews', $args );
}
add_action( 'init', 'slider_reviews_init' );

// Creates Custom Post Type Services
function services_reviews_init() {
    $args = array(
        'label' => 'Services',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'services-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'services-reviews', $args );
}
add_action( 'init', 'services_reviews_init' );


// Creates Custom Post Type Carousel Works
function works_reviews_init() {
    $args = array(
        'label' => 'Works',
        'posts_per_page' => 9,
        'taxonomies'  => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'works-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'works-reviews', $args );
}
add_action( 'init', 'works_reviews_init' );

// Creates Custom Post Type Carousel
function carousel_reviews_init() {
    $args = array(
        'label' => 'Carousel',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'carousel-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'carousel-reviews', $args );
}
add_action( 'init', 'carousel_reviews_init' );

//field social links
function hw_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_section( 'hw_social_links' , array(
        'title'      => __( 'Social links', 'hw' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'social_links_facebook' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_facebook', array(
        'label'        => __( 'Facebook', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_facebook',
    ) ) );

    $wp_customize->add_setting( 'social_links_rss' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_rss', array(
        'label'        => __( 'RSS', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_rss',
    ) ) );

    $wp_customize->add_setting( 'social_links_behance' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_behance', array(
        'label'        => __( 'Behance', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_behance',
    ) ) );

    $wp_customize->add_setting( 'social_links_deviantart' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_deviantart', array(
        'label'        => __( 'Deviantart', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_deviantart',
    ) ) );

    $wp_customize->add_setting( 'social_links_twitter' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_twitter', array(
        'label'        => __( 'Twitter', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_twitter',
    ) ) );

    $wp_customize->add_setting( 'social_links_google' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_google', array(
        'label'        => __( 'Google', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_google',
    ) ) );

    $wp_customize->add_setting( 'social_links_youtube' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_youtube', array(
        'label'        => __( 'Youtube', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_youtube',
    ) ) );

    $wp_customize->add_setting( 'social_links_instagram' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_instagram', array(
        'label'        => __( 'Instagram', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_instagram',
    ) ) );

    $wp_customize->add_setting( 'social_links_dribbble' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_dribbble', array(
        'label'        => __( 'Dribbble', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_dribbble',
    ) ) );

    $wp_customize->add_setting( 'social_links_pinterest' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_pinterest', array(
        'label'        => __( 'Pinterest', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_pinterest',
    ) ) );

    $wp_customize->add_setting( 'social_links_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_links_color', array(
        'label'        => __( 'Social links background color', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_color',
    ) ) );
}
add_action( 'customize_register', 'hw_customize_register' );