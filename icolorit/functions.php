<?php

/* Поддержка миниатюр */

function wp_kama_theme_setup()
{

    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'wp_kama_theme_setup');

/* Подключаем меню */
add_theme_support('menus');

register_nav_menus(array(
    'header_menu' => 'Главное меню'
));

/* Склоняем даты */
function true_russian_date_forms($the_date = '')
{
    if (substr_count($the_date, '---') > 0) {
        return str_replace('---', '', $the_date);
    }
    // массив замен для русской локализации движка и для английской
    $replacements = array(
        "Январь" => "января", // "Jan" => "января"
        "Февраль" => "февраля", // "Feb" => "февраля"
        "Март" => "марта", // "Mar" => "марта"
        "Апрель" => "апреля", // "Apr" => "апреля"
        "Май" => "мая", // "May" => "мая"
        "Июнь" => "июня", // "Jun" => "июня"
        "Июль" => "июля", // "Jul" => "июля"
        "Август" => "августа", // "Aug" => "августа"
        "Сентябрь" => "сентября", // "Sep" => "сентября"
        "Октябрь" => "октября", // "Oct" => "октября"
        "Ноябрь" => "ноября", // "Nov" => "ноября"
        "Декабрь" => "декабря" // "Dec" => "декабря"
    );
    return strtr($the_date, $replacements);
}

add_filter('the_time', 'true_russian_date_forms');
add_filter('get_the_time', 'true_russian_date_forms');
add_filter('the_date', 'true_russian_date_forms');
add_filter('get_the_date', 'true_russian_date_forms');
add_filter('the_modified_time', 'true_russian_date_forms');
add_filter('get_the_modified_date', 'true_russian_date_forms');
add_filter('get_post_time', 'true_russian_date_forms');
add_filter('get_comment_date', 'true_russian_date_forms');


/* Защита от вредоносный запросов */

if (strpos($_SERVER['REQUEST_URI'], "eval(") || strpos($_SERVER['REQUEST_URI'], "CONCAT") || strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") || strpos($_SERVER['REQUEST_URI'], "base64")) {
    @header("HTTP/1.1 400 Bad Request");
    @header("Status: 400 Bad Request");
    @header("Connection: Close");
    @exit;
}


/* Антиспам */

function true_stop_spam($commentdata)
{
    $fake = trim($_POST['comment']); // обычное поле комментирования мы скроем через CSS
    if (!empty($fake)) // заполнение его роботами будет приводить к ошибке, комментарий отправляться не будет
        wp_die('Спамный коммент!');
    $_POST['comment'] = trim($_POST['true_comment']); // затем мы присвоим ему значение поля комментария, которое для людей
    return $commentdata;
}

add_filter('pre_comment_on_post', 'true_stop_spam');

function services()
{
    echo '<table class="menu"><tr><td><ul><li><ul>';
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'page',
        'post_parent' => get_the_ID(),
		'orderby' => 'title',
		'order' => 'ASC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo '<li><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';
        }
    }
    wp_reset_postdata();
    echo '</ul></li></ul></td></tr></table>';
}
add_shortcode('servs', 'services');

function all_list()
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'page',
        'post_parent' => get_the_ID(),
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query;
    $main_post = $query->query($args);
    if ($main_post) {
        echo '<div class="block-box-in"><table class="menu"><tr>';

        foreach($main_post as $m_post){
            $args_child = array(
                'posts_per_page' => -1,
                'post_type' => 'page',
                'post_parent' => $m_post->ID,
                'orderby' => 'title',
                'order' => 'ASC'
            );
            echo '<td><ul><li><a>'.$m_post->post_title.'</a>';
            $child = new WP_Query();
            $post_child = $child->query($args_child);
            if ($post_child) {
                echo '<ul>';
                foreach($post_child as $p_child){

                   echo '<li><a href="' . get_permalink($p_child->ID) . '">' . $p_child->post_title . '</a></li>';
                }
                echo '</ul>';
            }
            echo '</li></ul></td>';
        }
        echo '</tr></table></div>';
    }
    wp_reset_postdata();
}
add_shortcode('all_list', 'all_list');


add_action('init', 'my_custom_init');
function my_custom_init()
{
  $labels = array(
	'name' => 'Слайдер', // Основное название типа записи
	'singular_name' => 'Слайд', // отдельное название записи типа Book
	'menu_name' => 'Слайдер'

  );
  $args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has_archive' => true,
	'hierarchical' => false,
	'menu_position' => 4,
	'supports' => array('title','thumbnail')
  );
  register_post_type('slider',$args);
}

class extended_walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'dropdown-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        /*
         * Некоторые из параметров объекта $item
         * ID - ID самого элемента меню, а не объекта на который он ссылается
         * menu_item_parent - ID родительского элемента меню
         * classes - массив классов элемента меню
         * post_date - дата добавления
         * post_modified - дата последнего изменения
         * post_author - ID пользователя, добавившего этот элемент меню
         * title - заголовок элемента меню
         * url - ссылка
         * attr_title - HTML-атрибут title ссылки
         * xfn - атрибут rel
         * target - атрибут target
         * current - равен 1, если является текущим элементов
         * current_item_ancestor - равен 1, если текущим является вложенный элемент
         * current_item_parent - равен 1, если текущим является вложенный элемент
         * menu_order - порядок в меню
         * object_id - ID объекта меню
         * type - тип объекта меню (таксономия, пост, произвольно)
         * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
         * type_label - название данного типа с локализацией (Рубрика, Страница)
         * post_parent - ID родительского поста / категории
         * post_title - заголовок, который был у поста, когда он был добавлен в меню
         * post_name - ярлык, который был у поста при его добавлении в меню
         */
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        /*
         * Генерируем строку с CSS-классами элемента меню
         */
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // функция join превращает массив в строку
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        /*
         * Генерируем ID элемента
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        /*
         * Генерируем элемент меню
         */

        if($args->walker->has_children)$class_names = ' class="dropdown"';
        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        // атрибуты элемента, title="", rel="", target="" и href=""
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        // ссылка и околоссылочный текст
        $add='';
        if($args->walker->has_children)$add=' class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .$add.'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        if($args->walker->has_children)$item_output .= '<b class="caret"></b>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}