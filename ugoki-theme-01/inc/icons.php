<?php

/**
 * Inline SVG icons (replaces Tabler Icons webfont).
 */
function ugoki_icon($name, $class = '') {
  $icons = array(
    'menu-3' => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 6h10"/><path d="M4 12h16"/><path d="M7 12h13"/><path d="M4 18h16"/>',
    'layout-grid' => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/><path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/><path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/><path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/>',
    'arrow-up-right' => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 7l-10 10"/><path d="M8 7l9 0l0 9"/>',
    'brand-instagram' => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"/><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/><path d="M16.5 7.5v.01"/>',
    'brand-figma' => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/><path d="M6 3m0 3a3 3 0 0 1 3 -3h6a3 3 0 0 1 3 3v0a3 3 0 0 1 -3 3h-6a3 3 0 0 1 -3 -3z"/><path d="M9 9a3 3 0 0 0 0 6h3v-3a3 3 0 0 0 -3 -3"/><path d="M9 15m0 3a3 3 0 0 0 3 3h0a3 3 0 0 0 3 -3v-3a3 3 0 0 0 -3 -3h-3z"/>',
  );

  if (!isset($icons[$name])) {
    return '';
  }

  $classes = trim('icon-svg ' . $class);

  return sprintf(
    '<svg class="%s" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>',
    esc_attr($classes),
    $icons[$name]
  );
}
