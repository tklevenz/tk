<?php
/**
 * tk Theme Customizer
 *
 * @package tk
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tk_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'headerbg_color', array(
            'default'     => '#424242'
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'headerbg_color',	
            array(
                'label'      => __( 'Header Color', 'tk' ),
                'section'    => 'colors',
                'settings'   => 'headerbg_color'
            )
        )
    );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'tk_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'tk_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'tk_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tk_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tk_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tk_customize_preview_js() {
	wp_enqueue_script( 'tk-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tk_customize_preview_js' );


function tk_customize_css()
{
    ?>
         <style type="text/css">
             .site-header { background-color: <?php echo get_theme_mod('headerbg_color', '#424242'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'tk_customize_css');