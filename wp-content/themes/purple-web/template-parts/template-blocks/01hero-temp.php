<?php
$hero_head = carbon_get_post_meta(get_the_ID(), 'crb_h1');
$hero_desc = carbon_get_post_meta(get_the_ID(), 'crb_slider_desc');
$hero_link = carbon_get_post_meta(get_the_ID(), 'crb_slider_link_link');
$hero_link_text = carbon_get_post_meta(get_the_ID(), 'crb_slider_link_text');
?>

<section class="section-hero">
<div class="section-hero-element"></div>
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
                    <a class="btn-link cta" href="<?php echo $hero_link ?>">
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
            if ($hero_slides = carbon_get_post_meta(get_the_ID(), 'slider_slides')) {
            ?>
                <div class="swiper hero-slider element-toopacity">
                    <div class="swiper-wrapper hero-slider__wrapper">
                        <?php
                        foreach ($hero_slides as $hero_slide) {
                            $hero_slide_img_url = wp_get_attachment_image_url($hero_slide['slide_img'], 'full');
                        ?>
                            <div class="swiper-slide hero-slider__slide">
                                <img src="<?php echo  $hero_slide_img_url ?>" alt="">
                            </div>
                        <?php
                        }
                        ?>
                        <div class="slider-hero-pagination"></div>
                    </div>

                </div>

            <?php
            }
            ?>
        </div>

    </div>
</section>