<?php
$post_id = get_the_ID();

$block_head = carbon_get_post_meta($post_id, 'crb_form_h2');
$block_description = carbon_get_post_meta($post_id, 'crb_form_description');
$associated_forms = carbon_get_post_meta($post_id, 'crb_association_forms');

// Получаем ID выбранной формы Contact Form 7.
$form_id = !empty($associated_forms[0]['id'])
    ? (int) $associated_forms[0]['id']
    : 0;
?>
<?php if ($form_id) : ?>
    <section class="contact-form-service">
        <div class="fixed-container">
            <div class="contact-form-section__inner">

                <div class="section-heading">
                    <?php if ($block_head) : ?>
                        <h2 class="title" data-scroll-animation="fade-down">
                            <?php echo esc_html($block_head); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($block_description) : ?>
                        <div class="section-description" data-scroll-animation="fade-up">
                            <?php echo wp_kses_post($block_description); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="contact-form__inner">

                    <?php
                    echo do_shortcode(
                        '[contact-form-7 id="' . $form_id . '"]'
                    );
                    ?>


                    <?php // get_template_part('template-parts/messengers'); 
                    ?>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>