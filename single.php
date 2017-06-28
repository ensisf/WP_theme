<?php get_header(); ?>
<?php get_template_part('breadcrumbs'); ?>
 <?php the_post(); ?>
<section class="entry">
  <div class="container">
   
      <div class="entry__wrap">
        <?php if (has_post_thumbnail()) { ?>
          <div class="entry__image">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php } ?>
        <div class="entry__text">
          <h1 class="entry__title"><?php the_title(); ?></h1>
          <?php the_content(); ?>
          <div class="entry__info">
            <time class="entry__date"><?php echo get_the_date('d.m.Y');  ?></time>
          </div>
        </div>
      </div>
      <?php the_category(',') // ссылки на категории в которых опубликован пост, через зпт ?>
      <?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
      
    <?php previous_post_link('%link', '<- Предыдущий пост: %title', TRUE); // ссылка на предыдущий пост ?>
    <?php next_post_link('%link', 'Следующий пост: %title ->', TRUE); // ссылка на следующий пост ?>
    <?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
  </div>
</section>
<?php get_footer(); ?>
