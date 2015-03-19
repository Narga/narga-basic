<?php
/**
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage NARGA
 * @since NARGA 1.0
 */

/* NARGA Required Files and Functions */
require locate_template('core/narga.php');
new NARGA();

/* NARGA Basic Setup */
function narga_setup() {
    # Add language supports. By default, this framework not include language files.
    load_theme_textdomain('narga', get_template_directory() . '/languages');

    # to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    # Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(640, 290, true);
    
    # Support Custom Background
    add_theme_support( 'custom-background', array(
        'default-image' => '',
	'default-color' => '', // background color default (dont add the #)
        'wp-head-callback' => '_custom_background_cb',
        'admin-head-callback' => '',
        'admin-preview-callback' => ''
    ));

    # Allows theme developers to add custom stylesheets to WordPress's TinyMCE visual editor. 
    add_editor_style( 'stylesheets/custom.css' );

    # Add post formarts supports. http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array (
        'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'chat'
    ));

    # Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
    add_theme_support('menus');

    # Register Navigation
    register_nav_menus(array(
        'top-bar-l' => __('Top Bar', 'narga'),
        'footer_navigation' => __('Footer Navigation', 'narga')
    ));

    # Enables post and comment RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
}
add_action('after_setup_theme', 'narga_setup', 10);

/**
 * Enqueue Scripts and Styles for Front-End
 *
 * @since NARGA v0.1
 **/
function narga_assets() {
    global $wp_styles;

    if ( !is_admin() ) {
      
        # Loads Foundation Main stylesheet
        wp_enqueue_style( 'foundation', get_template_directory_uri() . '/stylesheets/foundation.min.css', array(), '2014-03-30', 'all' );

         # Loads our main stylesheet.
        wp_enqueue_style( 'narga-style', get_stylesheet_uri(), array(), '2013-03-30', 'all' );

        # Load JavaScripts
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/javascripts/vendor/modernizr.js', array( 'jquery' ), '2.7.1', true );

        wp_enqueue_script( 'foundation', get_template_directory_uri() . '/javascripts/foundation.min.js', array( 'jquery' ), '5.2.1', true );

        wp_enqueue_script( 'narga', get_template_directory_uri() . '/javascripts/narga.js', array( 'jquery' ), '1.8', true );

        # Enable threaded comments 
        if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
            wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'narga_assets' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since NARGA v1.3.3
 * @from Twenty Twelve
 */
if (!isset( $content_width))
    $content_width = 640;
function narga_content_width() {
    if ( is_page_template( 'templates/full-width.php' ) || is_attachment() ) {
        global $content_width;
        $content_width = 975;
    }
}
add_action( 'template_redirect', 'narga_content_width' );


?>
