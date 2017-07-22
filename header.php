<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tk
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('mdc-typography'); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header mdc-toolbar mdc-toolbar--fixed">
		<div class="mdc-toolbar__row">
			<section class="mdc-toolbar__section mdc-toolbar__section--align-start">
            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="mdc-toolbar__title"><?php bloginfo( 'name' ); ?></span></a>
    		</section>


    		<section class="mdc-toolbar__section mdc-toolbar__section--align-end">
    			<nav id="site-navigation" class="main-navigation toolbar-nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</nav><!-- #site-navigation -->

				<img class="mobile-menu-button" src="<?php echo get_template_directory_uri() ?>/images/ic_menu_white_24px.svg"/>

				<div class="mdc-simple-menu mdc-simple-menu--theme-dark" tabindex="-1">
					<ul class="mdc-simple-menu__items mdc-list" role="menu" aria-hidden="true">
					<?php
						foreach (wp_get_nav_menu_items('menu-1') as $item) {
						?>
							<li class="mdc-list-item" role="menuitem" tabindex="0">
								<a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
							</li>
						<?php
						}
					?>
					 </ul>
				</div>
    		</section>
			

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
