<?php
if ($helps = carbon_get_theme_option('crb_helps')) {
?>
    <section class="section-helps">
        <div class="fixed-container">
            <div class="section-heading">
                <?php
                if ($helps_head = carbon_get_theme_option('crb_help_head')) {
                    echo '<h2 class="title">' . $helps_head . '</h2>';
                }
                ?>

                <?php
                if ($helps_desc = carbon_get_theme_option('crb_help_desc')) {
                    echo '<div class="section-description">' . $helps_desc . '</div>';
                }
                ?>
            </div>

            <div class="section-helps__inner">
                <ul class="helps-list">
                    <?php $i = 1; ?>
                    <?php
                    foreach ($helps as $help) {

                    ?>
                        <li class="help-list__item" data-scroll-animation="fade">

                            <?php
                            if ($help_icon = $help['crb_help_item_image']) {
                                $help_icon_url = wp_get_attachment_image_url($help_icon, 'full');
                            ?>
                                <div class="help-img" <?php if ($bg_color = $help['crb_help_item_image_bg']) : echo 'style="background-color:' . $bg_color . '"';
                                                        endif; ?>><img src="<?php echo $step_icon_url ?>" alt=""></div>
                            <?php
                            } else {
                                echo '<div class="num">0' . $i . '</div>';
                            }
                            ?>

                            <div class="help-head">
                                <?php echo '<h3>' . $help['crb_help_item_head'] . '</h3>' ?>
                            </div>

                            <div class="help_description">
                                <?php echo $help['crb_help_item_text'] ?>
                            </div>
                            <?php
                            $i++; ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>
<?php
}
?>