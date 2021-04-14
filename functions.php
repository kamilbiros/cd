<?php
/**
 * mbrn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mbrn
 */

if ( ! function_exists( 'mbrn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	require_once('bs4navwalker.php');

	function mbrn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mbrn, use a find and replace
		 * to change 'mbrn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mbrn', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'mbrn' ),
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
		add_theme_support( 'custom-background', apply_filters( 'mbrn_custom_background_args', array(
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
add_action( 'after_setup_theme', 'mbrn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mbrn_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mbrn_content_width', 640 );
}
add_action( 'after_setup_theme', 'mbrn_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mbrn_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mbrn' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mbrn' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mbrn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mbrn_scripts() {
	wp_enqueue_style( 'mbrn-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mbrn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mbrn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mbrn_scripts' );

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

// function add_menuclass($ulclass) {
//     return preg_replace('/<a/', '<a class="nav-link js-scroll-trigger"', $ulclass, -1);
// }
// add_filter('wp_nav_menu','add_menuclass');

// CUSTIMIZE THEME

function customize_theme($wp_customize){

	$wp_customize->add_panel( 'ustawienia_motywu', array(
	  'title' => __( 'Ustawienia Motywu' ),
	  'description' => "Możesz edytować treść i ustawiać inne elementy na stronie.", // Include html tags such as <p>.
	  'priority' => 160, // Mixed with top-level-section hierarchy.
	) );

	$wp_customize->add_section( 'ustawienia_tresci', array(
	  'title' => __( 'Ustawienia Treści' ),
	  'description' => __( 'Dodaj zawartość do poszczególnych sekcji' ),
	  'panel' => 'ustawienia_motywu', // Not typically needed.
	  'priority' => 160,
	  'capability' => 'edit_theme_options',
	  'theme_supports' => '', // Rarely needed.
	) );

	$wp_customize->add_setting( 'onas_tytul', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_inputText', array(
	  'label' => __( 'Tytuł O nas' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_tytul'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_tytul', array(
	    'selector' => '#onas_tytul', // You can also select a css class
	) );




	$wp_customize->add_setting( 'onas_tresc_block1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarea_block1', array(
	  'label' => __( 'Treść O nas blok 1' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_tresc_block1'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_tresc_block1', array(
	    'selector' => '#onas_tresc_block1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'onas_tresc_block2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarea_block2', array(
	  'label' => __( 'Treść O nas blok 2' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_tresc_block2'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_tresc_block2', array(
	    'selector' => '#onas_tresc_block2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'onas_tresc_block3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarea_block3', array(
	  'label' => __( 'Treść O nas blok 3' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_tresc_block3'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_tresc_block3', array(
	    'selector' => '#onas_tresc_block3', // You can also select a css class
	) );


	// LISTA


	$wp_customize->add_setting( 'onas_list1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarealista1', array(
	  'label' => __( 'Lista 1' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_list1'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_list1', array(
	    'selector' => '#onas_list1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'onas_list1_1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarea_list1_1', array(
	  'label' => __( 'Lista 1_1' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_list1_1'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_list1_1', array(
	    'selector' => '#onas_list1_1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'onas_list1_2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarea_list1_2', array(
	  'label' => __( 'Lista 1_2' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_list1_2'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_list1_2', array(
	    'selector' => '#onas_list1_2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'onas_list2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarea_list2', array(
	  'label' => __( 'Lista 2' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_list2'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_list2', array(
	    'selector' => '#onas_list2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'onas_list3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_textarea_list3', array(
	  'label' => __( 'Lista 3' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_list3'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_list3', array(
	    'selector' => '#onas_list3', // You can also select a css class
	) );


// MAZOWIECKI REJESTR NOWOTWORÓW

	$wp_customize->add_setting( 'mazowieckie_tytul', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'mazowiecki_text_tytul', array(
	  'label' => __( 'Mazowieckie tytul' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'mazowieckie_tytul'
	) );

	$wp_customize->selective_refresh->add_partial( 'mazowieckie_tytul', array(
	    'selector' => '#mazowieckie_tytul', // You can also select a css class
	) );

	$wp_customize->add_setting( 'mazowieckie_blok1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'mazowiecki_textarea_block1', array(
	  'label' => __( 'Mazowiecki rejestr blok 1' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'mazowieckie_blok1'
	) );

	$wp_customize->selective_refresh->add_partial( 'mazowieckie_blok1', array(
	    'selector' => '#mazowieckie_blok1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'mazowieckie_blok2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'mazowiecki_textarea_block2', array(
	  'label' => __( 'Mazowiecki rejestr blok 2' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'mazowieckie_blok2'
	) );

	$wp_customize->selective_refresh->add_partial( 'mazowieckie_blok2', array(
	    'selector' => '#mazowieckie_blok2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'mazowieckie_blok3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'mazowiecki_textarea_block3', array(
	  'label' => __( 'Mazowiecki rejestr blok 3' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'mazowieckie_blok3'
	) );

	$wp_customize->selective_refresh->add_partial( 'mazowieckie_blok3', array(
	    'selector' => '#mazowieckie_blok3', // You can also select a css class
	) );

	$wp_customize->add_setting( 'mazowieckie_blok4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'mazowiecki_textarea_block4', array(
	  'label' => __( 'Mazowiecki rejestr blok 4' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'mazowieckie_blok4'
	) );

	$wp_customize->selective_refresh->add_partial( 'mazowieckie_blok4', array(
	    'selector' => '#mazowieckie_blok4', // You can also select a css class
	) );

	$wp_customize->add_setting( 'mazowieckie_blok5', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'mazowiecki_textarea_block5', array(
	  'label' => __( 'Mazowiecki rejestr blok 5' ),
	  'type' => 'textarea',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'mazowieckie_blok5'
	) );

	$wp_customize->selective_refresh->add_partial( 'mazowieckie_blok5', array(
	    'selector' => '#mazowieckie_blok5', // You can also select a css class
	) );





	// ZESPÓŁ


	$wp_customize->add_setting( 'zespol_tytul', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tytul_text', array(
	  'label' => __( 'Zespol tytul' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tytul'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tytul', array(
	    'selector' => '#zespol_tytul', // You can also select a css class
	) );


 	// 1#
	$wp_customize->add_setting( 'zespol_imie1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_imie1_text', array(
	  'label' => __( 'Zespol imie 1' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_imie1'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_imie1', array(
	    'selector' => '#zespol_imie1', // You can also select a css class
	) );


	$wp_customize->add_setting( 'zespol_email1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_email1_text', array(
	  'label' => __( 'Zespol email 1' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_email1'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_email1', array(
	    'selector' => '#zespol_email1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'zespol_tel1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tel1_text', array(
	  'label' => __( 'Zespol tel 1' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tel1'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tel1', array(
	    'selector' => '#zespol_tel1', // You can also select a css class
	) );


	// 2#
	$wp_customize->add_setting( 'zespol_imie2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_imie2_text', array(
	  'label' => __( 'Zespol imie 2' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_imie2'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_imie2', array(
	    'selector' => '#zespol_imie2', // You can also select a css class
	) );


	$wp_customize->add_setting( 'zespol_email2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_email2_text', array(
	  'label' => __( 'Zespol email 2' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_email2'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_email2', array(
	    'selector' => '#zespol_email2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'zespol_tel2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tel2_text', array(
	  'label' => __( 'Zespol tel 2' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tel2'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tel2', array(
	    'selector' => '#zespol_tel2', // You can also select a css class
	) );


	// 3#
	$wp_customize->add_setting( 'zespol_imie3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_imie3_text', array(
	  'label' => __( 'Zespol imie 3' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_imie3'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_imie3', array(
	    'selector' => '#zespol_imie3', // You can also select a css class
	) );


	$wp_customize->add_setting( 'zespol_email3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_email3_text', array(
	  'label' => __( 'Zespol email 3' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_email3'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_email3', array(
	    'selector' => '#zespol_email3', // You can also select a css class
	) );

	$wp_customize->add_setting( 'zespol_tel3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tel3_text', array(
	  'label' => __( 'Zespol tel 3' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tel3'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tel3', array(
	    'selector' => '#zespol_tel3', // You can also select a css class
	) );



	// 4#
	$wp_customize->add_setting( 'zespol_imie4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_imie4_text', array(
	  'label' => __( 'Zespol imie 4' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_imie4'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_imie4', array(
	    'selector' => '#zespol_imie4', // You can also select a css class
	) );


	$wp_customize->add_setting( 'zespol_email4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_email4_text', array(
	  'label' => __( 'Zespol email 4' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_email4'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_email4', array(
	    'selector' => '#zespol_email4', // You can also select a css class
	) );

	$wp_customize->add_setting( 'zespol_tel4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tel4_text', array(
	  'label' => __( 'Zespol tel 4' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tel4'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tel4', array(
	    'selector' => '#zespol_tel4', // You can also select a css class
	) );



	// 5#
	$wp_customize->add_setting( 'zespol_imie5', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_imie5_text', array(
	  'label' => __( 'Zespol imie 5' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_imie5'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_imie5', array(
	    'selector' => '#zespol_imie5', // You can also select a css class
	) );


	$wp_customize->add_setting( 'zespol_email5', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_email5_text', array(
	  'label' => __( 'Zespol email 5' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_email5'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_email5', array(
	    'selector' => '#zespol_email5', // You can also select a css class
	) );

	$wp_customize->add_setting( 'zespol_tel5', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tel5_text', array(
	  'label' => __( 'Zespol tel 5' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tel5'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tel5', array(
	    'selector' => '#zespol_tel5', // You can also select a css class
	) );


	// 6#
	$wp_customize->add_setting( 'zespol_imie6', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_imie6_text', array(
	  'label' => __( 'Zespol imie 6' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_imie6'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_imie6', array(
	    'selector' => '#zespol_imie6', // You can also select a css class
	) );


	$wp_customize->add_setting( 'zespol_email6', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_email6_text', array(
	  'label' => __( 'Zespol email 6' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_email6'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_email6', array(
	    'selector' => '#zespol_email6', // You can also select a css class
	) );

	$wp_customize->add_setting( 'zespol_tel6', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tel6_text', array(
	  'label' => __( 'Zespol tel 6' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tel6'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tel6', array(
	    'selector' => '#zespol_tel6', // You can also select a css class
	) );


	// 7#
	$wp_customize->add_setting( 'zespol_imie7', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_imie7_text', array(
	  'label' => __( 'Zespol imie 7' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_imie7'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_imie7', array(
	    'selector' => '#zespol_imie7', // You can also select a css class
	) );


	$wp_customize->add_setting( 'zespol_email7', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_email7_text', array(
	  'label' => __( 'Zespol email 7' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_email7'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_email7', array(
	    'selector' => '#zespol_email7', // You can also select a css class
	) );

	$wp_customize->add_setting( 'zespol_tel7', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'zespol_tel7_text', array(
	  'label' => __( 'Zespol tel 7' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'zespol_tel7'
	) );

	$wp_customize->selective_refresh->add_partial( 'zespol_tel7', array(
	    'selector' => '#zespol_tel7', // You can also select a css class
	) );





	$wp_customize->add_setting( 'onas_przycisk', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_button', array(
	  'label' => __( 'Przycisk O nas' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_przycisk'
	) );

	$wp_customize->selective_refresh->add_partial( 'onas_przycisk', array(
	    'selector' => '#onas_przycisk', // You can also select a css class
	) );

	$wp_customize->add_setting( 'onas_przycisk_checkbox', array(
	  'type' => 'theme_mod',
	  'default' => true,
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'onas_checkbox', array(
	  'label' => __( 'O nas przycisk' ),
	  'type' => 'checkbox',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'onas_przycisk_checkbox'
	) );


	// BIULETYNY


	$wp_customize->add_setting( 'biuletyn_tytul', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'biuletyn_tytul_text', array(
	  'label' => __( 'Biuletyn tytul' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'biuletyn_tytul'
	) );

	$wp_customize->selective_refresh->add_partial( 'biuletyn_tytul', array(
	    'selector' => '#biuletyn_tytul', // You can also select a css class
	) );


	// #1
	$wp_customize->add_setting( 'biuletyn_rok1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'biuletyn_rok1_text', array(
	  'label' => __( 'Biuletyn rok1' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'biuletyn_rok1'
	) );

	$wp_customize->selective_refresh->add_partial( 'biuletyn_rok1', array(
	    'selector' => '#biuletyn_rok1', // You can also select a css class
	) );


	$wp_customize->add_setting( 'biuletyn_plik1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'biuletyn_plik1_text', array(
		'label'      => __( 'Biuletyn 1'),
		'section'    => 'ustawienia_tresci',
		'settings'   => 'biuletyn_plik1',
	) ) );
	

	$wp_customize->selective_refresh->add_partial( 'biuletyn_plik2', array(
	    'selector' => '#biuletyn_plik2', // You can also select a css class
	) );

	// #

	$wp_customize->add_setting( 'biuletyn_rok2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'biuletyn_rok2_text', array(
	  'label' => __( 'Biuletyn rok2' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'biuletyn_rok2'
	) );

	$wp_customize->selective_refresh->add_partial( 'biuletyn_rok2', array(
	    'selector' => '#biuletyn_rok2', // You can also select a css class
	) );


	$wp_customize->add_setting( 'biuletyn_plik2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'biuletyn_plik2_text', array(
		'label'      => __( 'Biuletyn 2'),
		'section'    => 'ustawienia_tresci',
		'settings'   => 'biuletyn_plik2',
	) ) );
	

	$wp_customize->selective_refresh->add_partial( 'biuletyn_plik2', array(
	    'selector' => '#biuletyn_plik2', // You can also select a css class
	) );

 // #3

	$wp_customize->add_setting( 'biuletyn_rok3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'biuletyn_rok3_text', array(
	  'label' => __( 'Biuletyn rok3' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'biuletyn_rok3'
	) );

	$wp_customize->selective_refresh->add_partial( 'biuletyn_rok3', array(
	    'selector' => '#biuletyn_rok3', // You can also select a css class
	) );


	$wp_customize->add_setting( 'biuletyn_plik3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'biuletyn_plik3_text', array(
		'label'      => __( 'Biuletyn 3'),
		'section'    => 'ustawienia_tresci',
		'settings'   => 'biuletyn_plik3',
	) ) );
	

	$wp_customize->selective_refresh->add_partial( 'biuletyn_plik3', array(
	    'selector' => '#biuletyn_plik3', // You can also select a css class
	) );

	// #4


	$wp_customize->add_setting( 'biuletyn_rok4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'biuletyn_rok4_text', array(
	  'label' => __( 'Biuletyn rok4' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'biuletyn_rok4'
	) );

	$wp_customize->selective_refresh->add_partial( 'biuletyn_rok4', array(
	    'selector' => '#biuletyn_rok4', // You can also select a css class
	) );


	$wp_customize->add_setting( 'biuletyn_plik4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'biuletyn_plik4_text', array(
		'label'      => __( 'Biuletyn 4'),
		'section'    => 'ustawienia_tresci',
		'settings'   => 'biuletyn_plik4',
	) ) );
	

	$wp_customize->selective_refresh->add_partial( 'biuletyn_plik4', array(
	    'selector' => '#biuletyn_plik4', // You can also select a css class
	) );




	// RAPORTY

	$wp_customize->add_setting( 'raporty_tytul', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'raporty_tytul_text', array(
	  'label' => __( 'Raport  tytul' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'raporty_tytul'
	) );

	$wp_customize->selective_refresh->add_partial( 'raporty_tytul', array(
	    'selector' => '#raporty_nazwa1', // You can also select a css class
	) );

	// #1
	$wp_customize->add_setting( 'raporty_nazwa1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'raporty_nazwa1_text', array(
	  'label' => __( 'Raport  nazwa 1' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'raporty_nazwa1'
	) );

	$wp_customize->selective_refresh->add_partial( 'raporty_nazwa1', array(
	    'selector' => '#raporty_nazwa1', // You can also select a css class
	) );


	$wp_customize->add_setting( 'raporty_plik1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'raporty_plik1_text', array(
		'label'      => __( 'Raport 1'),
		'section'    => 'ustawienia_tresci',
		'settings'   => 'raporty_plik1',
	) ) );
	

	$wp_customize->selective_refresh->add_partial( 'raporty_plik1', array(
	    'selector' => '#raporty_plik1', // You can also select a css class
	) );


	// #2

	$wp_customize->add_setting( 'raporty_nazwa2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'raporty_nazwa2_text', array(
	  'label' => __( 'Raport  nazwa 2' ),
	  'type' => 'text',
	  'section' => 'ustawienia_tresci',
	  'settings' => 'raporty_nazwa2'
	) );

	$wp_customize->selective_refresh->add_partial( 'raporty_nazwa2', array(
	    'selector' => '#raporty_nazwa2', // You can also select a css class
	) );


	$wp_customize->add_setting( 'raporty_plik2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'raporty_plik2_text', array(
		'label'      => __( 'Raport 2'),
		'section'    => 'ustawienia_tresci',
		'settings'   => 'raporty_plik2',
	) ) );
	

	$wp_customize->selective_refresh->add_partial( 'raporty_plik2', array(
	    'selector' => '#raporty_plik2', // You can also select a css class
	) );


	// # LINKI

	// #1
	$wp_customize->add_setting( 'linki_link1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link1_text', array(
		'label'      => __( 'Link 1'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link1',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link1', array(
	    'selector' => '#linki_link1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text1_text', array(
		'label'      => __( 'Link tekst 1'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text1',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text1', array(
	    'selector' => '#linki_text1', // You can also select a css class
	) );


	// #2
	$wp_customize->add_setting( 'linki_link2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link2_text', array(
		'label'      => __( 'Link 2'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link2',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link2', array(
	    'selector' => '#linki_link2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text2_text', array(
		'label'      => __( 'Link tekst 2'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text2',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text2', array(
	    'selector' => '#linki_text2', // You can also select a css class
	) );


	// #3
	$wp_customize->add_setting( 'linki_link3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link3_text', array(
		'label'      => __( 'Link 3'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link3',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link3', array(
	    'selector' => '#linki_link3', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text3_text', array(
		'label'      => __( 'Link tekst 3'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text3',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text3', array(
	    'selector' => '#linki_text3', // You can also select a css class
	) );


	// #4
	$wp_customize->add_setting( 'linki_link4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link4_text', array(
		'label'      => __( 'Link 4'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link4',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link4', array(
	    'selector' => '#linki_link4', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text4_text', array(
		'label'      => __( 'Link tekst 4'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text4',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text4', array(
	    'selector' => '#linki_text4', // You can also select a css class
	) );


	// #5
	$wp_customize->add_setting( 'linki_link5', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link5_text', array(
		'label'      => __( 'Link 5'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link5',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link5', array(
	    'selector' => '#linki_link5', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text5', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text5_text', array(
		'label'      => __( 'Link tekst 5'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text5',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text5', array(
	    'selector' => '#linki_text5', // You can also select a css class
	) );

	// #6
	$wp_customize->add_setting( 'linki_link6', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link6_text', array(
		'label'      => __( 'Link 6'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link6',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link6', array(
	    'selector' => '#linki_link6', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text6', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text6_text', array(
		'label'      => __( 'Link tekst 6'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text6',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text6', array(
	    'selector' => '#linki_text6', // You can also select a css class
	) );

	// #7
	$wp_customize->add_setting( 'linki_link7', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link7_text', array(
		'label'      => __( 'Link 7'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link7',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link7', array(
	    'selector' => '#linki_link7', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text7', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text7_text', array(
		'label'      => __( 'Link tekst 7'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text7',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text7', array(
	    'selector' => '#linki_text7', // You can also select a css class
	) );

	// #8
	$wp_customize->add_setting( 'linki_link8', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_link8_text', array(
		'label'      => __( 'Link 8'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_link8',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_link8', array(
	    'selector' => '#linki_link8', // You can also select a css class
	) );

	$wp_customize->add_setting( 'linki_text8', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'linki_text8_text', array(
		'label'      => __( 'Link tekst 8'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'linki_text8',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'linki_text8', array(
	    'selector' => '#linki_text8', // You can also select a css class
	) );



// # KONTAKT

	#1
	$wp_customize->add_setting( 'kontakt_text1_1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text1_1_text', array(
		'label'      => __( 'Kontakt tekst 1_1'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text1_1',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text1_1', array(
	    'selector' => '#kontakt_text1_1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text1_2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text1_2_text', array(
		'label'      => __( 'Kontakt tekst 1_2'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text1_2',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text1_2', array(
	    'selector' => '#kontakt_text1_2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text1_3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text1_3_text', array(
		'label'      => __( 'Kontakt tekst 1_3'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text1_3',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text1_3', array(
	    'selector' => '#kontakt_text1_3', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text1_4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text1_4_text', array(
		'label'      => __( 'Kontakt tekst 1_4'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text1_4',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text1_4', array(
	    'selector' => '#kontakt_text1_4', // You can also select a css class
	) );


	$wp_customize->add_setting( 'kontakt_text1_5', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text1_5_text', array(
		'label'      => __( 'Kontakt tekst 1_5'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text1_5',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text1_5', array(
	    'selector' => '#kontakt_text1_5', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text2_1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text2_1_text', array(
		'label'      => __( 'Kontakt tekst 2_1'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text2_1',
	) );
	
	// #2

	$wp_customize->selective_refresh->add_partial( 'kontakt_text2_1', array(
	    'selector' => '#kontakt_text2_1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text2_2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text2_2_text', array(
		'label'      => __( 'Kontakt tekst 2_2'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text2_2',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text2_2', array(
	    'selector' => '#kontakt_text2_2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text2_3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text2_3_text', array(
		'label'      => __( 'Kontakt tekst 2_3'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text2_3',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text2_3', array(
	    'selector' => '#kontakt_text2_3', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text2_4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text2_4_text', array(
		'label'      => __( 'Kontakt tekst 2_4'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text2_4',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text2_4', array(
	    'selector' => '#kontakt_text2_4', // You can also select a css class
	) );


	// #3

	$wp_customize->add_setting( 'kontakt_text3_1', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text3_1_text', array(
		'label'      => __( 'Kontakt tekst 3_1'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text3_1',
	) );

	$wp_customize->selective_refresh->add_partial( 'kontakt_text3_1', array(
	    'selector' => '#kontakt_text3_1', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text3_2', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text3_2_text', array(
		'label'      => __( 'Kontakt tekst 3_2'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text3_2',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text3_2', array(
	    'selector' => '#kontakt_text3_2', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text3_3', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text3_3_text', array(
		'label'      => __( 'Kontakt tekst 3_3'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text3_3',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text3_3', array(
	    'selector' => '#kontakt_text3_3', // You can also select a css class
	) );

	$wp_customize->add_setting( 'kontakt_text3_4', array(
	  'type' => 'theme_mod',
	  'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'kontakt_text3_4_text', array(
		'label'      => __( 'Kontakt tekst 3_4'),
		'type'		 =>	'text',
		'section'    => 'ustawienia_tresci',
		'settings'   => 'kontakt_text3_4',
	) );
	

	$wp_customize->selective_refresh->add_partial( 'kontakt_text3_4', array(
	    'selector' => '#kontakt_text3_4', // You can also select a css class
	) );


}

add_action( 'customize_register', 'customize_theme' );













