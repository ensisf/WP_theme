<?php
//////////Reviews
add_action( 'init', 'post_type_review' );
function post_type_review() {
  $labels = array(
    'name'               => 'Отзывы', // основное название для типа записи
    'singular_name'      => 'Отзыв', // название для одной записи этого типа
    'add_new'            => 'Добавить отзыв', // для добавления новой записи
    'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
    'edit_item'          => 'Редактирование отзыва', // для редактирования типа записи
    'new_item'           => 'Новый отзыв', // текст новой записи
    'view_item'          => 'Смотреть отзыв', // для просмотра записи этого типа.
    'search_items'       => 'Искать отзыв', // для поиска по этим типам записи
    'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
    'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
    'parent_item_colon'  => '', // для родителей (у древовидных типов)
    'menu_name'          => 'Отзывы', // название меню
  );
  $args = array(
    'label'  => null,
    'labels' => $labels,
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => null,
    'exclude_from_search' => null,
    'show_ui'             => null,
    'show_in_menu'        => null, // показывать ли в меню адмнки
    'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => null,
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 8,
    'menu_icon'           => 'dashicons-screenoptions',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => true,
    'supports'            => array(
      'title',
      'thumbnail',
      'editor',
      'page-attributes',
      'excerpt',
//      'custom-fields',
      'comments',
      'editor',
//      'author',
//      'trackbacks',
      'revisions',
      'post-formats'
    ),
    'taxonomies'          => array(),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true,
  );
  register_post_type( 'review', $args );
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
