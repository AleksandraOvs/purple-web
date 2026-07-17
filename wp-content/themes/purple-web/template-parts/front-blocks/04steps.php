<?php
if ($steps = carbon_get_theme_option('crb_steps')) {
?>
    <section class="section-steps">
        <div class="fixed-container">
            <div class="section-heading">
                <?php
                if ($steps_head = carbon_get_theme_option('crb_steps_head')) {
                    echo $steps_head;
                }
                ?>

                <?php
                if ($steps_desc = carbon_get_theme_option('crb_steps_desc')) {
                    echo '<div class="section-description">' . $steps_desc . '</div>';
                }
                ?>
            </div>

            <div class="section-steps__inner">
                <ul class="steps-list">
                    <?php $i = 1; ?>
                    <?php
                    foreach ($steps as $step) {

                    ?>
                        <li class="steps-list__item element-toopacity">

                            <?php
                            if ($step_icon = $step['crb_step_image']) {
                                $step_icon_url = wp_get_attachment_image_url($step_icon, 'full');
                            ?>
                                <div class="step-img" <?php if ($bg_color = $step['crb_step_image_bg']) : echo 'style="background-color:' . $bg_color . '"';
                                                        endif; ?>><img src="<?php echo $step_icon_url ?>" alt=""></div>
                            <?php
                            } else {
                                echo '<div class="num">0' . $i . '</div>';
                            }
                            ?>

                            <div class="step_head">
                                <?php echo '<h3>' . $step['crb_step_head'] . '</h3>' ?>
                            </div>

                            <div class="step_description">
                                <?php echo $step['crb_step_text'] ?>
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