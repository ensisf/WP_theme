<?php get_header(); ?>
<section>
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="post">
        <?php the_permalink(); ?>
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail('size');
        } ?>
        <?php the_title(); ?>
        <?php echo get_the_date('d.m.Y'); ?>
        <?php the_excerpt(); ?>
      </article>
    <?php endwhile;
    else: echo '<p>Нет записей.</p>'; endif; ?>
  </div>
  <?php if (function_exists('wp_corenavi')) {
    wp_corenavi();
  } ?>
</section>
<?php get_footer(); ?>
