<?php get_header(); ?>

        <article class="<?php post_class(); ?>">
          <?php if(have_posts()): while(have_posts()):
            the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </article>

<?php get_footer(); ?>
