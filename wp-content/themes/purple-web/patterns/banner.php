<?php

/**
 * Title: Баннер с текстом
 * Slug: purple-web/banner
 * Categories: banner, featured
 * Description: Баннер с текстом.
 */
?>
<!-- wp:heading {"level":2,"placeholder":"Введите заголовок баннера", "className":"title"} -->
<h2 class="wp-block-heading title">Заголовок блока</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"bg-banner"} -->
<div class="wp-block-columns bg-banner">
    <!-- wp:column {"className":"bg-banner-image__container"} -->
    <div class="wp-block-column bg-banner-image__container">
        <!-- wp:image {"className":"banner-image","lock":{"move":true,"remove":true}} -->
        <figure class="wp-block-image banner-image">
            <img src="/wp-content/themes/purple-web/images/svg/placeholder.svg" alt="">
        </figure>
        <!-- /wp:image -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"className":"banner-column"} -->
    <div class="wp-block-column banner-column">
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->