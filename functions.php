<?php

///////////////////////////////////// styles/scripts /////////////////////////////////////
function theme_stylesheet() {
 	wp_enqueue_style( 'main_style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_stylesheet' );

function theme_scripts() {

    if ( is_page('50') ) {
        wp_register_script( 'google_map_script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCkYAwhzbXlBayCV1HYYFRy9nR_2Z4gujw');
        wp_enqueue_script( 'google_map_script' );
     }

    wp_register_script( 'main_script', get_stylesheet_directory_uri() . '/js/main.min.js', array('jquery'), true, true );
    wp_enqueue_script( 'main_script' );

    // additional data (for example ajax url)
    wp_localize_script('main_script', 'themeData',
        array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'path' => get_template_directory_uri()
        )
    );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// custom post type
// require_once( trailingslashit( get_stylesheet_directory() ) . 'includes/custom-post-types.php' );

//тег title в head сайту
add_theme_support('title-tag');

// Віджети
function main_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( '', 'main' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'main_widgets_init' );

///////////////////////////////////// register menu /////////////////////////////////////
register_nav_menus(array(
	'top'    => 'Header menu', //Название месторасположения меню в шаблоне
	'bottom' => 'Footer menu'
));

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	 if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active';
     }
	 return $classes;
}

///////////////////////////////////// thumbnails /////////////////////////////////////
//Change sizes in option - media
// thumbnail - (default 150px x 150px max)
// medium -  (default 300px x 300px max)
// large - (default 640px x 640px max)
// full - image resolution (unmodified)
add_theme_support('post-thumbnails');
// add_image_size( 'post_mini', 236, 164, true);


///////////////////////////////////// Зміна довжини excerpt /////////////////////////////////////
// за замовчуванням - 55
function new_excerpt_length($length) {
    return 21;
}

add_filter('excerpt_length', 'new_excerpt_length');

///////////////////////////////////// Видалення конструкції [...] в excerpt/////////////////////////////////////
add_filter('excerpt_more', function($more) {
    return '...';
});


//disable emogies
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
//   add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

///////////////////////////////////// Руссифицирует месяца и недели в дате  /////////////////////////////////////

/**
 * Функция для фильтра date_i18n.
 * @param строка $date        Дата в принятом формате
 * @param строка $req_format  Формат передаваемой даты
 * @return Дату в русском формате
 */
function kama_drussify_months( $date, $req_format ){
    // в формате есть "строковые" неделя или месяц
    if( ! preg_match('~[FMlS]~', $req_format ) ) return $date;

    $replace = array (
        "январь" => "Января", "Февраль" => "Февраля", "Март" => "Марта", "Апрель" => "Апреля", "Май" => "Мая", "Июнь" => "Июня", "Июль" => "Июля", "Август" => "Августа", "Сентябрь" => "Сентября", "Октябрь" => "Октября", "Ноябрь" => "Ноября", "Декабрь" => "Декабря",
        "January" => "Января", "February" => "Февраля", "March" => "Марта", "April" => "Апреля", "May" => "Мая", "June" => "Июня", "July" => "Июля", "August" => "Августа", "September" => "Сентября", "October" => "Октября", "November" => "Ноября", "December" => "Декабря",
        "Jan" => "Янв.", "Feb" => "Фев.", "Mar" => "Март.", "Apr" => "Апр.", "May" => "Мая", "Jun" => "Июня", "Jul" => "Июля", "Aug" => "авг.", "Sep" => "Сен.", "Oct" => "Окт.", "Nov" => "Нояб.", "Dec" => "Дек.",
        "Sunday" => "воскресенье", "Monday" => "понедельник", "Tuesday" => "вторник", "Wednesday" => "среда", "Thursday" => "четверг", "Friday" => "Пятница", "Saturday" => "Суббота",
        "Sun" => "вос.", "Mon" => "пон.", "Tue" => "вт.", "Wed" => "ср.", "Thu" => "чет.", "Fri" => "пят.", "Sat" => "суб.", "th" => "", "st" => "", "nd" => "", "rd" => "",
    );

    return strtr( $date, $replace );
}

add_filter('date_i18n', 'kama_drussify_months', 11, 2);




/////////////////////////////////////  pagination  /////////////////////////////////////
function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '<span class="pag-arrow pag-arrow-prev"><div class="icon"><svg width="13" height="21"><use xlink:href="#prev"></use></svg></div></span>'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '<span class="pag-arrow pag-arrow-next"><div class="icon"><svg width="13" height="21"><use xlink:href="#next"></use></svg></div></span>'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="pagination">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}

/////////////////////////////add categories for pages ///////////////////////////////////////////


// function true_apply_categories_for_pages(){
//   add_meta_box( 'categorydiv', 'Категории', 'post_categories_meta_box', 'page', 'side', 'normal'); // добавляем метабокс категорий для страниц
//   register_taxonomy_for_object_type('category', 'page'); // регистрируем рубрики для страниц
// }
// // обязательно вешаем на admin_init
// add_action('admin_init','true_apply_categories_for_pages');

// function true_expanded_request_category($q) {
//   if (isset($q['category_name'])) // если в запросе присутствует параметр рубрики
//     $q['post_type'] = array('post', 'page'); // то, помимо записей, выводим также и страницы
//   return $q;
// }

// add_filter('request', 'true_expanded_request_category');


