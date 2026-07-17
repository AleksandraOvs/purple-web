<?php

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
        'taxonomies' => ['category', 'post_tag'],
    ];
    register_post_type('portfolio', $args);
});

add_action('init', function () {
    $labels = [
        'name' => 'Рамки',
        'menu_name' => 'Рамки',
        'singular_name' => 'Рамка',
        'add_new' => 'Добавить рамку',
        'add_new_item' => 'Добавить новую рамку',
        'edit_item' => 'Редактировать рамку',
        'new_item' => 'Новая рамка',
        'all_items' => 'Все Рамки',
        'view_item' => 'Посмотреть рамку',
        'search_items' => 'Найти рамку',
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
        'taxonomies' => ['category', 'post_tag'],
    ];
    register_post_type('photonik', $args);
});
