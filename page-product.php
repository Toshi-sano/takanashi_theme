<?php get_header(); ?>

  <h3>商品カテゴリ一覧</h3>
  <hr class="title-under">
  <div class="category-flex">
    <?php
      $terms = get_terms('product_cat', ['orderby' => 'id']);
      foreach($terms as $term):
      $image_id = get_field('product_cat_img', $term->taxonomy. '_'. $term->term_id);
    ?>
      <a href="<?php echo get_term_link($term); ?>" class="category-link">
        <div class="category-box">
          <div class="category-img">
            <?php echo wp_get_attachment_image($image_id, 'medium'); ?>
          </div>
          <div class="category-info">
            <span class="category-name"><?php echo $term->name; ?></span>
            <p><?php echo $term->description; ?></p>
          </div>
        </div>
        <div class="ichiran">&gt;&gt; 商品一覧へ</div>
      </a>
    <?php endforeach; ?>
  </div>

<?php get_footer(); ?>
