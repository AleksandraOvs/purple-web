<section class="about-service">
    <div class="pic-element"></div>
    <div class="fixed-container">
        <div class="section-heading light-content">
            <?php
            if ($block_head = carbon_get_post_meta(get_the_ID(), 'crb_about_head')) {
                echo '<h2 class="title">' . $block_head . '</h2>';
            }
            ?>
            <?php
            if ($block_desc = carbon_get_post_meta(get_the_ID(), 'crb_about_desc')) {
                echo '<div class="section-description">' . $block_desc . '</div>';
            }
            ?>


        </div>
        <?php
        if ($list_items = carbon_get_post_meta(get_the_ID(), 'crb_about_list')) {
        ?>
            <ul class="about-list">
                <?php
                foreach ($list_items as $item) {
                    $item_icon = wp_get_attachment_image_url($item['crb_about_list_item_image'], 'full');
                ?>
                    <li class="about-list__item" data-scroll-animation="fade-up">
                        <div class="icon">
                            <?php
                            if (!empty($item_icon)) {
                            ?>
                                <img class="choose-list__item__icon" src="<?php echo  $item_icon ?>" alt="Процесс создания сайта на вордпресс">
                            <?php
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/images/svg/check.svg" alt="Процесс создания сайта на вордпресс">';
                            }
                            ?>

                        </div>

                        <?php
                        if ($item_head = $item['crb_about_list_item_h3']) {
                        ?>
                            <h3>
                                <?php echo $item_head ?>
                            </h3>
                        <?php
                        }
                        ?>
                        <?php
                        if ($item_text = $item['crb_about_list_item_p']) {
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
            echo '<div class="about-description" data-scroll-animation="fade-up">' . $choose_desc . '</div>';
        }
        ?>
    </div>
</section>