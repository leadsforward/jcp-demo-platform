<?php
/**
 * Section: Demo Preview
 * 
 * Renders the "Demo Preview" section highlighting the platform's UI.
 * Displays interactive preview and link to full demo.
 *
 * @package JCP_Core
 */

// Get ACF field values
$title = jcp_core_get_acf_field( 'demo_title', 'See It In Action', 'options' );
$subtitle = jcp_core_get_acf_field( 'demo_subtitle', 'Experience the JobCapturePro platform firsthand', 'options' );
$demo_image = jcp_core_get_acf_field( 'demo_image', '', 'options' );
$demo_cta_text = jcp_core_get_acf_field( 'demo_cta_text', 'Take a Demo', 'options' );
$demo_cta_url = jcp_core_get_acf_field( 'demo_cta_url', '/demo', 'options' );

// Set image fallback
if ( empty( $demo_image ) ) {
    $demo_image = get_template_directory_uri() . '/assets/img/demo-preview.jpg';
}
?>

<section class="section section-demo-preview jcp-section">
  <div class="section-container jcp-container">
    <!-- Section Header -->
    <div class="section-header jcp-section-header text-center">
      <h2 class="section-title jcp-section-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="section-subtitle jcp-section-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
    </div>

    <!-- Demo Image + CTA -->
    <div class="demo-content">
      <div class="demo-image-wrapper">
        <img 
          src="<?php echo esc_url( $demo_image ); ?>" 
          alt="<?php echo esc_attr( $title ); ?>"
          class="demo-image"
        >
      </div>
      
      <div class="demo-cta-wrapper text-center">
        <?php
        get_template_part(
            'templates/components/button',
            null,
            [
                'args' => [
                    'text' => $demo_cta_text,
                    'url' => $demo_cta_url,
                    'variant' => 'primary',
                    'size' => 'large',
                    'class' => 'demo-cta-button',
                ],
            ]
        );
        ?>
      </div>
    </div>
  </div>
</section>
