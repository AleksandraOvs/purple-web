<?php
/*
*Template name: Services
*/
?>

<?php get_header() ?>
<main id="primary">

    <section class="section__post-content">
        <?php //get_template_part('template-parts/page-header')
        ?>
        <?php get_template_part('template-parts/service-page-hero') ?>

        <div class="services" id="services">
            <div class="fixed-container">

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

                                    <?php if (!empty($service['crb_service_text'])) : ?>
                                        <div class="service-desc">
                                            <?php echo apply_filters('the_content', $service['crb_service_text']); ?>
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

                                        <a class="btn" href="<?php echo $service['crb_service_link'] ?>">
                                            <span>
                                                <?php
                                                if (!empty($service['crb_service_link_text'])) {
                                                    echo $service['crb_service_link_text'];
                                                } else {
                                                    echo 'Подробнее';
                                                }
                                                ?>
                                            </span>

                                            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.137169 0.805494L5.00904 5.80393L0.137169 10.8024C0.0502195 10.8916 0.00156257 11.0113 0.00156257 11.136C0.00156258 11.2606 0.0502196 11.3803 0.137169 11.4696C0.179401 11.513 0.229924 11.5476 0.285748 11.5712C0.341573 11.5948 0.401563 11.6069 0.46217 11.6069C0.522776 11.6069 0.582766 11.5948 0.63859 11.5712C0.694414 11.5476 0.744937 11.513 0.787169 11.4696L5.96998 6.15237C6.06066 6.05905 6.11139 5.93405 6.11139 5.80393C6.11139 5.67381 6.06066 5.54882 5.96998 5.45549L0.787169 0.138308C0.744913 0.0945978 0.694294 0.059838 0.638325 0.0360985C0.582356 0.0123589 0.522183 0.000124909 0.461388 0.000124911C0.400592 0.000124914 0.340419 0.0123589 0.28445 0.0360985C0.228481 0.059838 0.177862 0.0945978 0.135606 0.138308C0.0486565 0.227583 -4.92175e-07 0.34728 -4.86728e-07 0.471901C-4.8128e-07 0.596522 0.0486565 0.716218 0.135606 0.805494L0.137169 0.805494Z" fill="white" />
                                            </svg>




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
        </div>
    </section>

    <?php get_template_part('template-parts/steps-section') ?>




</main>
<?php get_footer() ?>