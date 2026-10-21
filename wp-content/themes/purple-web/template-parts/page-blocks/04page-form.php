<section class="contact-form-section">
    <div class="fixed-container">
        <div class="contact-form__inner">
            <?php 
                $form_head = carbon_get_post_meta(get_the_ID(), 'crb_form_h2');
                $form_desc = carbon_get_post_meta(get_the_ID(), 'crb_form_description');

                if (!empty($form_head)){
                    echo '<h2 class="title">'.$form_head.'</h2>';
                }

                 if (!empty($form_desc)){
                    echo '<div class="description">'.$form_desc.'</div>';
                }
            ?>

            <?php
            $forms = carbon_get_post_meta(get_the_ID(), 'crb_association_forms');

            if (!empty($forms)) {
                foreach ($forms as $form_post) {
                    // Получаем ID формы
                    $form_id = $form_post['id'];

                    // Выводим форму через шорткод Contact Form 7
                    echo do_shortcode('[contact-form-7 id="' . esc_attr($form_id) . '"]');
                }
            }
            ?>
            <?php get_template_part('template-parts/messengers') ?>
        </div>

    </div>
</section>