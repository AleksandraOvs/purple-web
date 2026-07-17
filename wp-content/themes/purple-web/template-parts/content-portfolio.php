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

	
	<?php if (has_post_thumbnail()) { ?>
		<?php purple_web_post_thumbnail(); ?>
	<?php } else {
	?>
		<a class="post-thumbnail" href="<?php echo the_permalink() ?> "><img src="<?php echo get_stylesheet_directory_uri() . '/images/svg/placeholder.svg' ?>" alt="post image" /></a>
	<?php
	} ?>

	<div class="article-portfolio__content">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title">', '</h2>');
		endif;
		?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->