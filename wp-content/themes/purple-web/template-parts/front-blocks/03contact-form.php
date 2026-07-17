<section class="contact-form-section">
    <div class="fixed-container">
        <div class="contact-form__inner">
            <?php
            if ($shortcode = carbon_get_theme_option('crb_contact_shortcode')) {
                echo do_shortcode(" $shortcode ");
            }
            ?>
            <?php get_template_part('template-parts/messengers') ?>
        </div>
       
    </div>
</section>