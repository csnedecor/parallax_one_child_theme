
<!-- =========================
 SECTION: LAB
============================== -->
<?php
global $wp_customize;
$parallax_one_my_lab_title = get_theme_mod('parallax_one_my_lab_title',esc_html__('My Lab','parallax-one'));
$parallax_one_my_lab_subtitle = get_theme_mod('parallax_one_my_lab_subtitle',esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'));
;

if(!empty($parallax_one_my_lab_title) || !empty($parallax_one_my_lab_subtitle) ){
  ?>
  <section class="lab" id="lab" role="region" aria-label="<?php esc_html_e('Lab','parallax-one') ?>">

    <div class="section-overlay-layer">
      <div class="container">
        <?php
        if( !empty($parallax_one_my_lab_title) || !empty($parallax_one_my_lab_subtitle)){ ?>
          <div class="section-header">
            <?php
            if( !empty($parallax_one_my_lab_title) ){ ?>
              <h2 class="dark-text"><?php echo esc_attr( $parallax_one_my_lab_title ); ?></h2><div class="colored-line"></div>
            <?php
            } elseif ( isset( $wp_customize ) ) { ?>
              <h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
            <?php
            }

            if( !empty($parallax_one_my_lab_subtitle) ){ ?>
              <div class="sub-heading"><?php echo esc_attr($parallax_one_my_lab_subtitle); ?></div>
            <?php
            } elseif ( isset( $wp_customize ) ) { ?>
              <div class="sub-heading paralax_one_only_customizer"></div>
            <?php
            } ?>
            <div class="portfolio-gallery">
              <?php echo do_shortcode("[huge_it_portfolio id='3']"); ?>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div><!-- container  -->
  </section><!-- #section9 -->
<?php
} else {
  if( isset( $wp_customize ) ) {
?>
    <section class="lab paralax_one_only_customizer" id="lab" role="region" aria-label="<?php esc_html_e('Lab','parallax-one') ?>">
      <div class="section-overlay-layer">
        <div class="container">
          <div class="section-header">
            <h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
            <div class="sub-heading paralax_one_only_customizer"></div>
          </div>
        </div>
      </div>
    </section>
  <?php
  }
}
?>
