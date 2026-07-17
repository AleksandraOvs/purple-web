<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package purple
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">
		<?php
		if (is_singular()) {
			the_title('<h1 class="entry-title">', '</h1>');
		} elseif (is_archive()) {
		?>
			<h3><?php the_title() ?></h3>
		<?php

		} else {
			the_title('<h2 class="entry-title">', '</h2>');
		}
		?>

		<?php echo the_excerpt(); ?>

		<a class="btn-link cta purple" href="<?php echo the_permalink() ?>">Читать</a>


	</div><!-- .entry-header -->

	<?php if (has_post_thumbnail()) { ?>
		<?php purple_web_post_thumbnail(); ?>
	<?php } else {
	?>
		<a class="post-thumbnail" href="<?php echo the_permalink() ?> "><img src="<?php echo get_stylesheet_directory_uri() . '/images/svg/placeholder.svg' ?>" alt="post image" /></a>

	<?php
	} ?>

	<?php if (is_page(!is_archive())) {
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
	<?php
	}
	?>


	<!-- <footer class="entry-footer">
		<?php //purple_web_entry_footer(); 
		?>
	</footer> -->
	<!-- .entry-footer -->
	<?php
	if (is_archive()) {
		//get_template_part('template-parts/tags');
		purple_web_entry_footer();
	} ?>
</article><!-- #post-<?php the_ID(); ?> -->