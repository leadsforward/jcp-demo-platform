<?php
/**
 * Section: Outcomes (Social Proof)
 * 
 * Renders the "Outcomes" section showing customer results and social proof.
 * Displays stats and testimonials from real contractors.
 *
 * @package JCP_Core
 */

// Get ACF field values
$title = jcp_core_get_acf_field( 'outcomes_title', 'Trusted by Contractors', 'options' );
$subtitle = jcp_core_get_acf_field( 'outcomes_subtitle', 'See results from contractors using JobCapturePro', 'options' );
$outcomes = jcp_core_get_acf_field( 'outcomes_items', [], 'options' );

// Fallback outcomes if not set in ACF
if ( empty( $outcomes ) || ! is_array( $outcomes ) ) {
    $outcomes = [
        [
            'metric' => '150+',
            'description' => 'Contractors using the platform',
        ],
        [
            'metric' => '10,000+',
            'description' => 'Leads captured and converted',
        ],
        [
            'metric' => '$2M+',
            'description' => 'Revenue attributed to JobCapturePro',
        ],
        [
            'metric' => '40%',
            'description' => 'Average lead conversion increase',
        ],
    ];
}
?>

<section class="section section-proof jcp-section">
  <div class="section-container jcp-container">
    <!-- Section Header -->
    <div class="section-header jcp-section-header text-center">
      <h2 class="section-title jcp-section-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="section-subtitle jcp-section-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
    </div>

    <!-- Outcomes Grid -->
    <div class="proof-grid jcp-grid-2">
      <?php foreach ( $outcomes as $outcome ) : ?>
      <div class="proof-card">
        <div class="proof-metric"><?php echo wp_kses_post( $outcome['metric'] ?? '' ); ?></div>
        <div class="proof-description"><?php echo wp_kses_post( $outcome['description'] ?? '' ); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
