<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package purple
 */

?>

<footer id="colophon" class="site-footer">
	<div class="fixed-container">
		<div class="site-info">
			<a href="<?php echo site_url() ?>" class="footer__logo">
				<?php
				$footer_logo = get_theme_mod('footer_logo');
				$img = wp_get_attachment_image_src($footer_logo, 'full');
				if ($img) : echo '<img src="' . $img[0] . '" alt="Purple Web">';
				endif;
				?>
			</a>

			<div class="footer-links">
				<?php get_template_part('template-parts/messengers') ?>
				<div id="footer-navigation" class="footer-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'container'       => null,
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu',
							//'menu_id'        => 'primary-menu',
						)
					);
					?>
				</div><!-- #footer-navigation -->
			</div>

			<!-- <div class="copyright">
				<span>&copy;</span> <span><?php //bloginfo('name'); 
											?></span><span> <?php //echo ' | ' . date('Y') . 'г.'; 
															?></span>
			</div> -->
		</div><!-- .site-info -->





		<?php
		if (is_active_sidebar('footer-sidebar')) {

			dynamic_sidebar('footer-sidebar');
		}
		?>

	</div>
	<a href="https://tlgg.ru/aleksandra_ovs" id="tg_button">
		<div class="circlephone" style="transform-origin: center;"></div>
		<div class="circle-fill" style="transform-origin: center;"></div>
		<div class="img-circle" style="transform-origin: center;">
			<div class="img-circleblock" style="transform-origin: center;"></div>
		</div>
	</a>
	
	<div class="arrow-up">
		<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M7.24994 15.0001V2.81066L1.53022 8.53039C1.23732 8.82328 0.762563 8.82328 0.46967 8.53039C0.176777 8.2375 0.176777 7.76274 0.46967 7.46984L7.46967 0.469844L7.52631 0.418086C7.82089 0.177777 8.25561 0.19524 8.53022 0.469844L15.5302 7.46984L15.582 7.52648C15.8223 7.82107 15.8048 8.25579 15.5302 8.53039C15.2556 8.80499 14.8209 8.82246 14.5263 8.58215L14.4697 8.53039L8.74994 2.81066V15.0001C8.74994 15.4143 8.41416 15.7501 7.99994 15.7501C7.58573 15.7501 7.24994 15.4143 7.24994 15.0001Z" fill="#ded9e2" />
		</svg>

	</div>
</footer><!-- #colophon -->

<?php
if (current_user_can('administrator')) {
	echo '<div style="position: fixed;bottom: 10px;right: 10px;background: rgba(255, 255, 255, .2);color: #cacaca;padding: 5px;font-size: 12px;z-index: 1000;"class="show-temp">' . get_current_template() . '</div>';
}

?>
</div><!-- #page -->

<div style="display: none; width: 500px;" id="form-popup">
	<?php
	if ($feedback = carbon_get_theme_option('crb_contact_form_shortcode')) {
		if ($form_head = carbon_get_theme_option('crb_contact_form_head')) {
			echo '<h3>' . $form_head . '</h3>';
		}

		if ($form_desc = carbon_get_theme_option('crb_contact_form_desc')) {
			echo '<div class="form-description">' . $form_desc . '</div>';
		}

		echo do_shortcode(" $feedback ");
	}
	?>
</div>

<?php wp_footer(); ?>

</body>

</html>