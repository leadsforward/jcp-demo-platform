<?php
/**
 * Section: How It Works
 * 
 * Renders the "How It Works" section with rankings/steps process.
 * Content comes from ACF field group 'How It Works Section'.
 * Can be toggled on/off via ACF enable/disable field.
 *
 * @package JCP_Core
 */

// Check if section is enabled in ACF
if ( ! jcp_core_is_section_enabled( 'how_it_works' ) ) {
    return;
}

// Get ACF field values
$title = jcp_core_get_acf_field( 'how_it_works_title', 'How It Works', 'options' );
$subtitle = jcp_core_get_acf_field( 'how_it_works_subtitle', 'From property inquiry to revenue in minutes', 'options' );
$steps = jcp_core_get_acf_field( 'how_it_works_steps', [], 'options' );

// Fallback steps if not set in ACF
if ( empty( $steps ) || ! is_array( $steps ) ) {
    $steps = [
        [
            'number' => '1',
            'title' => 'Property Inquiry',
            'description' => 'Customer fills out property details',
        ],
        [
            'number' => '2',
            'title' => 'AI Assessment',
            'description' => 'System analyzes scope and creates estimate',
        ],
        [
            'number' => '3',
            'title' => 'Lead Capture',
            'description' => 'Contact info automatically saved to system',
        ],
        [
            'number' => '4',
            'title' => 'Revenue',
            'description' => 'Convert lead to job and start work',
        ],
    ];
}
?>

<section class="section section-rankings jcp-section">
  <div class="section-container jcp-container">
    <!-- Section Header -->
    <div class="section-header jcp-section-header text-center">
      <h2 class="section-title jcp-section-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="section-subtitle jcp-section-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
    </div>

    <!-- Rankings Grid -->
    <div class="rankings-grid jcp-grid-4">
      <?php foreach ( $steps as $index => $step ) : ?>
      <div class="ranking-card" style="--ranking-index: <?php echo absint( $index + 1 ); ?>">
        <div class="ranking-number">
          <?php echo absint( $step['number'] ?? ( $index + 1 ) ); ?>
        </div>
        <h3 class="ranking-title">
          <?php echo wp_kses_post( $step['title'] ?? '' ); ?>
        </h3>
        <p class="ranking-description">
          <?php echo wp_kses_post( $step['description'] ?? '' ); ?>
        </p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
