<?php
/**
 * XStudio Theme Customizer
 *
 * @package XStudio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function xstudio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'xstudio_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'xstudio_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'xstudio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function xstudio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function xstudio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function xstudio_customize_preview_js() {
	wp_enqueue_script( 'xstudio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'xstudio_customize_preview_js' );

add_action('customize_register', function($customizer){
    /**
     * Settings for the blog
     */
    $customizer->add_section(
        'background_page_title-section',
        array(
            'title' => 'Settings for the blog',

            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'copyright_textbox',
        array('default' => 'See all news')
    );
    $customizer->add_control(
        'copyright_textbox',
        array(
            'label' => 'Text',
            'section' => 'background_page_title-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting('background-page-title');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'background-page-title',
            array(
                'label' => 'Download the background image for the page title',
                'section' => 'background_page_title-section',
                'settings' => 'background-page-title'
            )
        )
    );

    $customizer->add_setting(
        'copyright_single',
        array('default' => 'Title Here')
    );
    $customizer->add_control(
        'copyright_single',
        array(
            'label' => 'Text',
            'section' => 'background_page_title-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting('background-page-single');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'background-page-single',
            array(
                'label' => 'Download the background image for the page single',
                'section' => 'background_page_title-section',
                'settings' => 'background-page-single'
            )
        )
    );


    $customizer->add_section(
        'background_page_title-works',
        array(
            'title' => 'Settings for the works',

            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'copyright_works',
        array('default' => 'See all design enjoy')
    );
    $customizer->add_control(
        'copyright_works',
        array(
            'label' => 'Text',
            'section' => 'background_page_title-works',
            'type' => 'text',
        )
    );

    $customizer->add_setting('background-page-works');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'background-page-works',
            array(
                'label' => 'Download the background image for the page portfoil',
                'section' => 'background_page_title-works',
                'settings' => 'background-page-works'
            )
        )
    );

    $customizer->add_setting(
        'copyright_single_works',
        array('default' => 'See all design enjoy')
    );
    $customizer->add_control(
        'copyright_single_works',
        array(
            'label' => 'Text',
            'section' => 'background_page_title-works',
            'type' => 'text',
        )
    );

    $customizer->add_setting('background-page-single_works');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'background-page-single_works',
            array(
                'label' => 'Download the background image for the page single works',
                'section' => 'background_page_title-works',
                'settings' => 'background-page-single_works'
            )
        )
    );


    $customizer->add_section(
        'portfoil-section',
        array(
            'title' => 'Settings for the portfoil',

            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'title_portfoil',
        array('default' => 'Our works')
    );
    $customizer->add_control(
        'title_portfoil',
        array(
            'label' => 'Text',
            'section' => 'portfoil-section',
            'type' => 'text',
        )
    );


});
