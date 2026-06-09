<?php
/* Template Name: Home */
?>
<?php get_header(); ?>

<!-- bg -->
<canvas id="dotGrid"></canvas>
<!-- end -->

<div class="offcanvas-backdrop" id="form-backdrop" onclick="closeFormModal()"></div>

<div class="offcanvas" id="form-modal-box">
  <div class="offcanvas-header">
    <button class="close-btn" onclick="closeFormModal()">✕</button>
  </div>

  <div class="container">
    <div class="row justify-content-center top-padding-mb">
      <div class="col-lg-5">
        <h2 class="pb-24 h2 text-center">Tell Us What You Think?</h2>

        <div class="py-24 review-form-ugoki">
          <?php echo do_shortcode('[fluentform id="3"]'); ?>
        </div>

      </div>
    </div>
  </div>
</div>


<section class="section-h section-bg top-padding-mb">
  <div class="container fix-dot">
    <div class="row d-flex flex-column flex-lg-row align-items-centerw">
      <div class="col-lg-6 text-center text-lg-start">
        <h1>
          <span class="gradient-text">Free</span> animated components built
          for faster UI design workflows.
        </h1>
        <p class="py-24">
          including switches, checkboxes, input fields, and more.
        </p>

        <div
          class="review-box py-24 d-flex justify-content-center justify-content-lg-start">
          <div class="avatar-group">
            <img
              class="avatar"
              src="/wp-content/uploads/2026/05/1697547752614.jpeg"
              alt="" />
            <img
              class="avatar"
              src="/wp-content/uploads/2026/05/Portrait-of-a-Man.png"
              alt="" />
            <img
              class="avatar"
              src="/wp-content/uploads/2026/05/1718212203141.jpeg"
              alt="" />
       
          </div>
          <div class="review-content">
            <div class="stars">
              <div class="star-icons">
                <svg class="star" viewBox="0 0 24 24">
                  <path
                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
                <svg class="star" viewBox="0 0 24 24">
                  <path
                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
                <svg class="star" viewBox="0 0 24 24">
                  <path
                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
                <svg class="star" viewBox="0 0 24 24">
                  <path
                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
                <svg class="star-outline" viewBox="0 0 24 24">
                  <path
                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
              </div>
              <span class="rating">4.5</span>
            </div>
            <p class="review-text">from 5 star review on Google</p>
          </div>
        </div>

        <div
          class="d-flex mt-16 justify-content-center justify-content-lg-start">
          <a href="/component-library/" class="btn-primary">Browse Animations<i class="ti ti-layout-grid"></i></a>
        </div>
      </div>
      <div class="col-lg-6 d-none d-lg-block">
        <div class="d-flex justify-content-end position-relative">
          <div class="overflow-top">
            <img class="floating-frame" src="/wp-content/uploads/2026/05/frame.svg" alt="" />
          </div>
          <div class="box-anima">
            <img src="/wp-content/uploads/2026/05/animation.gif" class="hero-img" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-h flex-column bg-navy">
  <div class="container">
    <div
      class="d-flex justify-content-between mb-48 flex-column flex-lg-row align-items-center g-4 text-center text-lg-start">
      <h3 class="text-white">Featured / Trending Components</h3>
      <a href="#" class="text-white opacity-50 d-flex align-items-center">View all&nbsp;<i class="ti ti-arrow-up-right"></i></a>
    </div>
  </div>
  <div
    class="slider-viewport"
    style="
          width: 100%;
          overflow: hidden;
          position: relative;
          mask-image: linear-gradient(
            to right,
            transparent,
            #000 10%,
            #000 90%,
            transparent
          );
          -webkit-mask-image: linear-gradient(
            to right,
            transparent,
            #000 10%,
            #000 90%,
            transparent
          );
        ">
    <div
      class="slider-track"
      style="
            display: flex;
            gap: 1.5rem;
            width: max-content;
            animation: infiniteScroll 25s linear infinite;
          ">
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
          <div class="box-image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('full', [
                'alt' => get_the_title()
              ]); ?>
            <?php endif; ?>
          </div>
          <!-- <img
        class="slider-card-img"
        src="/wp-content/uploads/2026/05/animation.gif"
        alt="User Research Accordion" />
      <img
        class="slider-card-img"
        src="/wp-content/uploads/2026/05/animation.gif"
        alt="Email Notification Component" />
      <img
        class="slider-card-img"
        src="/wp-content/uploads/2026/05/animation.gif"
        alt="AI Hexagon Generator" />
      <img
        class="slider-card-img"
        src="/wp-content/uploads/2026/05/animation.gif"
        alt="Camping Component Copy" />
      <img
        class="slider-card-img"
        src="/wp-content/uploads/2026/05/animation.gif"
        alt="User Research Accordion Copy" />
      <img
        class="slider-card-img"
        src="/wp-content/uploads/2026/05/animation.gif"
        alt="Email Notification Component Copy" />
      <img
        class="slider-card-img"
        src="/wp-content/uploads/2026/05/animation.gif"
        alt="AI Hexagon Generator Copy" /> -->
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>

