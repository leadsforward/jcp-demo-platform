<?php
/**
 * Section: Pricing Preview
 * 
 * Renders a preview/teaser of the pricing page.
 * Links to full pricing page for detailed information.
 *
 * @package JCP_Core
 */

// Get ACF field values
$title = jcp_core_get_acf_field( 'pricing_preview_title', 'Simple, Fair Pricing', 'options' );
$subtitle = jcp_core_get_acf_field( 'pricing_preview_subtitle', 'Pay only for what you use', 'options' );
$pricing_cta_text = jcp_core_get_acf_field( 'pricing_cta_text', 'View Pricing', 'options' );
$pricing_cta_url = jcp_core_get_acf_field( 'pricing_cta_url', '/pricing', 'options' );
$pricing_plans = jcp_core_get_acf_field( 'pricing_preview_plans', [], 'options' );

// Fallback pricing info if not set
if ( empty( $pricing_plans ) || ! is_array( $pricing_plans ) ) {
    $pricing_plans = [
        [
            'name' => 'Starter',
            'price' => 'Free',
            'features' => [ 'Up to 10 leads/month', 'Basic estimates', 'Mobile app' ],
        ],
        [
            'name' => 'Professional',
            'price' => '$99/mo',
            'features' => [ 'Unlimited leads', 'Advanced estimates', 'Team management' ],
        ],
        [
            'name' => 'Enterprise',
            'price' => 'Custom',
            'features' => [ 'Everything in Pro', 'API access', 'Dedicated support' ],
        ],
    ];
}
?>

<section class="section section-pricing-preview jcp-section">
  <div class="section-container jcp-container">
    <!-- Section Header -->
    <div class="section-header jcp-section-header text-center">
      <h2 class="section-title jcp-section-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="section-subtitle jcp-section-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
    </div>

    <!-- Pricing Cards -->
    <div class="pricing-grid jcp-grid-3">
      <?php foreach ( $pricing_plans as $plan ) : ?>
      <div class="pricing-card">
        <div class="pricing-header">
          <h3 class="pricing-plan-name"><?php echo esc_html( $plan['name'] ?? '' ); ?></h3>
          <div class="pricing-amount"><?php echo wp_kses_post( $plan['price'] ?? '' ); ?></div>
        </div>
        
        <?php if ( ! empty( $plan['features'] ) && is_array( $plan['features'] ) ) : ?>
        <ul class="pricing-features">
          <?php foreach ( $plan['features'] as $feature ) : ?>
          <li class="pricing-feature">
            <?php echo esc_html( $feature ); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- CTA -->
    <div class="pricing-cta-wrapper text-center">
      <?php
      get_template_part(
          'templates/components/button',
          null,
          [
              'args' => [
                  'text' => $pricing_cta_text,
                  'url' => $pricing_cta_url,
                  'variant' => 'primary',
                  'size' => 'large',
              ],
          ]
      );
      ?>
    </div>
  </div>
</section>
