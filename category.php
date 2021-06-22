<?php get_header(); ?>

        <div class="article-list">
          <?php if(have_posts()): while(have_posts()):
            the_post(); ?>
            <p class="date-title">
              <time datetime="<?php echo the_time('Y-m-d') ?>"><?php echo the_time('Y.m.d') ?></time>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </p>
          <?php endwhile; endif; ?>
        </div>
        <?php the_posts_pagination(['prev_next' => false]); ?>

<?php get_footer(); ?>
