<?php

/**
 * The Blocks Theme functions
 *
 * @package WordPress
 * @subpackage the-blocks
 */
if (!function_exists('the_blocks_setup')) :

    /**
     * Sets up theme defaults and registers the various WordPress features that
     * this theme supports.
     */
    function the_blocks_setup() {
        load_theme_textdomain('the-blocks');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');

        // This theme allows users to set a custom background.
        add_theme_support('custom-background', apply_filters('the_blocks_custom_background_args', array(
            'default-color' => 'f5f5f5',
        )));

        add_theme_support('custom-logo');
        add_theme_support('custom-logo', array(
            'height' => 256,
            'width' => 256,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('site-title', 'site-description'),
        ));

        add_theme_support('woocommerce');

        // Set content-width.
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 847;
        }
    }

endif; // end function_exists the_blocks_setup.
add_action('after_setup_theme', 'the_blocks_setup');

function the_blocks_custom_logo() {
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}

/**
 * Register and Enqueue Styles.
 */
function the_blocks_register_styles() {

    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style('the-blocks-style', get_stylesheet_uri(), array(), $theme_version);
}

add_action('wp_enqueue_scripts', 'the_blocks_register_styles');

if (!function_exists('wp_body_open')) {

    /**
     * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
     */
    function wp_body_open() {
        do_action('wp_body_open');
    }

}

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function the_blocks_menus() {

    $locations = array(
        'primary' => __('Menu', 'the-blocks'),
    );

    register_nav_menus($locations);
}

add_action('init', 'the_blocks_menus');

/**
 * Include a skip to content link at the top of the page
 */
function the_blocks_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#site-content">' . __('Skip to the content', 'the-blocks') . '</a>';
}

add_action('wp_body_open', 'the_blocks_skip_link', 5);

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_before_main_content', 'the_blocks_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'the_blocks_wrapper_end', 10);

function the_blocks_wrapper_start() {
    echo '<main id="site-content" class="container" role="main">';
}

function the_blocks_wrapper_end() {
    echo '</main>';
}
