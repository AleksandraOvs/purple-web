<?php
$picture      = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_picture');
$head         = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_head');
$desc         = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_desc');
$text_content = carbon_get_post_meta(get_the_ID(), 'crb_service_parts_text_content');
?>

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

            <?php if ($head) : ?>
                <h2 class="title">
                    <?php echo $head ?>
                </h2>
            <?php endif; ?>

            <?php if ($desc) : ?>
                <div class="service-parts__desc">
                    <?php echo wp_kses_post($desc); ?>
                </div>
            <?php endif; ?>

            <?php if ($text_content) : ?>
                <div class="service-parts__text">
                    <?php echo wp_kses_post($text_content); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>


</section>