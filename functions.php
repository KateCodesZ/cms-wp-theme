<?php
// Hide wp admin bar on frontend
add_filter('show_admin_bar', '__return_false');

// Enqueue styles
function blog_ez_theme_style_queue()
{
    $sub_path = '/assets/css/';
    $path_to_style = get_template_directory_uri() . $sub_path;
    $style_version = filemtime(get_template_directory() . $sub_path . 'main-stylesheet.css');

    wp_enqueue_style(
        'blogeztheme-main-style',
        $path_to_style . 'main-stylesheet.css',
        array(),
        $style_version,
        'all'
    );

    if (is_home() || is_front_page()) {
        wp_enqueue_style(
            'blogeztheme-home-style',
            $path_to_style . 'home-stylesheet.css',
            array(),
            $style_version,
            'all'
        );
    }

    if (is_single()) {
        wp_enqueue_style(
            'blogeztheme-single-style',
            $path_to_style . 'single-stylesheet.css',
            array(),
            $style_version,
            'all'
        );
    }

    // Unified listing styles for search, archives, categories, authors
    if (is_search() || is_archive() || is_author() || is_category()) {
        $listing_version = filemtime(get_template_directory() . $sub_path . 'listing-stylesheet.css');
        wp_enqueue_style(
            'blogeztheme-listing-style',
            $path_to_style . 'listing-stylesheet.css',
            array(),
            $listing_version,
            'all'
        );
    }
}

add_action('wp_enqueue_scripts', 'blog_ez_theme_style_queue');

// Enqueue scripts
function blog_ez_theme_js_queue()
{
    $sub_path = '/assets/js/';
    $path_to_js = get_template_directory_uri() . $sub_path;
    $js_version = filemtime(get_template_directory() . $sub_path . 'main.js');

    wp_enqueue_script(
        'blogeztheme-scripts',
        $path_to_js . 'main.js',
        array(),
        $js_version,
        true
    );
}

add_action('wp_enqueue_scripts', 'blog_ez_theme_js_queue');

// Register navigation menu
function register_my_menus(){
    register_nav_menu('primary', __('Primary Menu', 'blogez-theme'));
}
add_action('init', 'register_my_menus');

// Theme support
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

add_image_size('custom-medium', 800, 600, false);

// Ensure home (posts index) uses 6 posts per page for pagination
function blogez_home_query_pagination($query) {
    if (!is_admin() && $query->is_main_query() && is_home()) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'blogez_home_query_pagination');

// Register sidebar widget areas for pages
function blogez_theme_register_sidebars() {
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'blogez-theme'),
        'id'            => 'blog-sidebar',
        'description'   => __('Widgets in this area will be shown on multiple pages', 'blogez-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'blogez_theme_register_sidebars');

// Remove Gutenberg block WP styles (only custom styles)
/*
function remove_block_library_css() {
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'remove_block_library_css', 100);
*/

// Front-page Hero Section Customizer
function hero_customizer_settings($wp_customize) {
    // add section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'blogez-theme'),
        'description' => __('Homepage Video Background & Title Settings', 'blogez-theme'),
        'priority' => 30,
    ));

    // Video ID
    $wp_customize->add_setting('hero_video_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_video_id', array(
        'label' => __('YouTube Video ID', 'blogez-theme'),
        'description' => __('Enter only the video ID (the part after "v="). Example: dQw4w9WgXcQ', 'blogez-theme'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Heading Text (or "Title Text")
    $wp_customize->add_setting('hero_title', array(
        'default' => 'TASTE MAGAZINE',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'blogez-theme'),
        'description' => __('Main Title over Video Background', 'blogez-theme'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

}
add_action('customize_register', 'hero_customizer_settings');
