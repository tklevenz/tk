<?php
/**
 * tk functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tk
 */

if ( ! function_exists( 'tk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tk, use a find and replace
	 * to change 'tk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	add_image_size( 'front-page-card', 570, 500, true );
	add_image_size( 'archive-card', 360, 350, true );

	// This theme uses wp_nav_menu() in two location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'tk' ),
		'menu-2' => esc_html__( 'Footer', 'tk')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tk_custom_background_args', array(
		'default-color' => '232323',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );


}
endif;
add_action( 'after_setup_theme', 'tk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tk_content_width', 640 );
}
add_action( 'after_setup_theme', 'tk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 
function tk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tk' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tk' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tk_widgets_init' );
*/
/**
 * Enqueue scripts and styles.
 */
function tk_scripts() {
	// Material Design Components
	wp_enqueue_style( 'tk-mdc', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css' );

	wp_enqueue_script( 'tk-mdc-js', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js', array(), '20151215', true );

	// Fonts
	wp_enqueue_style( 'tk-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500|Roboto+Mono:400,500');

	wp_enqueue_style( 'tk-style', get_stylesheet_uri() );

	wp_enqueue_style( 'tk-style-tk', get_template_directory_uri() . '/dist/tk.css');

	wp_enqueue_script( 'tk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tk_scripts' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom header.

require get_template_directory() . '/inc/custom-header.php';
 */

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Custoom metaboxes
 */
add_action( 'add_meta_boxes', 'tk_meta_box_add' );
function tk_meta_box_add()
{
	global $post;
   	$frontpage_id = get_option('page_on_front');
   	if($post->ID == $frontpage_id) {
   		add_meta_box( 'tk-meta-box-pages', 'Select pages to include on front page', 'tk_meta_box_pages', 'page', 'normal', 'high' );
    	add_meta_box( 'tk-meta-box-categories', 'Select categories to include on front page', 'tk_meta_box_categories', 'page', 'normal', 'high' );
   	}

   	add_meta_box( 'tk_meta_box_aim', 'Set "Am I Responsive" url' , 'tk_meta_box_aim', 'post', 'normal', 'high' );
   	add_meta_box( 'tk_meta_box_post_config', 'Post config' , 'tk_meta_box_post_config', 'post', 'normal', 'high' );
}

/**
 * Metabox listing pages that can be selected for display on frontpage
 */
function tk_meta_box_pages()
{
	global $post;
	$postmeta_pages = maybe_unserialize( get_post_meta( $post->ID, 'pages', true ) );

	foreach (get_pages() as $page) {
		

		$checked = is_array($postmeta_pages) && in_array($page->ID, $postmeta_pages) ? 'on' : '';
		?>
		<p>
			<input type="checkbox" value="<?php echo $page->ID; ?>" name="pages[]" <?php checked( $checked, 'on' ); ?>/>
	        <label><?php echo $page->post_title; ?></label>
        </p>
	<?php 
	}
}

/**
 * Metabox listing categories that can be selected for display on frontpage
 */
function tk_meta_box_categories()
{
	global $post;
	$postmeta_categories = maybe_unserialize( get_post_meta( $post->ID, 'categories', true ) );

	foreach (get_categories() as $cat) {
		$checked = is_array($postmeta_categories) && in_array($cat->cat_ID, $postmeta_categories) ? 'on' : '';
		?>
		<p>
			<input type="checkbox" value="<?php echo $cat->cat_ID; ?>" name="categories[]" <?php checked( $checked, 'on' ); ?>/>
	        <label><?php echo $cat->name; ?></label>
        </p>
        <?php
	}
}

/**
 * Metabox providing checkbox and URL for Am I Responsive display
 */
function tk_meta_box_aim()
{
	global $post;
    $values = get_post_custom( $post->ID );
    $url = isset($values['aim_url']) ? $values['aim_url'] : '';
    $checked = isset($values['enable_aim']) ? 'on' : 'off';
	?>
	<p>
		<input type="checkbox" name="enable_aim" <?php checked( $checked, 'on' ); ?>/>
        <label for="enable_aim">Enable am I responsive</label>
	</p>
	<p>
		<label for="aim_url">Url</label>
		<input type="text" name="aim_url" value="<?php echo $url[0]; ?>" />
	</p>
	<?php
}

/**
 * Metabox for post config, to hide post meta/footer
 */
function tk_meta_box_post_config()
{
	global $post;
    $values = get_post_custom( $post->ID );
    $checked_meta = isset($values['hide_meta']) ? 'on' : 'off';
    $checked_footer = isset($values['hide_footer']) ? 'on' : 'off';
	?>
	<p>
		<input type="checkbox" name="hide_meta" <?php checked( $checked_meta, 'on' ); ?>/>
        <label for="hide_meta">Hide post meta</label>
	</p>
	<p>
		<input type="checkbox" name="hide_footer" <?php checked( $checked_footer, 'on' ); ?>/>
        <label for="hide_footer">Hide post footer</label>
	</p>
	<?php
}

/**
 * saving metabox values
 */
add_action( 'save_post', 'tk_meta_box_save' );
function tk_meta_box_save( $post_id )
{
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    foreach (array('pages', 'categories') as $type) {
    	if ( ! empty( $_POST[$type] ) ) {
	        update_post_meta( $post_id, $type, $_POST[$type] );
	    } else {
	        delete_post_meta( $post_id, $type );
	    }
    }

    if ( isset( $_POST['enable_aim']) )	{
    	update_post_meta( $post_id, 'enable_aim', 1);
    } else {
    	delete_post_meta( $post_id, 'enable_aim');
    }

    if ( isset( $_POST['aim_url'] ) ) {
    	update_post_meta( $post_id, 'aim_url', $_POST['aim_url']);
    } else {
    	delete_post_meta( $post_id, 'aim_url');
    }

    if ( isset( $_POST['hide_meta']) )	{
    	update_post_meta( $post_id, 'hide_meta', 1);
    } else {
    	delete_post_meta( $post_id, 'hide_meta');
    }

    if ( isset( $_POST['hide_footer']) )	{
    	update_post_meta( $post_id, 'hide_footer', 1);
    } else {
    	delete_post_meta( $post_id, 'hide_footer');
    }
}

/**
 * enable excerpt support for pages
 */
add_post_type_support( 'page', 'excerpt' );

/**
 * wrap images in posts
 */
function wrap_images($content) {
   $pattern = '/(<img[^>]*class=\"([^>]*?)\"[^>]*>)/i';
   $replacement = '<figure class="image-container $2">$1</figure>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'wrap_images');