<section class="section-h bg-category position-relative scroll-section" id="category">
  <div class="container">
    <h3 class="text-dark text-center mb-48">Component Categories</h3>
    <div class="d-flex flex-column flex-lg-row g-4 justify-content-center">
      <div class="box-category">Forms & Inputs</div>
      <div class="box-category">Navigation</div>
      <div class="box-category">Buttons & Switches</div>
      <div class="box-category">AI & Intelligent UI Patterns</div>
    </div>
    <div
      class="d-flex flex-column flex-lg-row g-4 justify-content-center mt-24">
      <div class="box-category">Loaders & Skeletons</div>
      <div class="box-category">Charts & Data UI</div>
      <div class="box-category">Cards & Layouts</div>
    </div>
    <div class="d-flex mt-16 justify-content-center mt-48">
      <a href="#" class="btn-primary">Explore All Categories<i class="ti ti-layout-grid"></i></a>
    </div>
  </div>
</section>

<section class="section-h p-24">
  <div class="section-c p-lg-48 center-position">
    <h3 class="mb-48 text-center">
      How it Works <span class="gradient-text">ugokiui</span>
    </h3>
    <div class="container mt-lg-48">
      <div class="row justify-content-between">
        <div class="col-lg-6">
          <div class="steps-wrapper">
            <div class="step-item d-flex g-4 align-items-center mb-48">
              <div class="circle">1</div>
              <div class="d-flex g-2 flex-column">
                <h4>Browse Components</h4>
                <p class="opacity-60">
                  Explore a wide collection of free animated UI components
                  made for modern design systems.
                </p>
              </div>
            </div>

            <div class="step-item d-flex g-4 align-items-center mb-48">
              <div class="circle">2</div>
              <div class="d-flex g-2 flex-column">
                <h4>Open in Figma</h4>
                <p class="opacity-60">
                  Click any component and instantly open it in Figma. No
                  setup required.
                </p>
              </div>
            </div>

            <div class="step-item d-flex g-4 align-items-center mb-48">
              <div class="circle">3</div>
              <div class="d-flex g-2 flex-column">
                <h4>Copy the Component</h4>
                <p class="opacity-60">
                  Duplicate or copy the component into your own Figma file
                  with one click.
                </p>
              </div>
            </div>

            <div class="step-item d-flex g-4 align-items-center mb-48">
              <div class="circle">4</div>
              <div class="d-flex g-2 flex-column">
                <h4>Use in Your Project</h4>
                <p class="opacity-60">
                  Drag and drop into your design. Customize it and use it
                  freely in your product or UI.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="/wp-content/uploads/2026/06/how-it-works-ugokiui.webp">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-h" id="newrelease">
    <div class="container">

        <div class="text-center d-flex justify-content-center mb-24">
            <img src="/wp-content/uploads/2026/05/recent.svg" alt="New Releases" />
        </div>

        <h3 class="text-dark text-center mb-48">New Releases</h3>

        <div class="row justify-content-center">

            <?php
            $args = array(
                'post_type'      => 'animated_component',
                'posts_per_page' => 1,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC'
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                $query->the_post();

                $terms = get_the_terms(get_the_ID(), 'component_category');
            ?>

                <div class="col-lg-6">

                    <div class="new-relese">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', array(
                                'alt' => get_the_title()
                            )); ?>
                        <?php endif; ?>
                    </div>

                    <div class="text-center bg-white py-24 d-flex flex-column align-items-center justify-content-center">

                        <h4 class="text-dark mb-16">
                            <?php the_title(); ?>
                        </h4>

                        <?php if (get_the_content()) : ?>
                            <div class="component-description">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>

                    

                    </div>

                    <div class="d-flex justify-content-center mt-48">
                        <a href="<?php the_permalink(); ?>" class="btn-primary">
                            Get This Component
                            <i class="ti ti-arrow-up-right"></i>
                        </a>
                    </div>

                </div>

            <?php
                wp_reset_postdata();
            endif;
            ?>

        </div>

    </div>
