<?php
/**
 * Section: Features
 * 
 * Renders the "Features" section with benefit cards grid.
 * Content comes from ACF field group 'Features Section'.
 * Features displayed as card grid with icons.
 *
 * @package JCP_Core
 */

// Get ACF field values
$title = jcp_core_get_acf_field( 'features_title', 'Everything You Need', 'options' );
$subtitle = jcp_core_get_acf_field( 'features_subtitle', 'All the tools built into one platform', 'options' );
$features = jcp_core_get_acf_field( 'features_items', [], 'options' );

// Fallback features if not set in ACF
if ( empty( $features ) || ! is_array( $features ) ) {
    $features = [
        [
            'title' => 'AI-Powered Estimates',
            'description' => 'Automatic project assessment and pricing in seconds',
            'icon' => 'zap',
        ],
        [
            'title' => 'Lead Capture',
            'description' => 'Automatically collect customer contact information',
            'icon' => 'users',
        ],
        [
            'title' => 'Photo Documentation',
            'description' => 'Capture property images directly in the system',
            'icon' => 'camera',
        ],
        [
            'title' => 'Mobile Friendly',
            'description' => 'Works seamlessly on phones, tablets, and desktops',
            'icon' => 'smartphone',
        ],
    ];
}
?>

<section class="section section-benefits jcp-section">
  <div class="section-container jcp-container">
    <!-- Section Header -->
    <div class="section-header jcp-section-header text-center">
      <h2 class="section-title jcp-section-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="section-subtitle jcp-section-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
    </div>

    <!-- Features Grid -->
    <div class="benefits-grid jcp-grid-2">
      <?php foreach ( $features as $feature ) : 
        $icon = $feature['icon'] ?? 'star';
      ?>
      <?php get_template_part(
          'templates/components/card',
          null,
          [
              'args' => [
                  'title' => $feature['title'] ?? '',
                  'content' => $feature['description'] ?? '',
                  'icon' => $icon,
                  'variant' => 'feature',
              ],
          ]
      ); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
