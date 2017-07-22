<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tk
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-post mdc-toolbar-fixed-adjust">

		<?php
		while ( have_posts() ) : the_post();

			$values = get_post_custom();
			$aim_url = $values['aim_url'];

			if ( isset($values['enable_aim']) && isset($aim_url) && $aim_url[0] != "" ) {
				?>
					<div class="aim-embed">
						<iframe scrolling="no" src="<?php echo get_template_directory_uri() . '/aim/index.html?url=' . $aim_url[0]; ?>"></iframe>
					</div>
				<?php 
			}

			get_template_part( 'template-parts/content', get_post_format() );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