</section>

<section class="section-h bg-light-gray">
  <div class="container">
    <h3 class="text-dark text-center">Loved by Designers Worldwide</h3>
    <p class="small text-center mb-48">
      Real feedback from designers using our components in live projects.
    </p>
    <section class="review-section">
      <div class="review-grid">

        <?php
        $args = array(
          'post_type'      => 'reviews',
          'posts_per_page' => 6, // Shows the 6 reviews like in the image
        );
        $reviews_query = new WP_Query($args);

        if ($reviews_query->have_posts()) : ?>

          <?php while ($reviews_query->have_posts()) : $reviews_query->the_post();
            // Fetch ACF data
            $rating = get_field('rating');
            $review_text = get_field('review_text');
            $designation = get_field('designation');
            $avatar = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
          ?>
            <div class="review-card">
              <div class="rating">
                <!-- Dynamic Star Logic can go here based on $rating -->
                <span class="rating"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.63338 5.80981L0.78505 6.65772L0.681467 6.67881C0.524661 6.72043 0.381712 6.80293 0.267218 6.91787C0.152724 7.03282 0.0707866 7.17609 0.0297737 7.33305C-0.0112392 7.49002 -0.00985827 7.65506 0.0337754 7.81132C0.077409 7.96758 0.161732 8.10946 0.278133 8.22247L4.51497 12.3466L3.5158 18.172L3.50388 18.2728C3.49428 18.435 3.52796 18.5968 3.60146 18.7417C3.67496 18.8866 3.78565 19.0093 3.92219 19.0974C4.05873 19.1854 4.21621 19.2356 4.37852 19.2427C4.54082 19.2499 4.70212 19.2138 4.84588 19.1381L10.0764 16.3881L15.295 19.1381L15.3866 19.1803C15.5379 19.2399 15.7024 19.2582 15.8631 19.2333C16.0238 19.2083 16.1749 19.1411 16.3011 19.0385C16.4272 18.9358 16.5238 18.8015 16.5809 18.6492C16.638 18.497 16.6535 18.3322 16.626 18.172L15.6259 12.3466L19.8645 8.22156L19.936 8.14364C20.0382 8.01784 20.1052 7.86722 20.1301 7.70712C20.1551 7.54701 20.1372 7.38315 20.0782 7.23222C20.0192 7.0813 19.9213 6.9487 19.7944 6.84794C19.6675 6.74718 19.5162 6.68186 19.3558 6.65864L13.5075 5.80981L10.8931 0.511472C10.8175 0.357962 10.7004 0.228694 10.5551 0.138301C10.4097 0.0479081 10.242 0 10.0709 0C9.89975 0 9.73203 0.0479081 9.58671 0.138301C9.44139 0.228694 9.32428 0.357962 9.24863 0.511472L6.63338 5.80981Z" fill="#414AFF" />
                  </svg>
                </span>
                <span class="rating-num"><?php echo esc_html($rating); ?></span>
              </div>

              <p class="review-text py-24">"<?php echo esc_html($review_text); ?>"</p>

              <div class="review-user">
                <?php if ($avatar): ?>
                  <img src="<?php echo esc_url($avatar); ?>" alt="<?php the_title(); ?>" class="reviewer-avatar">
                <?php endif; ?>
                <div class="reviewer-meta">
                  <h4><?php the_title(); ?></h4>
                  <span>(<?php echo esc_html($designation); ?>)</span>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata(); ?>

        <?php endif; ?>

      </div>
      <div
        class="d-flex mt-16 justify-content-center mt-48 text-center w-100">
        <a class="btn-primary" onclick="openFormModal()">Tell Us What You Think<i class="ti ti-arrow-up-right"></i></a>
      </div>
    </section>
  </div>
</section>
<?php get_footer(); ?>
