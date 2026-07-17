<?php
/**
 * Класс виджета, который позволяет вывести все жанры книг
 * в виде многоуровневого списка
 */
class Projects_Types_Widget extends WP_Widget {

    /**
     * Cоздание виджета
     */
    function __construct() {
        parent::__construct(
            'project_types_widget',
            'Типы проектов', // заголовок виджета
            ['description' => 'Типы проектов'] // описание
        );
    }

    /**
     * Метод выводит жанры книг в общедоступной части сайта
     */
    public function widget($args, $instance) {

        // к заголовку применяем фильтр
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];

        // выводим заголовок виджета
        if ( ! empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // выводим жанры книг в иерархическом виде
        $this->tree(0);

        echo $args['after_widget'];
    }

    private function tree($parent) {
        $terms = get_terms([
            'taxonomy' => 'project-type',
            'hide_empty' => false,
            'parent' => $parent
        ]);

        if (!empty($terms)) {
            ?>
            <ul<?= $parent ? '' : ' id="book-genres-widget"'; ?>>
                <?php foreach ($terms as $term): ?>
                    <?php $link = get_term_link($term->term_id, 'genre'); ?>
                    <li><a href="<?= $link; ?>"><?= $term->name; ?></a>
                        <?php $this->tree($term->term_id); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
        }
    }

    /*
     * Форма настроек виджета в панели управления
     */
    public function form($instance) {
        $title = '';
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
        ?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>">Заголовок</label>
            <input type="text" class="widefat"
                   id="<?= $this->get_field_id('title'); ?>"
                   name="<?= $this->get_field_name('title'); ?>'"
                   value="<?= esc_attr($title); ?>" />
        </p>
        <?php
    }

    /*
     * Сохранение настроек виджета в панели управления
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] =
            ! empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}