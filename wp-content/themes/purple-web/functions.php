<?php

/**
 * purple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package purple
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function purple_web_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on purple, use a find and replace
		* to change 'purple-web' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('purple-web', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'purple-web'),
			'menu-2' => esc_html__('Footer-menu', 'purple-web'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'purple_web_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	// add_theme_support(
	// 	'custom-logo',
	// 	array(
	// 		'height'      => 160,
	// 		'width'       => 85,
	// 		'flex-width'  => true,
	// 		'flex-height' => true,
	// 	)
	// );
}
add_action('after_setup_theme', 'purple_web_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function purple_web_content_width()
{
	$GLOBALS['content_width'] = apply_filters('purple_web_content_width', 640);
}
add_action('after_setup_theme', 'purple_web_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function purple_web_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'purple-web'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'purple-web'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer1', 'purple-web'),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__('Add widgets here.', 'purple-web'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			//'before_title'  => '<h2 class="widget-title">',
			//'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'purple_web_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function purple_web_scripts()
{
	wp_enqueue_style('purple-web-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('purple-web-fonts', get_stylesheet_directory_uri() . '/assets/fonts.css', array(), null);
	wp_enqueue_style('purple-palette', get_stylesheet_directory_uri() . '/assets/color-palette.css', array(), null);
	wp_enqueue_style('purple-web-styles', get_stylesheet_directory_uri() . '/assets/styles.css', array(), null);
	wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/inc/swiper/swiper-bundle.min.css', array(), null);
	wp_enqueue_style('floatbut-css', get_stylesheet_directory_uri() . '/assets/float-button.css', array(), null);
	wp_enqueue_style('fancy-styles', get_stylesheet_directory_uri() . '/inc/fancybox/jquery.fancybox.min.css', array(), null);
	wp_style_add_data('purple-web-style', 'rtl', 'replace');

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery_scripts', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('js-accordion-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), null, true);
	wp_enqueue_script('purple-web-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), null, true);
	wp_enqueue_script('fancy-scripts', get_stylesheet_directory_uri() . '/inc/fancybox/jquery.fancybox.min.js', array(), null, true);
	wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/inc/swiper/swiper-bundle.min.js', array(), null, true);
	wp_enqueue_script('swiper-scripts', get_stylesheet_directory_uri() . '/inc/swiper/slider-scripts.js', array(), null, true);
	wp_enqueue_script('js-accordion', get_template_directory_uri() . '/js/accordion.js', array(), null, true);

	wp_enqueue_script('purple-web-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), null, true);
	wp_enqueue_script('imask-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js', array(), null, true);
	//wp_enqueue_script('spikmi-script', 'https://spikmi.org/Widget?Id=35203', array(), null, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'purple_web_scripts');

add_action('after_setup_theme', 'gut_styles');

function gut_styles()
{
	add_theme_support('editor-styles');
	add_editor_style('assets/admin-styles.css');
}

// function add_async_attribute($tag, $handle) {
// 	// добавьте дескрипторы (названия) скриптов в массив ниже
// 	$scripts_to_async = array('spikmi-script');

// 	foreach($scripts_to_async as $async_script) {
// 	   if ($async_script === $handle) {
// 		  return str_replace(' src', ' async src', $tag);
// 	   }
// 	}
// 	return $tag;
//  }

//  add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/***
 * Carbon fields
 */
require 'inc/carbon-fields.php';

require 'inc/current-temp.php';

require 'inc/breadcrumbs.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Custom post colors
 */
require get_template_directory() . '/inc/mypalette.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// удаляем "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});


// создаем новую колонку
// add_filter('manage_' . 'page' . '_posts_columns', 'add_views_column', 4);
// function add_views_column($columns)
// {
// 	$num = 2; // после какой по счету колонки вставлять новые

// 	$new_columns = [
// 		'views' => 'Шаблон',
// 	];

// 	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
// }

// заполняем колонку данными
// wp-admin/includes/class-wp-posts-list-table.php
// add_action('manage_' . 'page' . '_posts_custom_column', 'fill_views_column', 5, 2);
// function fill_views_column($colname, $post_id)
// {
// 	if ($colname === 'views') {

