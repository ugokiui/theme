<?php

// Enable theme features
function ugoki_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
  ));
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'ugoki'),
    'footer'  => __('Footer Menu', 'ugoki'),
  ));
}
add_action('after_setup_theme', 'ugoki_theme_setup');


// Load CSS & JS files
function ugoki_assets() {
  $version = wp_get_theme()->get('Version');

  // Main stylesheet
  wp_enqueue_style('main-style', get_stylesheet_uri(), array(), $version);

  // Google Fonts
  wp_enqueue_style(
    'ugoki-google-fonts',
    'https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap',
    array(),
    null
  );

  // Tabler Icons (pinned to a specific version)
  wp_enqueue_style(
    'tabler-icons',
    'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.34.0/dist/tabler-icons.min.css',
    array(),
    '3.34.0'
  );

  // Main JS (loaded in footer)
  wp_enqueue_script(
    'ugoki-main-js',
    get_template_directory_uri() . '/js/main.js',
    array(),
    $version,
    true
  );
}
add_action('wp_enqueue_scripts', 'ugoki_assets');


// Register Component Category Taxonomy
function component_category_taxonomy() {

    register_taxonomy(
        'component_category',
        'animated_component',
        array(
            'label'        => 'Component Categories',
            'hierarchical' => true,
            'show_in_rest' => true,
            'rewrite'      => array('slug' => 'component-category'),
        )
    );

}
add_action('init', 'component_category_taxonomy');