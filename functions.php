<?php if ( !defined('ABSPATH') ) die();

// Content width

if ( ! isset( $content_width ) )
	$content_width = 640;


// From Scratch Theme Setup

if ( ! function_exists( 'from_scratch_setup' ) ) :

function from_scratch_setup() {
	
	
	// I18n
	
	load_theme_textdomain( 'from-scratch', get_template_directory() . '/languages' );
	
	
	// Theme Support
	
	add_editor_style( array('css/editor-style.css') );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

}
endif;
add_action( 'after_setup_theme', 'from_scratch_setup' );


// Enqueue JS & CSS

function from_scratch_scripts_load() {
    if (!is_admin()) {

		// JS 
		
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script(
			'from-scratch-skip-link-focus-fix', 
			get_template_directory_uri() . '/js/skip-link-focus-fix.js', 
			array(), 
			false, 
			true
		);
		
	    wp_enqueue_script( 
	    	'main', 
	    	get_template_directory_uri() . '/js/main.js',
	    	array('jquery'), 
	    	'1.0', 
	    	true
	    );
	    
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		
		// CSS
		
		wp_enqueue_style( 
			'pridx', 
			get_template_directory_uri() . '/css/pridx.css',
			array(), 
			'1.7', 
			'screen' 
		);
		
		
		// Main stylesheet
		
		wp_enqueue_style( 'from-scratch-style', get_stylesheet_uri() );

	}
}    
add_action( 'wp_enqueue_scripts', 'from_scratch_scripts_load' );



// Menus

register_nav_menus( array(
	'main_menu' =>  esc_html__( 'Main Menu', 'from-scratch' ),
	'footer_menu' => esc_html__( 'Footer Menu', 'from-scratch' )
));

// Sub-menus Walker

include( dirname( __FILE__ ) . '/inc/subnav-walker.php' );



// Customizer

require get_template_directory() . '/inc/customizer.php';


// Widgets

function from_scratch_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'Primary Widgets Area', 'from-scratch' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'',
		'after_widget' 	=> 	'',
		'before_title' 	=> 	'<h3 class="widget-title">',
		'after_title' 	=> 	'</h3>',
	));
}
add_action( 'widgets_init', 'from_scratch_widgets_init' );



// Auto-Updater

require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/anybodesign/from-scratch',
	__FILE__,
	'from-scratch'
);
$myUpdateChecker->setBranch('master');