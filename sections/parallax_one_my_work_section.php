
<!-- =========================
 SECTION: WORK
============================== -->
<?php
global $wp_customize;
$parallax_one_my_work_title = get_theme_mod('parallax_one_my_work_title',esc_html__('My Work','parallax-one'));
$parallax_one_my_work_subtitle = get_theme_mod('parallax_one_my_work_subtitle',esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'));
;

if(!empty($parallax_one_my_work_title) || !empty($parallax_one_my_work_subtitle) ){
  ?>
  <section class="work" id="work" role="region" aria-label="<?php esc_html_e('Work','parallax-one') ?>">

    <div class="section-overlay-layer">
      <div class="container">
        <?php
        if( !empty($parallax_one_my_work_title) || !empty($parallax_one_my_work_subtitle)){ ?>
          <div class="section-header">
            <?php
            if( !empty($parallax_one_my_work_title) ){ ?>
              <h2 class="dark-text"><?php echo esc_attr( $parallax_one_my_work_title ); ?></h2><div class="colored-line"></div>
            <?php
            } elseif ( isset( $wp_customize ) ) { ?>
              <h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
            <?php
            }

            if( !empty($parallax_one_my_work_subtitle) ){ ?>
              <div class="sub-heading"><?php echo esc_attr($parallax_one_my_work_subtitle); ?></div>
            <?php
            } elseif ( isset( $wp_customize ) ) { ?>
              <div class="sub-heading paralax_one_only_customizer"></div>
            <?php
            } ?>
            <div class="portfolio-gallery">
              <?php echo do_shortcode("[huge_it_portfolio id='2']"); ?>
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
    <section class="work paralax_one_only_customizer" id="work" role="region" aria-label="<?php esc_html_e('Work','parallax-one') ?>">
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
