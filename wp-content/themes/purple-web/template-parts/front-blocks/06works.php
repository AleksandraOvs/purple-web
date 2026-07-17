 <?php

    $page_id = get_the_ID();

    $workPosts = carbon_get_theme_option('crb_association_works');
    $workPosts_ids = wp_list_pluck($workPosts, 'id');
    $workPosts_args = [
      'post_type' => 'portfolio',
      'post__in' => $workPosts_ids
    ];

    $workPosts_query = new WP_QUERY($workPosts_args);

    $workPosts_count = wp_count_posts('portfolio');
    $workPosts_count_publish = $workPosts_count->publish;


    if ($workPosts_query->have_posts()) {
    ?>

<section class="section-examples">

  <div class="fixed-container">
    <div class="section-heading">
      <?php if ($block_head = carbon_get_theme_option('crb_works_head')) {
        echo '<h2 class="title color-white">' . $block_head . '</h2>';
      }
      ?>
      <?php if ($block_desc = carbon_get_theme_option('crb_works_desc')) {
        echo '<div class="section-description">' . $block_desc . '</div>';
      }
      ?>
    </div>
      <div class="swiper worksPosts-slider">
        <ul class="swiper-wrapper worksPosts-wrapper">
          <?php
          $i = 0;
          while ($workPosts_query->have_posts()) : $workPosts_query->the_post();
            $i++;
          ?>
            <li class="portfolio__query__item swiper-slide worksPosts-slide <?php echo ($i % 2 !== 0) ? 'element-totop' : 'element-tobottom'; ?>">
              <a href="<?php the_permalink() ?>" class="posts__query__item__inner">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail();
                } else {
                  echo '<img src="' . get_bloginfo('stylesheet_directory')
                    . '/images/svg/placeholder.svg" />';
                }
                ?>
              </a>

              <div class="portfolio-item__info">
                <h3 class="portfolio-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <a class="btn-arrow" href="<?php the_permalink() ?>">
                  <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 7L16.5 7M16.5 7L10.875 1M16.5 7L10.875 13" stroke="#292929" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>

              </div>
            </li>
          <?php
          endwhile;
          ?>
        </ul>
      </div>

    <?php
    if ($blockButton_link = carbon_get_theme_option('crb_works_button_link')) {
    ?>
      <a class="btn" href="<?php echo $blockButton_link ?>"><?php echo carbon_get_theme_option('crb_works_button') ?></a>
    <?php
    }
    ?>

    <?php
    //   // if ($works_association = carbon_get_post_meta(get_the_ID(), 'crb_association_works')){

    //   // }

    //   $ass_works = carbon_get_the_post_meta('crb_association_works');
    //   //var_dump($association);

    //   foreach ($ass_works as $key =>  $ass_work) {
    //    // if ($ass_work['type'] == 'portfolio') {

    //       print_r ( $post = get_post($ass_work['id']) );
    //       //$post_id = get_post($ass_work['id']);

    //  //   }
    //   }
    ?>
  </div>
</section>

 <?php
   }else {
    get_template_part('template-parts/portfolio-list');
   }
   
    wp_reset_postdata();
    ?>