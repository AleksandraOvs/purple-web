<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package purple
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="fixed-container _archive-page">
		<?php if (have_posts()) : ?>

			<header class="page-header">
				<div class="breadcrumbs__list">
					<?php echo site_breadcrumbs(); ?>
				</div>
				<?php
				the_archive_title('<h2 class="title">', '</h2>');
				the_archive_description('<div class="archive-description">', '</div>');
				?>
			</header><!-- .page-header -->
			<?php echo '<div class="archive-grid">'; ?>
		<?php
			/* Start the Loop */
			while (have_posts()) :

				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_type());

			endwhile;

			nums_pagination();

		else :

			get_template_part('template-parts/content', 'none');
			echo '</div>';
		endif;
		?>
	</div>



</main><!-- #main -->

<?php
get_sidebar();
get_footer();
