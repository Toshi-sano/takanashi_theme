<?php get_header(); ?>

  <div class="post-flex">
    <article class="<?php post_class(); ?>">
      <?php if(have_posts()): while(have_posts()):
        the_post(); ?>
        <div>
          <time datetime="<?php echo the_time('Y-m-d') ?>"><?php echo the_time('Y.m.d') ?></time>
        </div>
        <h3 class="post-title"><?php the_title(); ?></h3>
        <div class="post-text">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </article>
    <aside class="post-aside">
      <?php if(is_active_sidebar('post-aside')):
        dynamic_sidebar('post-aside');
      endif; ?>
    </aside>
  </div>

<?php get_footer(); ?>
