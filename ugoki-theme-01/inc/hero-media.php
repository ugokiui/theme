<?php

/**
 * Render optimized hero animation with WebP + GIF fallback.
 */
function ugoki_hero_animation($args = array()) {
  $args = wp_parse_args($args, array(
    'variant'  => 'hero',
    'class'    => 'hero-img',
    'width'    => 500,
    'height'   => 500,
    'alt'      => 'Animated UI component preview',
    'priority' => 'high',
  ));

  $theme_uri = get_template_directory_uri();
  $assets = array(
    'hero' => array(
      'webp' => $theme_uri . '/img/hero/animation.webp',
      'gif'  => '/wp-content/uploads/2026/05/animation.gif',
    ),
    'ani' => array(
      'webp' => $theme_uri . '/img/hero/ani.webp',
      'gif'  => '/wp-content/uploads/2026/05/ani.gif',
    ),
  );

  if (!isset($assets[$args['variant']])) {
    return '';
  }

  $media = $assets[$args['variant']];
  $loading = $args['priority'] === 'high' ? 'eager' : 'lazy';
  $fetchpriority = $args['priority'] === 'high' ? ' fetchpriority="high"' : '';
  $class = esc_attr($args['class']);
  $alt = esc_attr($args['alt']);
  $width = (int) $args['width'];
  $height = (int) $args['height'];

  return sprintf(
    '<picture class="hero-media"><source srcset="%s" type="image/webp"><img src="%s" class="%s" alt="%s" width="%d" height="%d" loading="%s" decoding="async"%s></picture>',
    esc_url($media['webp']),
    esc_url($media['gif']),
    $class,
    $alt,
    $width,
    $height,
    esc_attr($loading),
    $fetchpriority
  );
}

function ugoki_hero_preload_url($variant = 'hero') {
  $paths = array(
    'hero' => '/img/hero/animation.webp',
    'ani'  => '/img/hero/ani.webp',
  );

  if (!isset($paths[$variant])) {
    return '';
  }

  return get_template_directory_uri() . $paths[$variant];
}
