<?php
if ($feedback_form = carbon_get_theme_option('crb_contact_form_shortcode')) {
    echo '<a href="#form-popup" data-fancybox class="btn">Обсудить проект</a>';
}