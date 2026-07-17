<?php
// Template name: Categories and posts
?>

<?php get_header(); ?>
<section class="section">
    <div class="fixed-container">
        <ul class="breadcrumbs__list">
            <?php echo site_breadcrumbs(); ?>
        </ul>
        <div class="entry-header">
        <h2 class="title element-tobottom"><?php the_title(); ?></h2>
        </div>

        <?php
    //$parent_id = 21;
    //echo '<h2>Услуги</h2>';

    # получаем дочерние рубрики
    $sub_cats = get_categories(array(
        //'child_of' => $parent_id,
        'hide_empty' => 0
    ));
    if ($sub_cats) {
        echo '<ul class="cat-list">';
        foreach ($sub_cats as $cat) {
                echo '<li class="cat-list__item">';
            // Данные в объекте $cat

            // $cat->term_id
            // $cat->name (Рубрика 1)
            // $cat->slug (rubrika-1)
            // $cat->term_group (0)
            // $cat->term_taxonomy_id (4)
            // $cat->taxonomy (category)
            // $cat->description ()
            // $cat->parent (0)
            // $cat->count (14)
            // $cat->object_id (2743)
            // $cat->cat_ID (4)
            // $cat->category_count (14)
            // $cat->category_description ()
            // $cat->cat_name (Рубрика 1)
            // $cat->category_nicename (rubrika-1)
            // $cat->category_parent (0)

            echo '<h3>' . $cat->name . '</h3>';

            # получаем записи из рубрики
            $myposts = get_posts(array(
                'numberposts' => -1,
                'category'    => $cat->cat_ID,
                'orderby'     => 'post_date',
                'order'       => 'DESC',
            ));
            # выводим записи
            global $post;
            echo '<div class="cats-links">';
            foreach ($myposts as $post) {
               
                setup_postdata($post);
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            }
            echo '</div>';
            echo '</li>';
        }

        echo '</ul>';
        wp_reset_postdata(); // сбрасываем глобальную переменную пост
    }
    ?>


    </div>

    

</section>
<?php get_footer(); ?>