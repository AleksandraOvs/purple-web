<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package purple
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e('Такой страницы пока нет', 'purple-web'); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<span class="eror404">404</span>
				<p><?php esc_html_e('Воспользуйтесь формой поиска', 'purple-web'); ?></p>

				<?php
				get_search_form();

				//the_widget('WP_Widget_Recent_Posts');
				?>

				<!-- <div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'purple-web'); ?></h2>
					<ul>
						<?php
						// wp_list_categories(
						// 	array(
						// 		'orderby'    => 'count',
						// 		'order'      => 'DESC',
						// 		'show_count' => 1,
						// 		'title_li'   => '',
						// 		'number'     => 10,
						// 	)
						// );
						?>
					</ul>
				</div> -->
				<!-- .widget -->

				<?php
				/* translators: %1$s: smiley */
				//$purple_web_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'purple-web'), convert_smilies(':)')) . '</p>';
				//the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$purple_web_archive_content");

				//the_widget('WP_Widget_Tag_Cloud');
				?>

				<p style="margin-top: 20px;">или <a style="color: #fff; text-decoration: underline;" href="<?php echo site_url() ?>">перейдите на главную страницу</a></p>

			</div><!-- .page-content -->
	

	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
