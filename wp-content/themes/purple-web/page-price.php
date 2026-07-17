<?php
/*
*Template name: Price page   
*/
?>

<?php get_header() ?>
<main id="primary" class="site-main">
    <section class="section__post-content">
        <div class="fixed-container">
            
                <div class="breadcrumbs__list">
                    <?php echo site_breadcrumbs(); ?>
                </div>
                <h1 class="title element-tobottom"><?php the_title() ?></h1>
           

            <?php
            if ($chapters = carbon_get_post_meta(get_the_ID(), 'crb_price_chapters')) {
            ?>
                <ul class="price-table">
                    <?php foreach ($chapters as $chapter) {
                    ?>
                        <li class="price-table__chapter">
                            <div class="price-table__chapter__head">
                                <?php echo '<h3>' . $chapter['crb_price_chapter'] . '</h3>' ?>
                                <?php if ($ch_desc = $chapter['crb_price_chapter_desc']) {
                                    echo '<div class="price-table__chapter__head__desc">';
                                    echo $ch_desc;
                                    echo '</div>';
                                } ?>

                            </div>
                            <div class="chapter-services">
                                <?php

                                foreach ($chapter['crb_price_services'] as $chapters_service) {
                                ?>
                                    <div class="chapter-services__row">
                                        <div class="ch__col">
                                            <?php echo '<h4>— ' . $chapters_service['crb_service_head'] . '</h4>' ?>
                                            <div class="ch__col__desc"><?php echo $chapters_service['crb_service_desc'] ?></div>
                                        </div>

                                        <div class="ch__col _price">
                                            <?php echo $chapters_service['crb_service_price'] ?>
                                        </div>

                                    </div>
                                <?php
                                }

                                ?>
                            </div>

                        </li>
                    <?php
                    }
                    ?>
                </ul>
            <?php
            }
            ?>
            <?php the_content() ?>
        </div>
    </section>


</main>
<?php get_footer() ?>