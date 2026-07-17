<?php
$hero_head = carbon_get_post_meta(get_the_ID(), 'crb_hero_heading');
$hero_desc = carbon_get_post_meta(get_the_ID(), 'crb_hero_description');
$hero_link = carbon_get_post_meta(get_the_ID(), 'crb_hero_link');
$hero_link_text = carbon_get_post_meta(get_the_ID(), 'crb_hero_link_text');
?>

<section class="section-hero">
    <div class="fixed-container">
        <div class="section-hero__inner">
            <div class="section-hero__inner__content">
                <?php
                if (!empty($hero_head )) {
                    echo '<h1 class="title hero-heading element-toright">' . $hero_head . '</h1>';
                }
                if (!empty($hero_desc)) {
                     echo '<div class="hero-description element-toleft">' . $hero_desc . '</div>';
                 }
                if (!empty($hero_link)) {
                    ?>
                    <a class="btn cta" href="<?php echo $hero_link ?>">
                        <?php
                            if (!empty($hero_link_text)) {
                                echo $hero_link_text;
                            }else {
                                echo 'Перейти';
                            }
                        ?>

                    </a>
                    <?php
                }
                ?>
            </div>
            <?php
            if ($hero_slides = carbon_get_post_meta(get_the_ID(), 'hero_slider_slides')) {
            ?>
                <div class="swiper hero-slider element-toopacity">
                    <div class="swiper-wrapper hero-slider__wrapper">
                        <?php
                        foreach ($hero_slides as $hero_slide) {
                            $hero_slide_img_url = wp_get_attachment_image_url($hero_slide['hero_slide_img'], 'full');
                        ?>
                            <div class="swiper-slide hero-slider__slide">
                                <img src="<?php echo  $hero_slide_img_url ?>" alt="">
                            </div>
                        <?php
                        }
                        ?>
                        <div class="slider-hero-pagination"></div>
                    </div>



                    <!-- If we need pagination -->


                    <!-- If we need navigation buttons -->
                    <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
                    
                </div>

            <?php
            }
            ?>
        </div>

    </div>
</section>

<section class="section-stack">

    <div class="fluid-container">

        <?php
        $stack_items = carbon_get_post_meta(get_the_ID(), 'stack_items');

        if (!empty($stack_items)):
        ?>

            <div class="stack-slider swiper">

                <div class="swiper-wrapper">

                    <?php foreach ($stack_items as $item): ?>

                        <div class="swiper-slide stack-slider__item">

                            <?php
                            if (!empty($item['stack_image'])):

                                echo wp_get_attachment_image(
                                    $item['stack_image'],
                                    'full',
                                    false,
                                    array(
                                        'class' => 'stack-slider__image',
                                        'alt'   => esc_attr($item['stack_alt']),
                                        'loading' => 'lazy'
                                    )
                                );

                            endif;
                            ?>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        <?php endif; ?>

    </div>

</section>