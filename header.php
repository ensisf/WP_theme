<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/img/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/img/images/favicon/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/img/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <!-- / -->

    <script>
      var path    = '<?php bloginfo('template_url'); ?>'; // for svg sprite
      var homeURL = '<?php echo home_url(); ?>';
    </script>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); // все классы для body ?>>
    <header class="header">
      <div class="container">

        <!-- // languages via qtranslate WP plagin -->
        <?php echo qtranxf_generateLanguageSelectCode('text'); ?>
        
        <?php
        wp_nav_menu( array(
            'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
                                                  // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
            'container'       => '',              // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
            'container_class' => '',              // (string) class контейнера (div тега)
            'container_id'    => '',              // (string) id контейнера (div тега)
            'menu_class'      => 'nav__list',     // (string) class самого меню (ul тега)
            'menu_id'         => '',              // (string) id самого меню (ul тега)
            'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
            'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
            'before'          => '',              // (string) Текст перед <a> каждой ссылки
            'after'           => '',              // (string) Текст после </a> каждой ссылки
            'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
            'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
            'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
            'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
            'theme_location'  => 'top'               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
        ) );
        ?>
      </div>
    </header>
<?php  if(!is_front_page()){
  get_template_part('includes/breadcrumbs');
} ?>