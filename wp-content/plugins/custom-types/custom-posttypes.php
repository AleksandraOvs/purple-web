<?php
/*
Plugin Name: Каталог книг
Plugin URI: https://tokmakov.msk.ru
Description: Позволяет создать на сайте простой каталог книг с таксономией по жанрам.
Version: 1.0
Author: Евгений Токмаков
Author URI: https://tokmakov.msk.ru
*/

register_activation_hook(__FILE__, function() {
    // проверяем права пользователя на установку плагинов
    if (!current_user_can('activate_plugins')) {
        return;
    }
});

register_deactivation_hook(__FILE__, function() {
    // проверяем права пользователя на деактивацию плагинов
    if (!current_user_can('deactivate_plugins')) {
        return;
    }
});

/*
 * Регистрируем пользовательский тип записи book
 */
add_action('init', function () {
    $labels = [
        'name' => 'Портфолио',
        'menu_name' => 'Портфолио',
        'singular_name' => 'Проект',
        'add_new' => 'Добавить проект',
        'add_new_item' => 'Добавить новый проект',
        'edit_item' => 'Редактировать проект',
        'new_item' => 'Новый проект',
        'all_items' => 'Все проекты',
        'view_item' => 'Посмотреть проект',
        'search_items' => 'Найти проекты',
        'not_found' =>  'Ничего не найдено',
        'not_found_in_trash' => 'В корзине не найдено'
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => [
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'
        ],
        'taxonomies' => ['category'],
    ];
    register_post_type('portfolio', $args);
});

/*
 * Регистрируем иерархическую таксономию по жанрам
 */
add_action('init', function () {
    $labels = array(
        'name'          => 'Типы проектов',
        'singular_name' => 'Проект',
        'menu_name'     => 'Проекты' ,
        'all_items'     => 'Все проекты',
        'edit_item'     => 'Редактировать проект',
        'view_item'     => 'Посмотреть проект',
        'update_item'   => 'Сохранить проект',
        'add_new_item'  => 'Добавить новый проект',
        'parent_item'   => 'Родительский проект',
        'search_items'  => 'Поиск по проектам',
        'back_to_items' => 'Назад на страницу проектов',
        'most_used'     => 'Популярные проекты',
    );
    $args = array(
        'labels'            => $labels,
        'show_admin_column' => true,
        'hierarchical'      => true,
    );
    register_taxonomy('project-type', ['portfolio'], $args);
});

require 'Projects_Types_Widget.php';

/*
 * Регистрируем виджет «Жанры книг»
 */
add_action(
    'widgets_init',
    function () {
        register_widget('Projects_Types_Widget');
    }
);