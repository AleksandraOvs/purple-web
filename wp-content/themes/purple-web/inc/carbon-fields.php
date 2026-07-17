<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'site_carbon');
function site_carbon()
{
    Container::make('theme_options', 'Контакты')
        ->set_page_menu_position(2)
        ->set_icon('dashicons-admin-comments')
        ->add_tab(__('Способы связи'), array(
            Field::make('complex', 'contacts', 'Ссылки')
                ->add_fields(array(
                    Field::make('text', 'contact_link', 'Ссылка на способ связи')
                        ->set_width(50),
                    Field::make('image', 'contact_image', 'Изображение способа связи')
                        ->set_width(50),
                )),
        ))

        ->add_tab(__('Форма обратной связи'), array(
            Field::make('rich_text', 'crb_contact_form_head', 'Заголовок')
                ->set_width(33),
            Field::make('rich_text', 'crb_contact_form_desc', 'Подзаголовок')
                ->set_width(33),
            Field::make('text', 'crb_contact_form_shortcode', 'Шорткод')
                ->set_width(33),
        ));

    Container::make('theme_options', 'Блоки')
        ->set_page_menu_position(3)
        ->set_icon('dashicons-admin-comments')
        ->add_tab(__('Выбирайте вордпресс'), array(
            Field::make('text', 'crb_about_head', 'Заголовок')
                ->set_width(25),

            Field::make('complex', 'crb_about_text_fragments', 'Абзацы')
                ->add_fields('complex', 'Текстовый блоки', array(
                    Field::make('image', 'crb_about_text_image', 'Иконка')
                        ->set_width(25),
                    Field::make('rich_text', 'crb_about_text_p', 'Параграф')
                        ->set_width(25),
                )),
            Field::make('rich_text', 'crb_about_description', 'Краткое описание блока')
                ->set_width(80),
            Field::make('image', 'crb_about_image', 'Фото')
                ->set_width(20),
        ))

        ->add_tab(__('Контактная форма'), array(
            Field::make('text', 'crb_contact_shortcode', 'Шорткод')
        ))

        ->add_tab(__('Этапы'), array(
            Field::make('rich_text', 'crb_steps_head', 'Заголовок')
                ->set_width(50),
            Field::make('rich_text', 'crb_steps_desc', 'Подзаголовок')
                ->set_width(50),

            Field::make('complex', 'crb_steps', 'Контент этапа')
                ->add_fields(array(
                    Field::make('image', 'crb_step_image', 'Иконка этапа')
                        ->set_width(15),
                    Field::make('color', 'crb_step_image_bg', 'Фон иконки')
                        ->set_width(15),
                    Field::make('text', 'crb_step_head', 'Заголовок этапа')
                        ->set_width(20),
                    Field::make('rich_text', 'crb_step_text', 'Текст этапа')
                        ->set_width(50),
                )),
        ))

        ->add_tab(__('Слайдер'), array(
            Field::make('rich_text', 'crb_slider_head', 'Заголовок')
                ->set_width(50),
            Field::make('rich_text', 'crb_slider_desc', 'Подзаголовок')
                ->set_width(50),

            Field::make('complex', 'crb_wp_slides', 'Контент этапа')
                ->add_fields(array(
                    Field::make('image', 'crb_slide_image', 'Картинка на слайде')
                        ->set_width(15),
                    Field::make('color', 'crb_slide_bg', 'Фон слайда')
                        ->set_width(15),
                    Field::make('text', 'crb_slide_head', 'Заголовок слайда')
                        ->set_width(20),
                    Field::make('rich_text', 'crb_slide_text', 'Текст слайда')
                        ->set_width(50),
                )),
        ))
        ->add_tab(__('Блок работ'), array(
            Field::make('text', 'crb_works_head', 'Заголовок блока')
                ->set_width(50),
            Field::make('rich_text', 'crb_works_desc', 'Подзаголовок блока')
                ->set_width(50),
            Field::make('text', 'crb_works_button', 'Текст кнопки перехода')
                ->set_width(50),
            Field::make('text', 'crb_works_button_link', 'Ссылка кнопки перехода')
                ->set_width(50),
            Field::make('association', 'crb_association_works')
                ->set_types(array(
                    array(
                        'type' => 'post',
                        'post_type' => 'portfolio',
                    ),
                ))
        ))

        ->add_tab(__('FAQ'), array(
            Field::make('text', 'crb_faq_head', 'FAQ heading'),
            Field::make('complex', 'crb_faq_items', 'Items')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'crb_question', 'Question')
                        ->set_width(30),
                    Field::make('rich_text', 'crb_answer', 'Answer')
                        ->set_width(100),
                )),

            Field::make('text', 'crb_faq-block_heading', 'Form heading')
                ->set_width(33),
            Field::make('rich_text', 'crb_faq-block_description', 'Form description')
                ->set_width(33),
            Field::make('text', 'crb_faq-block_shortcode')
                ->set_width(33)
        ));

    Container::make('post_meta', 'Контент отдельной страницы')
        ->where('post_template', '=', 'template-page.php')
        ->add_tab(__('Слайдер первого экрана'), array(
            Field::make('text', 'crb_h1', 'Заголовок'),
            Field::make('rich_text', 'crb_slider_desc', 'Подзаголовок'),
            Field::make('text', 'crb_slider_link', 'Ссылка'),
            Field::make('text', 'crb_slider_link_text', 'Текст ссылки'),
            Field::make('complex', 'slider_slides', 'Слайды')
                ->add_fields('slides_for_slider', 'Слайд', array(
                    Field::make('image', 'slide_img', 'Изображение')
                        ->set_width(25),
                )),
        ))
		
		
   

        ->add_tab(__('Об услуге'), array(
            Field::make('text', 'crb_about_head', 'Заголовок')
                ->set_width(25),
            Field::make('complex', 'crb_about_text_fragments', 'Абзацы')
                ->add_fields('complex', 'Текстовый блоки', array(
                    Field::make('image', 'crb_about_text_image', 'Иконка')
                        ->set_width(25),
                    Field::make('rich_text', 'crb_about_text_p', 'Параграф')
                        ->set_width(25),
                )),
            Field::make('rich_text', 'crb_about_description', 'Краткое описание блока')
                ->set_width(25),

        ))

        ->add_tab(__('Этапы'), array(
            Field::make('rich_text', 'crb_steps_head', 'Заголовок')
                ->set_width(50),
            Field::make('rich_text', 'crb_steps_desc', 'Подзаголовок')
                ->set_width(50),

            Field::make('complex', 'crb_steps', 'Контент этапа')
                ->add_fields(array(
                    Field::make('image', 'crb_step_image', 'Иконка этапа')
                        ->set_width(15),
                    Field::make('color', 'crb_step_image_bg', 'Фон иконки')
                        ->set_width(15),
                    Field::make('text', 'crb_step_head', 'Заголовок этапа')
                        ->set_width(20),
                    Field::make('rich_text', 'crb_step_text', 'Текст этапа')
                        ->set_width(50),
                )),
        ))

        ->add_tab(__('Форма обратной связи'), array(
            Field::make('text', 'crb_form_h2', 'Заголовок формы')
                ->set_width(50),
            Field::make('rich_text', 'crb_form_description', 'Описание')
                ->set_width(50),
            Field::make('association', 'crb_association_forms', 'Формы')
                ->set_types(array(
                    array(
                        'type' => 'post',
                        'post_type' => 'wpcf7_contact_form', // для Contact Form 7
                    ),
                )),
        ))

        ->add_tab(__('Вопросы/ответы'), array(
            Field::make('text', 'crb_faq_head', 'FAQ heading'),
            Field::make('complex', 'crb_faq_items', 'Items')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'crb_question', 'Question')
                        ->set_width(30),
                    Field::make('rich_text', 'crb_answer', 'Answer')
                        ->set_width(100),
                )),
        ));



    Container::make('post_meta', 'Контент главной страницы')
        ->show_on_page('main')
        ->add_tab(__('Слайдер первого экрана'), array(
            Field::make('text', 'crb_hero_heading', 'Заголовок'),
            Field::make('rich_text', 'crb_hero_description', 'Подзаголовок'),
            Field::make('text', 'crb_hero_link', 'Ссылка'),
            Field::make('text', 'crb_hero_link_text', 'Текст ссылки'),
            Field::make('complex', 'hero_slider_slides', 'Слайды')
                ->add_fields('hero_slides_for_slider', 'Слайд', array(
                    Field::make('image', 'hero_slide_img', 'Изображение')
                        ->set_width(25),
                )),
        ))
		
		->add_tab(__('Стек'), array(

    Field::make('complex', 'stack_items', 'Иконки стека')
        ->set_layout('tabbed-vertical')
        ->add_fields(array(

            Field::make('image', 'stack_image', 'Иконка')
                ->set_value_type('id')
                ->set_width(25),

            Field::make('text', 'stack_alt', 'Alt изображения')
                ->set_required(true)
                ->set_width(35)
                ->set_help_text('Описание изображения для SEO и доступности'),

            Field::make('text', 'stack_title', 'Название технологии')
                ->set_width(40)
                ->set_help_text('Например: WordPress, PHP, JavaScript'),

        )),

))

        ->add_tab(__('Преимущества Вордпресс'), array(
            Field::make('rich_text', 'crb_adv_head', 'Заголовок')
                ->set_width(40),
            Field::make('rich_text', 'crb_adv_desc', 'Подзаголовок')
                ->set_width(60),
            Field::make('rich_text', 'crb_adv_button', 'Кнопка перехода')
                ->set_width(50),
            Field::make('rich_text', 'crb_adv_button_link', 'Ссылка кнопки перехода')
                ->set_width(50),

            Field::make('complex', 'crb_advantages', 'Преимущества')
                ->add_fields(array(
                    Field::make('image', 'crb_adv_image', 'Изображение')
                        ->set_width(50),
                    // Field::make('color', 'crb_step_image_bg', 'Фон иконки')
                    //     ->set_width(50),
                    Field::make('text', 'crb_adv_item_head', 'Заголовок Преимущества')
                        ->set_width(50),
                    Field::make('rich_text', 'crb_adv_item_text', 'Текст Преимущества')
                        ->set_width(50),
                    Field::make('text', 'crb_adv_item_link', 'Ссылка слайда')
                        ->set_width(50),
                )),
        ));

    Container::make('post_meta', 'Слайдер для портфолио')
        ->show_on_post_type('portfolio')
        //->where( 'post_type', '=', 'portfolio' )
        ->add_fields(array(
            Field::make('image', 'crb_portfolio_header_pic', 'картинка для шапки')
                ->help_text('нужна картинка шириной 1600пикс на 350пикс'),

            Field::make('complex', 'crb_portfolio_siteparts', 'Сайт в портфолио')
                ->add_fields('parts_of_site', 'Блоки сайта', array(
                    Field::make('image', 'crb_sitepart_img', 'Изображение блока')
                ))
        ));

    Container::make('post_meta', 'Стоимость услуг')
        ->show_on_page('price')
        //->where( 'post_type', '=', 'portfolio' )
        ->add_fields(array(
            Field::make('complex', 'crb_price_chapters', 'Раздел')
                ->add_fields('chapters_titles', 'Добавить раздел', array(
                    Field::make('text', 'crb_price_chapter', 'Название')
                        ->set_width(50),
                    Field::make('rich_text', 'crb_price_chapter_desc', 'Краткое описание')
                        ->set_width(50),

                    Field::make('complex', 'crb_price_services', 'Услуги раздела')
                        ->add_fields('chapters_services', 'Добавить услугу', array(
                            Field::make('text', 'crb_service_head', 'Название услуги')
                                ->set_width(33),
                            Field::make('rich_text', 'crb_service_desc', 'Описание услуги')
                                ->set_width(33),
                            Field::make('text', 'crb_service_price', 'Цена услуги')
                                ->set_width(33),
                        )),
                ))
        ));

    Container::make('post_meta', 'Контент страницы услуг')
        ->show_on_page('services')
        ->add_fields(array(
            Field::make('complex', 'crb_services', 'Услуги')
                ->add_fields('crb_services', 'Добавить услугу', array(
                    Field::make('text', 'crb_service_name', 'Название услуги')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_service_desc', 'Описание услуги')
                        ->set_width(33),
                    Field::make('text', 'crb_service_price', 'Цена услуги')
                        ->set_width(33),
                    Field::make('image', 'crb_service_img', 'Картинка услуги')
                        ->set_width(33),
                    Field::make('text', 'crb_service_link', 'Ссылка')
                        ->set_width(33),
                )),
            Field::make('text', 'crb_service_shortcode', 'Шорткод для сервисов')
                ->set_width(100),
        ));

    Container::make('term_meta', 'Tags Properties')
        ->show_on_taxonomy('post_tag')
        ->add_fields(array(
            Field::make('color', 'crb_title_color', 'Цвет обводки')
                ->help_text('Выбрать цвет фона для этой метки'),
        ));

    Container::make('term_meta', 'Category')
        ->show_on_taxonomy('category')
        ->add_fields(array(
            Field::make('image', 'crb_cat_image', 'Изображение категории')
                ->help_text('Выбрать изображение для отоюражения в архивах этой категории'),
        ));
}
