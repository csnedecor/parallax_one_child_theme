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

}

add_action( 'customize_register', 'parallax_one_childtheme_customize_register' );

?>
