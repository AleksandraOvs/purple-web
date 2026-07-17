<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package purple
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="section__post-content">
		<div class="fixed-container">
			<div class="breadcrumbs__list">
				<?php echo site_breadcrumbs(); ?>
			</div>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
					the_title('<h2 class="entry-title">', '</h2>');
					?>
				</header><!-- .entry-header -->

				<?php //if (has_post_thumbnail()) { 
				?>
				<?php //purple_web_post_thumbnail(); 
				?>
				<?php // } else {
				?>
				<!-- <a class="post-thumbnail" href="<?php //echo the_permalink() 
														?> "><img src="<?php //echo get_stylesheet_directory_uri() . '/images/svg/placeholder.svg' 
																									?>" alt="post image" /></a> -->
				<?php
				//} 
				?>


				<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'purple-web'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'purple-web'),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->



				<footer class="entry-footer">
					<?php purple_web_entry_footer();
					?>
				</footer>
				<!-- .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>

	</section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
