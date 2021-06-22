<?php get_header(); ?>

    <?php
      $post = get_page_by_path('company');
      setup_postdata($post); ?>
      <section class="page-overview">
        <div class="wrapper">
          <h3><?php the_title(); ?></h3>
          <hr class="title-under">
          <div class="img-and-desc">
            <figure class="page-visual">
              <?php the_post_thumbnail('large'); ?>
            </figure>
            <div class="excerpt-and-btn">
              <p class="page-excerpt"><?php echo get_the_excerpt(); ?></p>
              <p class="btn-center">
                <a href="<?php the_permalink(); ?>" class="detail-btn">詳細を見る</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    <?php wp_reset_postdata(); ?>

    <?php
      $post = get_page_by_path('product');
      setup_postdata($post); ?>
      <section class="page-overview">
        <div class="wrapper">
          <h3><?php the_title(); ?></h3>
          <hr class="title-under">
          <p class="product-excerpt"><?php echo get_the_excerpt(); ?></p>
          <?php
          wp_reset_postdata();
          $products = get_all_products(); ?>
          <div class="category-flex">
            <?php
            if($products->have_posts()): while($products->have_posts()):
              $products->the_post();
              $product_details = get_field('product_detail');
              $product_imgs = get_field('product_imgs'); ?>
              <a href="<?php the_permalink(); ?>" class="product-box">
                <div class="product-img">
                  <?php $image_id = $product_imgs['product_img_1'];
                  echo wp_get_attachment_image($image_id, 'full'); ?>
                </div>
                <div class="product-data">
                  <p><?php echo $product_details['name']; ?></p>
                  <span>&#92; <?php echo $product_details['price']; ?></span>
                </div>
              </a>
              <?php wp_reset_postdata(); endwhile; endif; ?>
          </div>
          <p class="btn-center">
            <a href="<?php echo home_url('product'); ?>" class="detail-btn">詳細を見る</a>
          </p>
        </div>
      </section>

    <?php
      $post = get_page_by_path('news');
      setup_postdata($post); ?>
      <section class="page-overview">
        <div class="wrapper">
          <h3><?php the_title(); ?></h3>
          <hr class="title-under">
          <div class="img-and-desc opposition">
            <figure class="page-visual">
              <?php the_post_thumbnail('large'); ?>
            </figure>
            <div class="excerpt-and-btn">
              <p class="page-excerpt"><?php echo get_field('excerpt'); ?></p>
              <p class="btn-center">
                <a href="<?php the_permalink(); ?>" class="detail-btn">詳細を見る</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    <?php wp_reset_postdata(); ?>

    <?php
      $post = get_page_by_path('recruit');
      setup_postdata($post); ?>
      <section class="page-overview">
        <div class="wrapper">
          <h3><?php the_title(); ?></h3>
          <hr class="title-under">
          <div class="img-and-desc">
            <figure class="page-visual">
              <?php the_post_thumbnail('large'); ?>
            </figure>
            <div class="excerpt-and-btn">
              <p class="page-excerpt"><?php echo get_the_excerpt(); ?></p>
              <p class="btn-center">
                <a href="<?php the_permalink(); ?>" class="detail-btn">詳細を見る</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    <?php wp_reset_postdata(); ?>

    <?php
      $post = get_page_by_path('contact');
      setup_postdata($post); ?>
      <section class="page-overview">
        <div class="wrapper">
          <h3><?php the_title(); ?></h3>
          <hr class="title-under">
          <div class="img-and-desc opposition">
            <figure class="page-visual">
              <?php the_post_thumbnail('large'); ?>
            </figure>
            <div class="excerpt-and-btn">
              <p class="page-excerpt"><?php echo get_the_excerpt(); ?></p>
              <p class="btn-center">
                <a href="<?php the_permalink(); ?>" class="detail-btn">詳細を見る</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    <?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
