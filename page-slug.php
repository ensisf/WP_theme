<?php /* Template Name: Название */ ?>
<?php get_header(); ?>
<?php get_template_part('breadcrumbs'); ?>
<?php if (have_posts()) while (have_posts()) : the_post(); ?>
  <section class="page">
    <div class="container">
      <header class="page__heading">
        <h1 class="page__title"><?php the_title(); ?></h1>
      </header>
      <div class="page__content">
        <?php the_content(); // контент ?>
      </div>
    </div>
  </section>
<?php endwhile; // конец цикла ?>
<?php get_footer(); ?>
