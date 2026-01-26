<?php
/**
 * Section: Final CTA (Call-to-Action Band)
 * 
 * Renders the final call-to-action band at the bottom of homepage.
 * Encourages users to take action with prominent buttons.
 *
 * @package JCP_Core
 */

// Get ACF field values
$title = jcp_core_get_acf_field( 'final_cta_title', 'Ready to Transform Your Business?', 'options' );
$subtitle = jcp_core_get_acf_field( 'final_cta_subtitle', 'Join 150+ contractors capturing leads and closing jobs faster', 'options' );
$cta_primary_text = jcp_core_get_acf_field( 'final_cta_primary_text', 'Get Started Free', 'options' );
$cta_primary_url = jcp_core_get_acf_field( 'final_cta_primary_url', '/early-access', 'options' );
$cta_secondary_text = jcp_core_get_acf_field( 'final_cta_secondary_text', 'Schedule Demo', 'options' );
$cta_secondary_url = jcp_core_get_acf_field( 'final_cta_secondary_url', '/demo', 'options' );
?>

<section class="section section-cta-final jcp-section jcp-section--dark">
  <div class="section-container jcp-container">
    <!-- CTA Content -->
    <div class="cta-final-content text-center">
      <h2 class="cta-final-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="cta-final-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
      
      <!-- CTAs -->
      <div class="cta-final-actions">
        <?php
        get_template_part(
            'templates/components/button',
            null,
            [
                'args' => [
                    'text' => $cta_primary_text,
                    'url' => $cta_primary_url,
                    'variant' => 'primary',
                    'size' => 'large',
                    'class' => 'cta-final-button',
                ],
            ]
        );
        ?>
        
        <?php
        get_template_part(
            'templates/components/button',
            null,
            [
                'args' => [
                    'text' => $cta_secondary_text,
                    'url' => $cta_secondary_url,
                    'variant' => 'secondary',
                    'size' => 'large',
                    'class' => 'cta-final-button',
                ],
            ]
        );
        ?>
      </div>
    </div>
  </div>
</section>
