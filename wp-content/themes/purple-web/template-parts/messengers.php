<?php 
if ($contacts = carbon_get_theme_option('contacts')){
    ?>
    <ul class="contact-list">
        <?php
        foreach ($contacts as $contact){
            $contact_img = wp_get_attachment_image_url($contact['contact_image'], 'full');
            ?>
            <li class="contact-list__item">
                <a href="<?php echo $contact['contact_link'] ?>">
                    <img src="<?php echo $contact_img?>" alt="Связаться">
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>