<?php
/*
 * Template name: Service page
 */
get_header() ?>
<main class="page-template__main">

    <?php get_template_part('template-parts/page-blocks/01hero-temp') ?>

    <?php get_template_part('template-parts/page-blocks/02about-service')
    ?>
    <?php get_template_part('template-parts/page-blocks/03steps-service')
    ?>
    <?php get_template_part('template-parts/page-blocks/04service-parts')
    ?>

    <?php if (trim(get_the_content())) : ?>
        <section class="page-content">
            <?php the_content(); ?>
        </section>
    <?php endif; ?>

    <?php

    $page_id = get_the_ID();

    $workPosts = carbon_get_post_meta($page_id, 'crb_association_works');
    $workPosts_ids = wp_list_pluck($workPosts, 'id');
    $workPosts_args = [
        'post_type' => 'portfolio',
        'post__in' => $workPosts_ids
    ];

    $workPosts_query = new WP_QUERY($workPosts_args);

    $workPosts_count = wp_count_posts('portfolio');
    $workPosts_count_publish = $workPosts_count->publish;


    if ($workPosts_query->have_posts()) {
    ?>

        <section class="section-works">

            <div class="fixed-container">

                <div class="section-heading light-content">
                    <?php if ($block_head = carbon_get_post_meta($page_id, 'crb_works_head')) {
                        echo '<h2 class="title color-white">' . $block_head . '</h2>';
                    }
                    ?>
                    <?php if ($block_desc = carbon_get_post_meta($page_id, 'crb_works_desc')) {
                        echo '<div class="section-description">' . $block_desc . '</div>';
                    }
                    ?>
                </div>

                <!-- <div class="swiper worksPosts-slider">
                    <ul class="swiper-wrapper worksPosts-wrapper"> -->
                <div class="swiper worksPosts-slider">
                    <div class="swiper-wrapper">
                        <?php
                        $i = 0;
                        while ($workPosts_query->have_posts()) : $workPosts_query->the_post();
                            $i++;
                        ?>
                            <article class="swiper-slide worksPosts-slider__slide" data-scroll-animation="<?php echo ($i % 2 !== 0) ? 'fade-up' : 'fade-down'; ?>">
                                <a href="<?php the_permalink() ?>" class="post-thumbnail">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else {
                                        echo '<img src="' . get_bloginfo('stylesheet_directory')
                                            . '/images/svg/placeholder.svg" />';
                                    }
                                    ?>
                                </a>

                                <div class="article-portfolio__content">
                                    <h3 class="portfolio-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                    <?php //get_template_part('template-parts/tags') 
                                    ?>
                                </div>
                            </article>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
                <!-- </ul>
                </div> -->

                <?php
                if ($blockButton_link = carbon_get_post_meta($page_id, 'crb_works_button_link')) {
                ?>
                    <a class="btn" href="<?php echo $blockButton_link ?>"><?php echo carbon_get_theme_option('crb_works_button') ?></a>
                <?php
                }
                ?>
            </div>
        </section>

    <?php
    }

    wp_reset_postdata();
    ?>

    <?php get_template_part('template-parts/page-blocks/05page-faq')
    ?>

    <?php get_template_part('template-parts/page-blocks/06form-block')
    ?>

</main>
<?php get_footer() ?>