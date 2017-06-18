  	<footer class="footer">
      <div class="container">
        <?php
        wp_nav_menu( array(
            'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
                                                  // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
            'container'       => '',              // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
            'container_class' => '',              // (string) class контейнера (div тега)
            'container_id'    => '',              // (string) id контейнера (div тега)
            'menu_class'      => '',              // (string) class самого меню (ul тега)
            'menu_id'         => '',              // (string) id самого меню (ul тега)
            'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
            'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
            'before'          => '',              // (string) Текст перед <a> каждой ссылки
            'after'           => '',              // (string) Текст после </a> каждой ссылки
            'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
            'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
            'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
            'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
            'theme_location'  => 'bottom'         // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
        ) );
        ?>
        <a href="http://my-master.net.ua/" class="master" target="_blank" title="Разработка сайтов в Киеве  ">
          <img src="<?php bloginfo('template_url'); ?>/img/images/master.png" alt="Создание и разработка сайтов My Master" width="101" height="37">
        </a>
      </div>
  	</footer>
  <?php wp_footer(); ?>
  </body>
</html>
