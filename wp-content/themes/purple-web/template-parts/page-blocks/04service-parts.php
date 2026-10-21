<?php
$picture      = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_picture');
$head         = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_head');
$desc         = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_desc');
$list_items = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_list');
?>
<?php if ($list_items) : ?>
    <section class="service-parts">
        <div class="service-parts__inner">
            <?php if ($picture) : ?>

                <img
                    src="<?php echo esc_url(wp_get_attachment_image_url($picture, 'full')); ?>"
                    alt="<?php echo esc_attr($head); ?>">

            <?php endif; ?>
        </div>

        <div class="fixed-container">
            <div class="service-parts__content">

                <div class="section-heading">
                    <?php if ($head) : ?>
                        <h2 class="title" data-scroll-animation="fade-down">
                            <?php echo $head ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($desc) : ?>
                        <div class="section-description" data-scroll-animation="fade-up">
                            <?php echo wp_kses_post($desc); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($list_items) : ?>
                    <ul class="services-parts__list">
                        <?php foreach ($list_items as $item) : ?>
                            <?php
                            $image_id = $item['crb_service_parts_list_item_image'] ?? '';
                            $bg       = $item['crb_service_parts_list_bg'] ?? '';
                            $head     = $item['crb_service_parts_list_head'] ?? '';
                            $text     = $item['crb_service_parts_list_text'] ?? '';

                            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
                            ?>

                            <li
                                class="services-parts__list__item" data-scroll-animation="fade-up">

                                <?php if ($image_url) : ?>
                                    <div class="services-parts__list__item__image">
                                        <img
                                            src="<?= esc_url($image_url); ?>"
                                            alt="<?= esc_attr($head); ?>"
                                            loading="lazy">
                                    </div>
                                <?php endif; ?>

                                <?php if ($head) : ?>
                                    <h3 class="services-parts__list__item__head">
                                        <?= esc_html($head); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($text) : ?>
                                    <div class="services-parts__list__item__text">
                                        <?= wp_kses_post($text); ?>
                                    </div>
                                <?php endif; ?>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <!-- <div class="service-parts__text">
                    <?php //echo wp_kses_post($text_content); 
                    ?>
                </div> -->
            </div>
        </div>

    </section>
<?php endif; ?>