<?php get_header(); ?>
<?php get_template_part('breadcrumbs'); ?>
<section>
  <div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('size'); } ?>

  <?php the_permalink(); ?>

  <?php the_title(); ?>

  <?php the_content(); ?>

  <?php the_excerpt(); ?>

<?php endwhile;

else: echo '<p>Нет записей.</p>'; endif; ?>
<?php if (function_exists('wp_corenavi')) { wp_corenavi(); } ?>
 </div>
</section>
<?php get_footer(); ?>
