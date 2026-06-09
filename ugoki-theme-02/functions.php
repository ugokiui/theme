<?php

require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/hero-media.php';

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

  add_image_size('component-card', 380, 480, true);
}
add_action('after_setup_theme', 'ugoki_theme_setup');

function ugoki_has_dot_grid() {
  return is_page_template(array('home.php', 'coming-soon.php', 'index.php'))
    || is_front_page();
}

function ugoki_assets() {
  $version = wp_get_theme()->get('Version');

  wp_enqueue_style(
    'ugoki-fonts',
    get_template_directory_uri() . '/assets/css/fonts.css',
    array(),
    $version
  );

  wp_enqueue_style('main-style', get_stylesheet_uri(), array('ugoki-fonts'), $version);

  wp_enqueue_script(
    'ugoki-main-js',
    get_template_directory_uri() . '/js/main.js',
    array(),
    $version,
    true
  );

  if (ugoki_has_dot_grid()) {
    wp_enqueue_script(
      'ugoki-dot-grid',
      get_template_directory_uri() . '/js/dot-grid.js',
      array(),
      $version,
      true
    );
  }

  if (is_page_template('component-library.php')) {
    wp_enqueue_script(
      'ugoki-component-filter',
      get_template_directory_uri() . '/js/component-filter.js',
      array(),
      $version,
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'ugoki_assets');

function ugoki_script_defer($tag, $handle, $src) {
  $defer_handles = array('ugoki-main-js', 'ugoki-dot-grid', 'ugoki-component-filter');

  if (in_array($handle, $defer_handles, true)) {
    return str_replace(' src', ' defer src', $tag);
  }

  return $tag;
}
add_filter('script_loader_tag', 'ugoki_script_defer', 10, 3);

function ugoki_preload_assets() {
  $theme_uri = get_template_directory_uri();

  echo '<link rel="preload" href="' . esc_url($theme_uri . '/fonts/rubik-latin.woff2') . '" as="font" type="font/woff2" crossorigin>' . "\n";
  echo '<link rel="preload" href="' . esc_url($theme_uri . '/fonts/funnel-display-latin.woff2') . '" as="font" type="font/woff2" crossorigin>' . "\n";

  if (is_page_template('home.php') || is_front_page()) {
    echo '<link rel="preload" as="image" href="' . esc_url(ugoki_hero_preload_url('hero')) . '" type="image/webp" fetchpriority="high">' . "\n";
    return;
  }

  if (is_page_template(array('coming-soon.php', 'index.php'))) {
    echo '<link rel="preload" as="image" href="' . esc_url(ugoki_hero_preload_url('ani')) . '" type="image/webp" fetchpriority="high">' . "\n";
  }
}
add_action('wp_head', 'ugoki_preload_assets', 1);

function ugoki_render_slider_items($limit = 10) {
  $args = array(
    'post_type'      => 'animated_component',
    'posts_per_page' => $limit,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
  );

  $query = new WP_Query($args);
  ob_start();

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      echo '<div class="box-image">';
      if (has_post_thumbnail()) {
        the_post_thumbnail('component-card', array(
          'alt'      => get_the_title(),
          'loading'  => 'lazy',
          'decoding' => 'async',
          'width'    => 380,
          'height'   => 480,
        ));
      }
      echo '</div>';
    }
    wp_reset_postdata();
  }

  return ob_get_clean();
}

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
