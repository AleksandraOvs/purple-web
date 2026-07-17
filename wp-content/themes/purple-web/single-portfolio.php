<?php

/**
 * Шаблон для показа отдельной записи типа book, файл single-book.php
 */
?>

<?php get_header(); ?>
<!-- Content -->

<main id="primary" class="site-main _single-portfolio">

  <div class="fixed-container">
    <div class="portfolio-header">
      <?php if ($header_pic = carbon_get_post_meta(get_the_ID(), 'crb_portfolio_header_pic')) {
        $header_pic_url = wp_get_attachment_image_url($header_pic, 'full');
        echo '<img src="' . $header_pic_url . '" />';
      }
      ?>
      <div class="section__post-content__header">
        <div class="section__post-content__header__inner">
          <div class="breadcrumbs__list">
            <?php echo site_breadcrumbs(); ?>
          </div>
          <h2 class="title element-tobottom"><?php the_title(); ?></h2>
        </div>

        <?php get_template_part('template-parts/tags') ?>
      </div>
    </div>

    <section class="section__post-content">

      <div class="portfolio__content">
        <?php
        if ($sites_imgs = carbon_get_post_meta(get_the_ID(), 'crb_portfolio_siteparts')) {
        ?>
          <div class="swiper portfolio-slider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper portfolio-slider-wrapper">
              <?php

              foreach ($sites_imgs as $site_img) {
                $img_url = wp_get_attachment_image_url($site_img['crb_sitepart_img'], 'full');
              ?>
                <div class="swiper-slide portfolio-slide">
                  <a data-fancybox="gallery" data-src="<?php echo $img_url; ?>" data-caption="Hello world">
                    <img class="site-parts__item__img" src="<?php echo $img_url; ?>" alt="Сайты Вордпресс Балашиха">
                  </a>
                </div>
              <?php
              }
              ?>

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination slider-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="portfolio-slider-prev">
              <svg width="33" height="63" viewBox="0 0 33 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.3692 61.5999C31.8271 61.1203 32.0834 60.4765 32.0834 59.8062C32.0834 59.1358 31.8271 58.4921 31.3692 58.0125L5.78969 31.1667L31.3692 4.32625C31.8271 3.8467 32.0834 3.20295 32.0834 2.53259C32.0834 1.86224 31.8271 1.21848 31.3692 0.73893C31.1467 0.505093 30.8806 0.319233 30.5867 0.192325C30.2928 0.0654181 29.977 4.17775e-05 29.658 4.17496e-05C29.3389 4.17217e-05 29.0232 0.065418 28.7292 0.192325C28.4353 0.319233 28.1693 0.505092 27.9467 0.738929L0.745181 29.2925C0.267428 29.7939 4.47476e-05 30.4665 4.46863e-05 31.1667C4.46251e-05 31.8669 0.267428 32.5395 0.745181 33.0409L27.9467 61.5945C28.1692 61.8283 28.4353 62.0142 28.7292 62.1411C29.0232 62.268 29.3389 62.3334 29.658 62.3334C29.977 62.3334 30.2927 62.268 30.5867 62.1411C30.8806 62.0142 31.1467 61.8283 31.3692 61.5945L31.3692 61.5999Z" fill="white" />
              </svg>

            </div>
            <div class="portfolio-slider-next">
              <svg width="33" height="63" viewBox="0 0 33 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.714174 0.733521C0.256324 1.21307 0 1.85683 0 2.52718C0 3.19753 0.256324 3.84129 0.714174 4.32084L26.2937 31.1667L0.714174 58.0071C0.256324 58.4867 0 59.1304 0 59.8008C0 60.4711 0.256324 61.1149 0.714174 61.5944C0.936721 61.8283 1.2028 62.0141 1.49671 62.141C1.79062 62.268 2.10641 62.3333 2.42542 62.3333C2.74444 62.3333 3.06022 62.268 3.35413 62.141C3.64805 62.0141 3.91413 61.8283 4.13667 61.5944L31.3382 33.0409C31.8159 32.5394 32.0833 31.8669 32.0833 31.1667C32.0833 30.4664 31.8159 29.7939 31.3382 29.2925L4.13667 0.738892C3.91413 0.505053 3.64805 0.319195 3.35413 0.192289C3.06022 0.0653827 2.74444 0 2.42542 0C2.10641 0 1.79062 0.0653827 1.49671 0.192289C1.2028 0.319195 0.936721 0.505053 0.714174 0.738892V0.733521Z" fill="white" />
              </svg>

            </div>

          </div>


        <?php } ?>

        <?php the_content() ?>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>