<?php get_header(); ?>

  <p>※価格は全て税込表示です</p>
  <h3><?php single_cat_title(); ?></h3>
  <hr class="title-under">
  <div class="category-flex">
    <?php if(have_posts()): while(have_posts()):
          the_post();
          $product_details = get_field('product_detail');
          $product_imgs = get_field('product_imgs'); ?>
      <a href="<?php the_permalink(); ?>" class="product-box">
        <div class="product-img">
          <?php $image_id = $product_imgs['product_img_1'];
                echo wp_get_attachment_image($image_id, 'full'); ?>
        </div>
        <div class="product-data">
          <p><?php echo $product_details['name']; ?></p>
          <span><?php echo $product_details['price']; ?>円</span>
        </div>
      </a>
    <?php endwhile; endif; ?>
  </div>

<?php get_footer(); ?>
