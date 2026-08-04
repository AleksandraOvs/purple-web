<?php
/*
*Template name: Шаблон сео-страницы
*/
?>

<?php get_header() ?>
<main class="page-template__main">

    <?php get_template_part('template-parts/template-blocks/01hero-temp') ?>

    <?php //get_template_part('template-parts/template-blocks/02about-service') 
    ?>
    <?php //get_template_part('template-parts/template-blocks/03steps-service') 
    ?>
    <?php //get_template_part('template-parts/template-blocks/04page-form') 
    ?>
    <?php //get_template_part('template-parts/template-blocks/05page-faq') 
    ?>
    <?php //get_template_part('template-parts/portfolio-list')
    ?>

    <div id="seo-lazy-content" data-page-id="<?php echo get_the_ID(); ?>">
        <div class="seo-loader">
            Загрузка...
        </div>
    </div>

</main>
<?php get_footer() ?>