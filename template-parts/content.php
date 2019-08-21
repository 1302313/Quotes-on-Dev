<?php

/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

// Get from post meta table, source
$source = 		get_post_meta(get_the_ID(), '_qod_quote_source', true);
$source_url = 	get_post_meta(get_the_ID(), '_qod_quote_source_url', true);


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<!-- Post Meta -->
	<div class="entry-meta">
		<h2 class="entry-title">
			<?php the_title(); ?>
		</h2>
		<!-- Check if source URL exists -->
		<?php if ($source && $source_url) : ?>
		<span class="source">,
			<a href="<?php echo $source_url; ?>"> <?php echo $source; ?> </a>
		</span>
		<!-- else, Check if source exists -->
		<?php elseif ($source) : ?>
		<span class="source">,
			<?php echo $source; ?>
		</span>
		<!-- else, no surce -->
		<?php else : ?>
		<span class="source">

		</span>

		<?php endif; ?>
	</div>
</article><!-- #post-## -->


<?php if (is_home() || is_single()) : ?>
<button type="button" id="new-quote-button">Show Me Another!</button>
<?php endif; ?>