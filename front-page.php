<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tk
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main front-page mdc-toolbar-fixed-adjust">
			<div class="grid-container mdc-layout-grid">
      			<div class="mdc-layout-grid__inner">

				<?php

					$items = get_pages();
					foreach (get_categories() as $cat) $items[] = $cat;	

					$postmeta_pages = maybe_unserialize( get_post_meta( get_the_ID(), 'pages', true ) );
					$postmeta_categories = maybe_unserialize( get_post_meta( get_the_ID(), 'categories', true ) );

					foreach ($items as $item) {
						$is_page = $item->ID != null;

						$id = $is_page ? $item->ID : $item->cat_ID;
						$title = $is_page ? $item->post_title : $item->name;
						$desc = $is_page ? $item->post_excerpt : $item->description;
						$postmeta = $is_page ? $postmeta_pages : $postmeta_categories;
						$link = $is_page ? get_permalink($id) : get_category_link($id);
						$image_url = $is_page 
							? wp_get_attachment_image_src( get_post_thumbnail_id($id), 'front-page-card' )[0] 
							: category_image_src( array('size' =>  'full', 'term_id' => $id )  , false );

						if (is_array($postmeta) && in_array($id, $postmeta)) {
							?>
								<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
									<a href="<?php echo $link; ?>">
							          	<div class="card-about mdc-card" style="background-image: url( <?php echo $image_url ?>)">
							            	<section class="mdc-card__primary">
							              		<h1 class="mdc-card__title mdc-card__title--large"><?php echo $title; ?></h1>
							            	</section>
							            	<section class="mdc-card__supporting-text"><?php echo $desc; ?></section>
							          	</div>
						          	</a>
						        </div>
							<?php
						}
					}

				?>
				</div>
			</div>

		</main><!-- #main
	</div><!-- #primary -->

<?php
get_footer();
