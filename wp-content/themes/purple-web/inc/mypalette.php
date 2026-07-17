<?php

function mytheme_custom_colors() {
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Black', 'purple-web'),
            'slug'  => 'black',
            'color' => '#292929',
        ),
        array(
            'name'  => __('Dark', 'purple-web'),
            'slug'  => 'dark',
            'color' => '#3a343e',
        ),
        array(
            'name'  => __('Purple', 'purple-web'),
            'slug'  => 'purple',
            'color' => '#614881',
        ),
         array(
            'name'  => __('Accent-green', 'purple-web'),
            'slug'  => 'accent-green',
            'color' => '#B9EB8A',
        ),
          array(
            'name'  => __('Grey', 'purple-web'),
            'slug'  => 'grey',
            'color' => '#828282',
        ),
         array(
            'name'  => __('Light Grey', 'purple-web'),
            'slug'  => 'light-grey',
            'color' => '#ded9e2',
        ),
         array(
            'name'  => __('White', 'purple-web'),
            'slug'  => 'white',
            'color' => '#fff',
        ),
    ));
    add_theme_support('disable-custom-colors');
}
add_action('after_setup_theme', 'mytheme_custom_colors');