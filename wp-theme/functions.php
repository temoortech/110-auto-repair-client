<?php
/**
 * Functions and definitions for 110 Auto Repair Theme
 *
 * @package autorepair110
 */

/**
 * Enqueue theme assets.
 */
function autorepair110_enqueue_assets() {
    wp_enqueue_style(
        'autorepair110-style',
        get_stylesheet_uri(),
        [],
        '1.0.0'
    );

    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800;900&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [],
        '6.5.0'
    );

    wp_enqueue_script(
        'autorepair110-script',
        get_template_directory_uri() . '/script.js',
        [],
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'autorepair110_enqueue_assets' );

/**
 * Theme setup.
 */
function autorepair110_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ] );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-logo', [
        'height'      => 50,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'autorepair110' ),
        'footer'  => __( 'Footer Navigation', 'autorepair110' ),
    ] );
}
add_action( 'after_setup_theme', 'autorepair110_setup' );
