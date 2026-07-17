<section class="section-choose">
    <div class="pic-element"></div>
    <div class="fixed-container">
        
            <?php
            if ($block_head = carbon_get_theme_option('crb_about_head')) {
				echo '<div class="section-heading">';
                echo '<h2 class="title">' . $block_head . '</h2>';
				echo ' </div>';
            }
            ?>
            
       
		
		<div class="choose-description">
        <?php
        if ($choose_image = carbon_get_theme_option('crb_about_image')) {
            $img_url = wp_get_attachment_image_url($choose_image, 'full');
            echo '<img class="choose-img" src="'. $img_url.'" alt="Обо мне">';
        }

        if ($choose_desc = carbon_get_theme_option('crb_about_description')) {
            echo '<div class="choose-description__text">' .$choose_desc . '</div>';
        }
        ?>

    </div>
<?php
            if ($choose_items = carbon_get_theme_option('crb_about_text_fragments')) {
            ?>
        <ul class="choose-list">
            <?php
                foreach ($choose_items as $choose_item) {
                    $item_icon = wp_get_attachment_image_url($choose_item['crb_about_text_image'], 'full');
            ?>
                <li class="choose-list__item">
                    <div class="icon element-toopacity">
                        <img class="choose-list__item__icon" src="<?php echo  $item_icon ?>" alt="Выбирайте Вордпресс для своих проектов">
                    </div>

                    <?php
                    if ($item_text = $choose_item['crb_about_text_p']) {
                    ?>
                        <div class="choose-list__item__text">
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

    
    </div>
</section>