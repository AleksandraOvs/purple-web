<?php
if ($wp_slides = carbon_get_theme_option('crb_wp_slides')) {
?>
    <section class="slider-section">
        <div class="fixed-container">

            <div class="section-heading">
                <?php
                if ($head = carbon_get_theme_option('crb_slider_head')) {
                    echo $head;
                }
                ?>
                <?php
                if ($desc = carbon_get_theme_option('crb_slider_desc')) {
                    echo $desc;
                }
                ?>
            </div>

            <div class="swiper wp-slider">
                <div class="swiper-wrapper">
                    <?
                    foreach ($wp_slides as $wp_slide) {
                        $slide_img = wp_get_attachment_image_url($wp_slide['crb_slide_image'], 'full');
                        $slide_bg = $wp_slide['crb_slide_bg'];
                    ?>
                        <div class="swiper-slide wp-slider__slide" <?php if ($slide_bg) : echo  'background=' . $slide_bg;
                                                                    endif; ?>
                            <?php if ($slide_bg) : echo  'style=background:' . $slide_bg . ';';
                            endif; ?>>
                            <?php
                            if ($slide_head = $wp_slide['crb_slide_head']) {
                                echo '<h3 class="slider-heading">' . $slide_head . '</h3>';
                            }
                            ?>

                            <?php
                            if ($slide_text = $wp_slide['crb_slide_text']) {
                                echo '<div class="wp-slider__slide__text">' . $slide_text . '</div>';
                            }
                            ?>

                            <?php
                            if ($slide_img) {
                                echo '<img class="slide-img" src="' . $slide_img . '" />';
                            }
                            ?>


                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="slider-pagination"></div>
            </div>

        </div>
    </section>
<?php
}

?>