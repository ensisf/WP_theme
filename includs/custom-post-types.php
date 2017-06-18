<?php
////////////////////////////////////////////////////////////////////  Post type
add_action( 'init', 'post_type_news' );
function post_type_news() {
  $labels = array(
    'name'               => 'Новости',
    'singular_name'      => 'Новость',
    'add_new'            => 'Добавить',
    'add_new_item'       => 'Добавить новость',
    'edit_item'          => 'Редактировать',
    'new_item'           => 'Добавить',
    'view_item'          => 'Посмотреть',
    'search_items'       => 'Поиск',
    'not_found'          => 'Не найдено',
    'not_found_in_trash' => 'Не найдено',
  );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-screenoptions',
    'menu_position'       => 8,
    'hierarchical' => true,
    'supports' => array(
      'title',
      'thumbnail',
      'editor',
      'comments',
      'page-attributes'
    )
  );
  register_post_type( 'news', $args );
}

////////////////////////////////////////////////////////////////////  Taxonomy
add_action( 'init', 'create_news_taxonomies', 0 );
function create_news_taxonomies(){
  $labels = array(
    'name' => _x( 'Раздел', 'taxonomy general name' ),
    'singular_name' => _x( 'Раздел', 'taxonomy singular name' ),
    'edit_item' => __( 'Редактировать Раздел' ),
    'update_item' => __( 'Обновить Раздел' ),
    'add_new_item' => __( 'Добавить Раздел' ),
    'menu_name' => __( 'Разделы' ),
  );

  // Добавляем древовидную таксономию 'genre' (как категории)
  register_taxonomy('section', array('news'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'section' ),
  ));
}
