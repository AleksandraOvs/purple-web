<?php
$hero_head = carbon_get_post_meta(get_the_ID(), 'services_hero_heading');
$hero_desc = carbon_get_post_meta(get_the_ID(), 'services_hero_description');
$hero_link = carbon_get_post_meta(get_the_ID(), 'services_hero_link');
$hero_link_text = carbon_get_post_meta(get_the_ID(), 'services_hero_link_text');
?>

<div class="service-page-hero">
    <div class="fixed-container">
        <div class="section-hero__inner">
            <div class="section-hero__inner__content">
                <div class="breadcrumbs__list">
                    <?php echo site_breadcrumbs(); ?>
                </div>
                <h1 class="title"><?php the_title() ?></h1>
                <?php
                if (!empty($hero_head)) {
                    echo '<h2 class="title hero-heading" data-scroll-animation="fade-up">' . $hero_head . '</h2>';
                }
                if (!empty($hero_desc)) {
                    echo '<div class="hero-description" data-scroll-animation="fade-down">' . $hero_desc . '</div>';
                }
                if (!empty($hero_link)) {
                ?>
                    <a class="btn cta" href="<?php echo $hero_link ?>">
                        <?php
                        if (!empty($hero_link_text)) {
                            echo $hero_link_text;
                        } else {
                            echo 'Перейти';
                        }
                        ?>

                    </a>
                <?php
                }
                ?>
            </div>
            <?php
            if ($hero_slides = carbon_get_post_meta(get_the_ID(), 'services_hero_slider_slides')) {
            ?>
                <div class="swiper hero-slider" data-scroll-animation="fade">
                    <div class="swiper-wrapper hero-slider__wrapper">
                        <?php
                        foreach ($hero_slides as $hero_slide) {
                            $hero_slide_img_url = wp_get_attachment_image_url($hero_slide['services_hero_slide_img'], 'full');
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
</div>