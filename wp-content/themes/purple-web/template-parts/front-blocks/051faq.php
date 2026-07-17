<section class="faq-section" id="faq-section">
    <div class="fixed-container">
        <?php
        if ($faq_head = carbon_get_theme_option('crb_faq_head')) {
        ?>
        <div class="section-heading">
             <h2 class="title fromTop"><?php echo $faq_head ?></h2>
        </div>
           
        <?php
        }
        ?>

        <div class="faq-section__inner">
            <?php if ($faq_items = carbon_get_theme_option('crb_faq_items')) {
            ?>
                <div class="faq-section__inner__questions">
                    <div id="faq">
                        <?php
                        $i = 0;
                        foreach ($faq_items as $faq_item) {
                            $i++;
                        ?>
                            <div class="faq-item fromOpacity">
                                <div class="faq-question-head" class="">
                                    <h4><span class="num-of-question"><?php echo '0' . $i; ?></span><?php echo $faq_item['crb_question'] ?></h4>
                                    <div class="arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                            <g clip-path="url(#clip0_54_48)">
                                                <path d="M9 5.5V7.5H15.59L4 19.09L5.41 20.5L17 8.91V15.5H19V5.5H9Z" fill="#3E3E3E" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_54_48">
                                                    <rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                                <div class="faq-answer">
                                    <p><?php echo $faq_item['crb_answer'] ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>

            <?php
            $form_head = carbon_get_theme_option('crb_faq-block_heading');
            $form_desc = carbon_get_theme_option('crb_faq-block_description');
            $form_shortcode = carbon_get_theme_option('crb_faq-block_shortcode');

            if (!empty($form_shortcode)) {
            ?>
                <div class="faq-section__inner__questions__form">
                    <?php
                    if (!empty($form_head)) {
                        echo '<h3>' . $form_head . '</h3>';
                    }
                    ?>

                    <?php
                    if (!empty($form_desc)) {
                        echo '<div class="form-description">' . $form_desc . '</div>';
                    }
                    ?>

                    <?php echo do_shortcode(" $form_shortcode "); ?>
                </div>
            <?php
            }
            ?>
        </div>


    </div>
</section>