// 		//echo $post_id;
// 		//echo 'ok';
// 		$template = get_post_meta($post_id, '_wp_page_template', true);
// 		echo $template;

// 		// if ($template && $template !== 'default') {
// 		// 	echo 'Шаблон страницы: ' . $template;
// 		// } 
// 	}
// }


// Добавляем новую колонку "Шаблон" в таблицу страниц
add_filter('manage_page_posts_columns', 'add_template_name_column', 4);
function add_template_name_column($columns)
{
	$num = 2; // позиция для вставки

	$new_columns = [
		'template_name' => 'Шаблон',
	];

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

// Заполняем колонку названием шаблона
add_action('manage_page_posts_custom_column', 'fill_template_name_column', 5, 2);
function fill_template_name_column($colname, $post_id)
{
	if ($colname === 'template_name') {
		$template = get_post_meta($post_id, '_wp_page_template', true);

		if ($template === 'default') {
			echo 'По умолчанию';
			return;
		}

		// Получаем все зарегистрированные шаблоны для страниц
		$templates = wp_get_theme()->get_page_templates();

		// Ищем читаемое название по имени файла
		$name = array_search($template, $templates);

		echo $name ? esc_html($name) : esc_html($template);
	}
}

// Contact Form 7 remove auto added p tags
add_filter('wpcf7_autop_or_not', '__return_false');

// Универсальная функция нумерованной пагинации
function nums_pagination() {
    global $wp_query;

    // Пагинация выводится, только если есть больше одной страницы
    if ( $wp_query->max_num_pages <= 1 ) {
        return;
    }

    echo '<nav class="pagination" role="navigation">';

	$prev = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="16" viewBox="0 0 50 16" fill="none">
  <path d="M48.9998 6.99992L1.49976 6.99992C0.947471 6.99992 0.499756 7.44764 0.499756 7.99992C0.499756 8.55221 0.947471 8.99992 1.49976 8.99992L48.9998 8.99992C49.552 8.99992 49.9998 8.55221 49.9998 7.99992C49.9998 7.44764 49.552 6.99992 48.9998 6.99992Z" fill="black"/>
  <path d="M0.224365 7.36907C-0.0959851 7.76184 -0.0733914 8.34084 0.292725 8.70696L7.29272 15.707L7.3689 15.7753C7.76167 16.0957 8.34067 16.0731 8.70679 15.707C9.0729 15.3408 9.0955 14.7618 8.77515 14.3691L8.70679 14.2929L2.41382 7.99992L8.70679 1.70696C9.09731 1.31643 9.09731 0.683417 8.70679 0.292893C8.31626 -0.0976311 7.68325 -0.0976311 7.29272 0.292893L0.292725 7.29289L0.224365 7.36907Z" fill="black"/>
</svg>';

$next = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="16" viewBox="0 0 50 16" fill="none">
  <path d="M1 6.99992L48.5 6.99992C49.0523 6.99992 49.5 7.44764 49.5 7.99992C49.5 8.55221 49.0523 8.99992 48.5 8.99992L1 8.99992C0.447715 8.99992 -8.8941e-09 8.55221 0 7.99992C7.32521e-07 7.44764 0.447716 6.99992 1 6.99992Z" fill="black"/>
  <path d="M49.7754 7.36907C50.0957 7.76184 50.0731 8.34084 49.707 8.70696L42.707 15.707L42.6309 15.7753C42.2381 16.0957 41.6591 16.0731 41.293 15.707C40.9269 15.3408 40.9043 14.7618 41.2246 14.3691L41.293 14.2929L47.5859 7.99992L41.293 1.70696C40.9024 1.31643 40.9024 0.683417 41.293 0.292893C41.6835 -0.0976311 42.3165 -0.0976311 42.707 0.292893L49.707 7.29289L49.7754 7.36907Z" fill="black"/>
</svg>';

    the_posts_pagination( array(
        'mid_size'           => 2,
        'prev_text'          => __($prev, 'your-text-domain'),
        'next_text'          => __($next, 'your-text-domain'),
        'screen_reader_text' => __('Навигация по страницам', 'your-text-domain'),
    ) );

    echo '</nav>';
}