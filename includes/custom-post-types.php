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
add_action('init', 'create_review_category');
function create_review_category(){
  // список параметров: http://wp-kama.ru/function/get_taxonomy_labels
  register_taxonomy('review_category', array('review'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Категории отзывов',
      'singular_name'     => 'Категория отзыва',
      'search_items'      => 'Поиск в категории',
      'all_items'         => 'Все категории',
      'parent_item'       => 'Родительськая категория',
      'parent_item_colon' => 'Родительськая категория:',
      'edit_item'         => 'Редактировать категорию',
      'update_item'       => 'Обновить категорию',
      'add_new_item'      => 'Добавить новую категорию',
      'new_item_name'     => 'Название новой категории',
      'menu_name'         => 'Категории отзывов',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => null, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => false,
    'update_count_callback' => '',
    'rewrite'               => true,
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );
}