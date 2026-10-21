<?php
$steps_title = carbon_get_theme_option('crb_step_head');
$steps_desc  = carbon_get_theme_option('crb_step_desc');
$steps_list  = carbon_get_theme_option('crb_steps');

$delay = 0.2;
?>

<?php if ($steps_title || $steps_desc || $steps_list): ?>
    <section class="work-steps">
        <div class="fixed-container">

            <div class="section-heading">
                <?php if ($steps_title): ?>
                    <h2 class="title">
                        <?php echo $steps_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($steps_desc): ?>
                    <div class="work-steps__desc">
                        <?php echo $steps_desc; ?>
                    </div>
                <?php endif; ?>
            </div>


            <?php if ($steps_list): $i = 1; ?>
                <ul class="work-steps__list">

                    <?php foreach ($steps_list as $index => $step):  ?>

                        <?php


                        // Нечётные элементы: fade-left
                        // Чётные элементы: fade-right
                        // $animation = ($index % 2 === 0)
                        //     ? 'fade-left'
                        //     : 'fade-right';

                        $image_id = !empty($step['crb_step_item_image'])
                            ? (int) $step['crb_step_image']
                            : 0;

                        $image_url = $image_id
                            ? wp_get_attachment_image_url($image_id, 'full')
                            : '';

                        $image_alt = $image_id
                            ? get_post_meta($image_id, '_wp_attachment_image_alt', true)
                            : '';
                        ?>

                        <li class="work-steps__list__item" data-scroll-animation="fade"
                            style="--animation-delay: <?= esc_attr($delay); ?>s;">

                            <div class="work-steps__list__item__inner"> <?php echo '<div class="num">0' . $i . '</div>'; ?>
                                <?php if ($image_url): ?>
                                    <div
                                        class="work-steps__icon">
                                        <img
                                            src="<?= esc_url($image_url); ?>"
                                            alt="<?= esc_attr($image_alt); ?>"
                                            loading="lazy">
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($step['crb_step_item_head'])): ?>
                                    <h3 class="work-steps__title">
                                        <?= esc_html($step['crb_step_item_head']); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if (!empty($step['crb_step_item_text'])): ?>
                                    <div class="work-steps__text">
                                        <?= wp_kses_post($step['crb_step_item_text']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>

                        <?php $i++;

                        $delay += 0.2; ?>

                    <?php endforeach; ?>

                </ul>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>