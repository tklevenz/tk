<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tk
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main archive-page mdc-toolbar-fixed-adjust">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php echo single_cat_title() ?></h1>
				<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="grid-container mdc-layout-grid">
        		<div class="mdc-layout-grid__inner">


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'archive-card' )[0]

			?>

				<div class="mdc-layout-grid__cell">
					<a href="<?php esc_url( the_permalink() ) ?>">
		            <div class="mdc-card" <?php if($image_url != ""): ?>style="background-image: url( <?php echo $image_url ?>)"<?php endif; ?>>
		              	<section class="mdc-card__primary">
		              		<?php the_title('<h1 class="mdc-card__title mdc-card__title--large">','</h1>') ?>
	              		</section>
	              		<section class="mdc-card__supporting-text"><?php the_excerpt() ?></section>
		            </div>
		            </a>
		        </div>

		    <?php

			endwhile;

			?>

				</div>
			</div>

			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
