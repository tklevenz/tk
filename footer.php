<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tk
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p><?php $copy = '&copy;' . ' ' . get_bloginfo( 'name' ) . ' - ' . date('Y'); echo $copy	; ?></p>
		</div><!-- .site-info -->
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'footer-menu',
			) );
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	window.mdc.autoInit();

	let menu = new mdc.menu.MDCSimpleMenu(document.querySelector('.mdc-simple-menu'));
	document.querySelector('.mobile-menu-button').addEventListener('click', () => menu.open = !menu.open);
</script>

</body>
</html>
