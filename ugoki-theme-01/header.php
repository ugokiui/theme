<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body>


  <header>
    <a href="<?php echo esc_url(home_url('/')); ?>">
      <img src="/wp-content/uploads/2026/05/logo.svg" class="logo" alt="<?php bloginfo('name'); ?>" />
    </a>
    <div class="d-none d-lg-block">
      <div class="menu">
        <a href="/">Home</a>
        <a href="/about">About UgokiUi</a>
        <a href="/component-library">Component Library</a>
        <a href="/about/#how-to-use">How to Use</a>
      </div>
    </div>
    <div class="d-none d-lg-block">
      <div class="cta-header">
        <a href="#" class="bt-s-auto g-1">
          Donate
          <img src="/wp-content/uploads/2026/05/thumb.svg" alt="" />
        </a>
        <a href="https://discord.gg/xQjXxdN3" target="_blank" rel="noopener noreferrer" class="bt-icon">
          <img src="/wp-content/uploads/2026/05/discod.svg" alt="Discord" />
        </a>
        <a href="https://github.com/ugokiui/ugokiui-files.git" target="_blank" rel="noopener noreferrer" class="bt-icon">
          <img src="/wp-content/uploads/2026/05/github.svg" alt="GitHub" />
        </a>
        <a href="https://figma.com/@ugokiui" target="_blank" rel="noopener noreferrer" class="bt-icon">
          <img src="/wp-content/uploads/2026/05/figma.svg" alt="Figma" />
        </a>
      </div>
    </div>
    <div class="d-lg-none">
      <a href="#" class="bt-icon" onclick="openMenuModal()">
        <i class="ti ti-menu-3"></i>
      </a>
    </div>
  </header>

  <!-- offcanvas -->
  <div class="offcanvas-backdrop" id="menu-backdrop" onclick="closeMenuModal()"></div>
  <div class="offcanvas" id="menu-modal-box">
    <div class="offcanvas-header">
      <button class="close-btn" onclick="closeMenuModal()">✕</button>
    </div>

    <nav class="offcanvas-menu">
		<a href="/">Home</a>
      <a href="/about">About UgokiUi</a>
      <a href="/component-library">Component Library</a>
      <a href="/about/#how-to-use">How to use</a>
      <div class="small">
        <a href="/faq">FAQ</a>
        <a href="/#newrelease">New Releases</a>
        <a href="#">Donate</a>
        <a href="/terms-condition">Terms and Conditions</a>
      </div>
      <div class="cta-header d-flex g-2">
        <a href="https://discord.gg/xQjXxdN3" target="_blank" rel="noopener noreferrer" class="bt-icon">
          <img src="/wp-content/uploads/2026/05/discod.svg" alt="Discord" />
        </a>
        <a href="https://github.com/ugokiui/ugokiui-files.git" target="_blank" rel="noopener noreferrer" class="bt-icon">
          <img src="/wp-content/uploads/2026/05/github.svg" alt="GitHub" />
        </a>
        <a href="https://figma.com/@ugokiui" target="_blank" rel="noopener noreferrer" class="bt-icon">
          <img src="/wp-content/uploads/2026/05/figma.svg" alt="Figma" />
        </a>
      </div>
    </nav>
  </div>
