<?php get_header(); ?>

<!-- Usual loop -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
  <?php the_permalink(); ?>
  <?php the_title(); ?>
  <?php the_content(); ?>
  <?php the_excerpt(); ?>
<?php endwhile;
else: echo '<p>Нет записей.</p>'; endif; ?>

<!-- // WP_Query-->
<?php
	 $args = array(
			'post_type' => 'projects',
			'posts_per_page'=> -1
	);
	$query = new WP_Query($args); ?>
<?php if($query->have_posts()) { ?><!-- //start if -->

	<?php while($query->have_posts()){ $query->the_post(); ?><!-- //start while -->


	 <?php }; ?><!-- //end while -->

<?php }; ?><!-- //end if -->
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
