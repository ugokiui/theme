<?php
/* Template Name: component-library */
?>
<?php get_header(); ?>
<section class="section-bg top-padding-mb pb-48">
  <div class="container fix-dot">
    <section class="component-search">
      <div class="category-tabs">
        <button class="tab active" data-filter="all">All</button>
        <button class="tab" data-filter="forms-inputs">Forms & Inputs</button>
        <button class="tab" data-filter="navigation">Navigation</button>
        <button class="tab" data-filter="buttons-switches">Buttons & Switches</button>
        <button class="tab" data-filter="ai-inteligent-ui-patterns">AI & Intelligent UI Patterns</button>
        <button class="tab" data-filter="loaders-skeletons">Loaders & Skeletons</button>
        <button class="tab" data-filter="charts-skeletons">Charts & Data UI</button>
        <button class="tab" data-filter="card-layout">Cards & Layouts</button>
      </div>

      <div class="search-wrapper">
        <div class="search-box">
          <svg class="search-icon" viewBox="0 0 24 24" fill="none">
            <circle
              cx="11"
              cy="11"
              r="7"
              stroke="currentColor"
              stroke-width="2" />
            <path
              d="M20 20L17 17"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round" />
          </svg>

          <input
            type="text"
            class="component-search-input"
            placeholder="Search by component e.g.buttons" />

          <svg
            class="arrow-icon"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M20 4V11C20 12.0609 19.5786 13.0783 18.8284 13.8284C18.0783 14.5786 17.0609 15 16 15H4"
              stroke="black"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round" />
            <path
              d="M9 10L4 15L9 20"
              stroke="black"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </div>
      </div>
    </section>
    <!-- grid -->
    <section class="pt-48">
      <div class="row justify-content-center">
        <?php
        $args = array(
          'post_type'      => 'animated_component',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();

            $terms = get_the_terms(get_the_ID(), 'component_category');
            $term_classes = '';

            if ($terms && !is_wp_error($terms)) {
              foreach ($terms as $term) {
                $term_classes .= ' cat-' . $term->slug;
              }
            }
        ?>

            <div class="col-lg-4 mb-24 component-item<?php echo esc_attr($term_classes); ?>"
              data-title="<?php echo esc_attr(strtolower(get_the_title())); ?>">

              <a href="<?php the_permalink(); ?>" class="compo-box">

               <?php if ( get_field('is_new') == 'Yes' ) : ?>
        <div class="new-label">
            <i></i>
            New
        </div>
    <?php endif; ?>

                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full', [
                    'alt' => get_the_title()
                  ]); ?>
                <?php endif; ?>

              </a>

            </div>

        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
        <div class="no-results W-100 py-48 text-center" style="display: none;">
          <svg class="opacity-30" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-off">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 3l18 18" />
            <path d="M7 3h7l5 5v7m0 4a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-14" />
          </svg>
          <h6 class="pt-16">No results found</h6>
          <p class=" opacity-60 paragraph-m">We’re constantly improving this library. More components will be added soon. 🚀</p>
        </div>

    </section>
  </div>
</section>
<?php get_footer(); ?>
