<?php
/**
 * Section: Who It's For
 * 
 * Renders the "Who It's For" section showing target audience and use cases.
 * Uses card grid to show different contractor types and industries.
 *
 * @package JCP_Core
 */

// Get ACF field values
$title = jcp_core_get_acf_field( 'who_its_for_title', 'Perfect For', 'options' );
$subtitle = jcp_core_get_acf_field( 'who_its_for_subtitle', 'Whether you\'re solo or running a team', 'options' );
$audiences = jcp_core_get_acf_field( 'who_its_for_items', [], 'options' );

// Fallback audiences if not set in ACF
if ( empty( $audiences ) || ! is_array( $audiences ) ) {
    $audiences = [
        [
            'title' => 'Roofing Contractors',
            'description' => 'Streamline roof inspection and estimate process',
            'icon' => 'home',
        ],
        [
            'title' => 'Restoration Specialists',
            'description' => 'Capture damage photos and create instant estimates',
            'icon' => 'shield',
        ],
        [
            'title' => 'General Contractors',
            'description' => 'Track leads across multiple project types',
            'icon' => 'hammer',
        ],
        [
            'title' => 'Insurance Adjusters',
            'description' => 'Document claims and automate workflow',
            'icon' => 'file-check',
        ],
    ];
}
?>

<section class="section section-who-its-for jcp-section">
  <div class="section-container jcp-container">
    <!-- Section Header -->
    <div class="section-header jcp-section-header text-center">
      <h2 class="section-title jcp-section-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="section-subtitle jcp-section-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
    </div>

    <!-- Audience Grid -->
    <div class="audience-grid jcp-grid-2">
      <?php foreach ( $audiences as $audience ) : 
        $icon = $audience['icon'] ?? 'users';
      ?>
      <?php get_template_part(
          'templates/components/card',
          null,
          [
              'args' => [
                  'title' => $audience['title'] ?? '',
                  'content' => $audience['description'] ?? '',
                  'icon' => $icon,
                  'variant' => 'feature',
              ],
          ]
      ); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
