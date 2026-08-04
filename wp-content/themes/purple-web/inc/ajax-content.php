<?php
add_action('wp_ajax_load_seo_blocks', 'load_seo_blocks');
add_action('wp_ajax_nopriv_load_seo_blocks', 'load_seo_blocks');

function load_seo_blocks()
{


    $page_id = intval($_POST['page_id']);


    if (!$page_id) {
        wp_die();
    }


    global $post;

    $post = get_post($page_id);

    setup_postdata($post);


    ob_start();


    get_template_part('template-parts/template-blocks/02about-service');
    get_template_part('template-parts/template-blocks/03steps-service');
    get_template_part('template-parts/template-blocks/04page-form');
    get_template_part('template-parts/template-blocks/05page-faq');
    get_template_part('template-parts/portfolio-list');


    echo ob_get_clean();


    wp_reset_postdata();


    wp_die();
}
