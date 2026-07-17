<?php

$associated_posts = carbon_get_theme_option('crb_association_works');

// Преобразуем в массив ID, если это массив объектов
$associated_raw = carbon_get_theme_option('crb_association_works');

if (!empty($associated_raw)) {
    // Получаем только ID и преобразуем в int
    $associated_posts = array_map(function ($item) {
        return (int) $item['id'];
    }, $associated_raw);

    $args = array(
        'post_type'      => 'portfolio',
        'post__in'       => $associated_posts,
        'orderby'        => 'post__in',
        'posts_per_page' => -1,
        'post_status'    => 'publish'
    );
} else {
    $args = array(
        'post_type'      => 'portfolio',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish'
    );
}

$query = new WP_Query($args);

// echo '<pre>';
// var_dump($associated_posts);
// echo '</pre>';

echo '<div class="fluid-container _portfolio-page">';
echo '<div class="posts-grid">';

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) {
                    purple_web_post_thumbnail();
                } else { ?>
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/svg/placeholder.svg'; ?>" alt="post image" />
                <?php } ?>
            </a>
            <div class="article-portfolio__content">
                <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
            </div>
        </article>
<?php
    endwhile;
    nums_pagination(); 
    wp_reset_postdata();
else :
    echo 'Портфолио не найдено.';
endif;

echo '</div>';

if ($blockButton_link = carbon_get_theme_option('crb_works_button_link')) {
    echo '<a class="btn portfolio-list__btn" href="' . esc_url($blockButton_link) . '">' . esc_html(carbon_get_theme_option('crb_works_button')) . '</a>';
}

echo '</div>';