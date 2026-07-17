<section class="about-service">
    <div class="pic-element"></div>
    <div class="fixed-container">
        <div class="section-heading">
            <?php
            if ($block_head = carbon_get_post_meta(get_the_ID(), 'crb_about_head')) {
                echo '<h2 class="title">' . $block_head . '</h2>';
            }
            ?>
            <?php
            if ($choose_items = carbon_get_post_meta(get_the_ID(), 'crb_about_text_fragments')) {
            ?>
        </div>

        <ul class="about-list">
            <?php
                foreach ($choose_items as $choose_item) {
                    $item_icon = wp_get_attachment_image_url($choose_item['crb_about_text_image'], 'full');
            ?>
                <li class="about-list__item">
                    <div class="icon element-toopacity">
                        <?php
                        if (!empty($item_icon)) {
                        ?>
                            <img class="choose-list__item__icon" src="<?php echo  $item_icon ?>" alt="Процесс создания сайта на вордпресс">
                        <?php
                        }else {
                            echo '<img src="'.get_stylesheet_directory_uri().'/images/svg/check.svg" alt="Процесс создания сайта на вордпресс">';
                        }
                        ?>

                    </div>

                    <?php
                    if ($item_text = $choose_item['crb_about_text_p']) {
                    ?>
                        <div class="about-list__item__text">
                            <?php echo $item_text ?>
                        </div>
                    <?php
                    }
                    ?>
                </li>
            <?php
                }
            ?>
        </ul>
    <?php
            }
    ?>

    <?php
    if ($choose_desc = carbon_get_post_meta(get_the_ID(), 'crb_about_description')) {
        echo '<div class="about-description">' . $choose_desc . '</div>';
    }
    ?>
    </div>
</section>