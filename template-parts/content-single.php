<?php

/**
 * Template part for displaying single posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- .entry-header -->
	<header class="entry-header">
		<?php if (has_post_thumbnail()) : ?>

		<?php the_post_thumbnail('large'); ?>

		<?php endif; ?>
	</header>

	<!-- .entry-content -->
	<div class="entry-content">

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div>
	<h2 class="entry-author">
		&mdash;<?php the_title(); ?>
	</h2>
</article><!-- #post-## -->