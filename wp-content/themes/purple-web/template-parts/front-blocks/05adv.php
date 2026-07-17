<?php
if ($wp_slides = carbon_get_theme_option('crb_wp_slides')) {
?>
    <section class="adv-section">
        <div class="fixed-container">

            <ul class="adv-list">
                <li class="adv-list__item adv-section__head">
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
                </li>
                <?
                foreach ($wp_slides as $wp_slide) {
                    $slide_img = wp_get_attachment_image_url($wp_slide['crb_slide_image'], 'full');
                    $slide_bg = $wp_slide['crb_slide_bg'];
                ?>
                    <li class="adv-list__item">
                        <?php
                        if ($slide_head = $wp_slide['crb_slide_head']) {
                            echo '<h3 class="adv-heading">' . $slide_head . '</h3>';
                        }
                        ?>

                        <?php
                        if ($slide_text = $wp_slide['crb_slide_text']) {
                            echo '<div class="adv-item__text">' . $slide_text . '</div>';
                        }
                        ?>

                        <?php
                        if ($slide_img) {
                            echo '<img class="adv-item__img" src="' . $slide_img . '" />';
                        }
                        ?>

                    </li>
                <?php
                }
                ?>

        </div>

        </div>
    </section>
<?php
}

?>