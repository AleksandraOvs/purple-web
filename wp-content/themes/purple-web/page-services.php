<?php
/*
*Template name: Services
*/
?>

<?php get_header() ?>
<main id="primary">
    <section class="section__post-content">
        <div class="fixed-container">

            <div class="breadcrumbs__list">
                <?php echo site_breadcrumbs(); ?>
            </div>
            <h1 class="title element-tobottom">Услуги</h1>

            <?php
            $services = carbon_get_post_meta(get_the_ID(), 'crb_services');

            if (!empty($services)) : ?>
                <div class="services-list">
                    <?php foreach ($services as $service) : ?>
                        <div class="service-item">

                            <div class="service-content">
                                <?php if (!empty($service['crb_service_name'])) : ?>
                                    <h2 class="title"><?php echo esc_html($service['crb_service_name']); ?></h2>
                                <?php endif; ?>

                                <?php if (!empty($service['crb_service_desc'])) : ?>
                                    <div class="service-desc">
                                        <?php echo apply_filters('the_content', $service['crb_service_desc']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="service-price">
                                <?php if (!empty($service['crb_service_price'])) : ?>
                                    <span><?php echo esc_html($service['crb_service_price']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($service['crb_service_link'])) : ?>

                                    <!-- <a class="btn" href="<?php //echo esc_url($service['crb_service_link']); 
                                                                ?>" target="_blank">Подробнее</a> -->

                                    <a class="btn" href="javascript:;" data-fancybox data-src="#service-popup">
                                        Подробнее
                                    </a>

                                <?php endif; ?>
                            </div>

                            <?php if (!empty($service['crb_service_img'])) : ?>

                                <img class="service-img" src="<?php echo wp_get_attachment_image_url($service['crb_service_img'], 'full'); ?>" alt="<?php echo esc_attr($service['crb_service_name']); ?>">

                            <?php endif; ?>
                        </div>

                        <!-- Скрытый попап -->
                        <div style="display: none;" id="service-popup" class="fancybox-popup">
                            <div class="popup-inner">
                                <?php
                                $shortcode = carbon_get_post_meta(get_the_ID(), 'crb_service_shortcode');

                                if (!empty($shortcode)) {
                                    echo do_shortcode($shortcode);
                                }
                                ?>
                                <?php get_template_part('template-parts/messengers') ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>


</main>
<?php get_footer() ?>