<!-- =========================
CONTACT FORM
============================== -->

<?php
global $wp_customize;
$parallax_one_frontpage_contact_form_title = get_theme_mod('parallax_one_frontpage_contact_form_title',esc_html__('Contact','parallax-one'));
$contact_background = get_theme_mod('paralax_one_contact_background', parallax_get_file('/images/background-images/parallax-img/parallax-img1.jpg'));


if(!empty($parallax_one_frontpage_contact_form_title) || !empty($parallax_one_frontpage_contact_form_shortcode) ){
  if(!empty($contact_background)){
      echo '<section class="contact-info contact-wrap" id="contact-info" style="background-image:url('.$contact_background.');" role="region" aria-label="'.esc_html__('Contact Info','parallax-one').'">';
    } else {
      echo '<section class="contact-info contact-wrap" id="contact-info" role="region" aria-label="'.esc_html__('Contact Info','parallax-one').'">';
    }
  ?>

    <div class="section-overlay-layer">
      <div class="container">
        <?php
        if( !empty($parallax_one_frontpage_contact_form_title)){ ?>
          <div class="section-header">
            <?php
            if( !empty($parallax_one_frontpage_contact_form_title) ){ ?>
              <h2 class="white-text"><?php echo esc_attr( $parallax_one_frontpage_contact_form_title ); ?></h2><div class="colored-line"></div>
            <?php
            } elseif ( isset( $wp_customize ) ) { ?>
              <h2 class="white-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
            <?php
            } ?>
          </div>
        <?php
        }
        ?>
      </div>
      <?php
      } ?>
    <?php
    $parallax_one_frontpage_contact_form_shortcode = get_theme_mod('parallax_one_frontpage_contact_form_shortcode');
      if(!empty($parallax_one_frontpage_contact_form_shortcode)){
          $pos = strlen(strstr($parallax_one_frontpage_contact_form_shortcode,"pirate_forms"));
      }


        if( !empty($parallax_one_frontpage_contact_form_shortcode) ){
        if( ($pos == 0) || empty($pos) ) {
    ?>


            <div class="contact-form" id="contact">
              <?php echo do_shortcode($parallax_one_frontpage_contact_form_shortcode);?>
            </div>
        <?php
        } else { ?>
          <div class="pirate-forms-section" id="contact">
            <div class="container">
              <?php echo do_shortcode($parallax_one_frontpage_contact_form_shortcode);?>
              <input name="redirect_to" type="hidden" value="http://localhost" />
            </div>
          </div>
      <?php
        }
      }
    ?>
  </div>
</section>

