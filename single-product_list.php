<?php get_header(); ?>

  <!-- 商品画像のIDを取得する -->
  <?php $img_ids = get_product_imgs(); ?>
  <div class="product-slide">
    <div class="product-slide-views">
      <?php
        foreach($img_ids as $img_id): if($img_id):
            echo wp_get_attachment_image($img_id, 'full');
        endif; endforeach; ?>
    </div>
    <div class="product-slide-btns">
      <?php foreach($img_ids as $img_id): ?>
          <div class="square-padding">
            <?php if($img_id):
                echo wp_get_attachment_image($img_id, 'medium');
              endif; ?>
          </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- 商品の詳細情報を取得する -->
  <?php $product_details = get_field('product_detail'); ?>
  <figure class="wp-block-table is-style-regular">
    <table>
      <tbody>
        <tr>
          <td>品番</td>
          <td><?php echo get_the_title(); ?></td>
        </tr>
        <tr>
          <td>種類</td>
          <td><?php echo $product_details['type'] ?></td>
        </tr>
        <tr>
          <td>サイズ</td>
          <td>
            横幅<?php echo $product_details['width'] ?>mm,　
            奥行<?php echo $product_details['depth'] ?>mm,　
            高さ<?php echo $product_details['height'] ?>mm,　
            座面高さ<?php echo $product_details['seat_height'] ?>mm,　
          </td>
        </tr>
        <tr>
          <td>素材</td>
          <td><?php echo $product_details['material'] ?></td>
        </tr>
        <tr>
          <td>価格</td>
          <td><?php echo $product_details['price'] ?>円（税込）</td>
        </tr>
        <tr>
          <td>送料</td>
          <td><?php echo $product_details['delivery_charge'] ?>円</td>
        </tr>
        <tr>
          <td>備考</td>
          <td><?php echo $product_details['remarks'] ?></td>
        </tr>
      </tbody>
    </table>
  </figure>

  <p class="product-description">
    <?php echo get_field('product_description'); ?>
  </p>

  <hr class="separate">

  <!-- 同タームの商品を取得する -->
  <?php $products = get_same_term_products(); ?>
  <h4>関連商品</h4>
  <div class="product-flex">
    <?php if($products->have_posts()): while($products->have_posts()):
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

<?php get_footer(); ?>
