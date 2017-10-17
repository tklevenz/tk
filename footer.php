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

	<div class="floaty">
	    <ul class="floaty-list">
	    	<a href="https://github.com/tklevenz" target="blank">
		      <li class="floaty-list-item floaty-list-item--black">
		        <span class="floaty-list-item-label">GitHub</span>
		        <svg aria-labelledby="simpleicons-github-icon" width="30" height="30" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="absolute-center"><title id="simpleicons-github-icon">GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
		      </li>
		  </a>
	      <a href="https://www.linkedin.com/in/tobias-klevenz-273809aa/" target="blank">
		      <li class="floaty-list-item floaty-list-item--blue">
		        <span class="floaty-list-item-label">LinkedIn</span>
		        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="absolute-center"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
		      </li>
		  </a>
	    </ul>
	    <a href="mailto:consulting@tobiasklevenz.de" target="blank">
		    <div class="floaty-btn">
		      <span class="floaty-btn-label">
		        Contact
		      </span>
		      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="floaty-btn-icon floaty-btn-icon-plus absolute-center">
		          <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z" fill="#000"/>
		          <path d="M0 0h24v24h-24z" fill="none"/>
		      </svg>
		      <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" class="floaty-btn-icon floaty-btn-icon-create absolute-center">
			     <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
				<path d="M0 0h24v24H0z" fill="none"/>
			</svg>
		    </div>
		</a>
	  </div>

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

	var floaty = document.querySelector('.floaty');
	floaty.addEventListener('mouseover', function() {
		floaty.classList.add('is-active');
	});

	floaty.addEventListener('mouseout', function() {
		floaty.classList.remove('is-active');
	});
</script>

</body>
</html>
