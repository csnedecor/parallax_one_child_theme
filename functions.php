<?php
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles',99);
function child_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/custom.css', array( $parent_style ));
}
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
         update_option( 'theme_mods_' . get_template(), $value );
         return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
};

// Override customizer and add Work section
function parallax_one_childtheme_customize_register($wp_customize) {

    /**************************************/
    // ADD WORK SECTION
    /***************************************/
    $wp_customize->add_section( 'parallax_one_my_work_section', array(
        'title'       => esc_html__( 'Work section', 'parallax-one' ),
        'priority'    => 9999,
        'description' => sprintf('To edit the work gallery, <a href="admin.php?page=portfolios_huge_it_portfolio&task=edit_cat&id=2">go here</a>.'),
    ));

    /* Work title */
    $wp_customize->add_setting( 'parallax_one_my_work_title', array(
        'default' => esc_html__('Work','parallax-one'),
        'sanitize_callback' => 'parallax_one_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(
        'parallax_one_my_work_title', array(
        'label'    => esc_html__( 'Main title', 'parallax-one' ),
        'section'  => 'parallax_one_my_work_section',
        'active_callback' => 'parallax_one_show_on_front',
        'priority'    => 10,
    ));

    /* Work subtitle */
    $wp_customize->add_setting( 'parallax_one_my_work_subtitle', array(
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
        'sanitize_callback' => 'parallax_one_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control( 'parallax_one_my_work_subtitle', array(
        'label'    => esc_html__( 'Subtitle', 'parallax-one' ),
        'section'  => 'parallax_one_my_work_section',
        'active_callback' => 'parallax_one_show_on_front',
        'priority'    => 20,
    ));

    /**************************************/
    // ADD LAB SECTION
    /***************************************/
    $wp_customize->add_section( 'parallax_one_my_lab_section', array(
        'title'       => esc_html__( 'Lab section', 'parallax-one' ),
        'priority'    => 9999,
        'description' => sprintf('To edit the lab gallery, <a href="admin.php?page=portfolios_huge_it_portfolio&task=edit_cat&id=3">go here</a>.'),
    ));

    /* Lab title */
    $wp_customize->add_setting( 'parallax_one_my_lab_title', array(
        'default' => esc_html__('Lab','parallax-one'),
        'sanitize_callback' => 'parallax_one_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        'parallax_one_my_lab_title', array(
        'label'    => esc_html__( 'Main title', 'parallax-one' ),
        'section'  => 'parallax_one_my_lab_section',
        'active_callback' => 'parallax_one_show_on_front',
        'priority'    => 10,
    ));

    /* Lab subtitle */
    $wp_customize->add_setting( 'parallax_one_my_lab_subtitle', array(
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
        'sanitize_callback' => 'parallax_one_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control( 'parallax_one_my_lab_subtitle', array(
        'label'    => esc_html__( 'Subtitle', 'parallax-one' ),
        'section'  => 'parallax_one_my_lab_section',
        'active_callback' => 'parallax_one_show_on_front',
        'priority'    => 20,
    ));

    /************************************************/
    // ADD TO CONTACT SECTION
    /************************************************/

    /* Contact Form Title */
    $wp_customize->add_setting( 'parallax_one_frontpage_contact_form_title', array(
        'default' => esc_html__('Contact Me','parallax-one'),
        'sanitize_callback' => 'parallax_one_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        'parallax_one_frontpage_contact_form_title', array(
        'label'    => esc_html__( 'Title', 'parallax-one' ),
        'section'  => 'parallax_one_contact_section',
        'active_callback' => 'parallax_one_show_on_front',
        'priority'    => 10,
    ));
    /* Contact Form ShortCode  */
    $wp_customize->add_setting( 'parallax_one_frontpage_contact_form_shortcode', array(
        'default' => '',
        'sanitize_callback' => 'parallax_one_sanitize_text'
    ));
    $wp_customize->add_control( 'parallax_one_frontpage_contact_form_shortcode', array(
        'label'    => esc_html__( 'contact_form shortcode', 'parallax-one' ),
        'description' => __('To use this section, please install JetPack, activate the Contact Form, and paste the shortcode of your contact form here.','parallax-one'),
        'section'  => 'parallax_one_contact_section',
        'active_callback' => 'parallax_one_show_on_front',
        'priority'    => 20
    ));

    /* Contact Form Background    */
    $wp_customize->add_setting( 'paralax_one_contact_background', array(
        'default' => parallax_get_file('/images/background-images/parallax-img/parallax-img1.jpg'),
        'sanitize_callback' => 'esc_url',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_contact_background', array(
            'label'    => esc_html__( 'Contact Form Background', 'parallax-one' ),
            'section'  => 'parallax_one_contact_section',
            'active_callback' => 'parallax_one_show_on_front',
            'priority'    => 10
    )));
}

add_action( 'customize_register', 'parallax_one_childtheme_customize_register' );

/**********************************************/
// REMOVE UNUSED SECTIONS FROM CUSTOMIZER
/**********************************************/
function remove_sections(){
    global $wp_customize;

    $wp_customize->remove_section('parallax_one_services_section');
    $wp_customize->remove_section('parallax_one_team_section');
    $wp_customize->remove_section('parallax_one_testimonials_section');
}

// Priority 20 so that we remove options only once they've been added
add_action( 'customize_register', 'remove_sections', 20 );
?>
