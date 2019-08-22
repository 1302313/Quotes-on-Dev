<?php

/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php echo esc_html('Primary Menu'); ?></button>
			<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
		</nav><!-- #site-navigation -->


		<div class="copyright">
			<?php echo ('COPYRIGHT &copy; 2019'); ?>
			<a href="<?php echo 'https://redacademy.com/'; ?>">
				<?php echo '"Quotes" on Dev_'; ?>
			</a>
		</div>

	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>