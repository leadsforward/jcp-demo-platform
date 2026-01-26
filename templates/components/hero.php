<?php
/**
 * Reusable Hero Component
 * 
 * Accepts array of arguments:
 * - variant: 'marketing', 'demo', 'minimal' (default: 'marketing')
 * - headline: H1 text
 * - subheadline: Supporting text
 * - image_url: Hero image URL
 * - image_alt: Alt text for image
 * - badge_text: Badge text (optional, top-left)
 * - badge_animate: Enable pulsing animation (default: true)
 * - content_title: Overlay title (optional, bottom)
 * - content_subtitle: Overlay subtitle (optional, bottom)
 * - cta_primary: Array with 'text' and 'url'
 * - cta_secondary: Array with 'text' and 'url'
 * - stats: Array of stat objects with 'icon', 'label', 'description'
 *
 * @package JCP_Core
 * @var array $args Component arguments
 */

if ( ! isset( $args ) || ! is_array( $args ) ) {
    return;
}

// Extract variables from args array
$variant = $args['variant'] ?? 'marketing';
$headline = $args['headline'] ?? '';
$subheadline = $args['subheadline'] ?? '';
$image_url = $args['image_url'] ?? '';
$image_alt = $args['image_alt'] ?? 'Hero image';
$badge_text = $args['badge_text'] ?? '';
$badge_animate = $args['badge_animate'] ?? true;
$content_title = $args['content_title'] ?? '';
$content_subtitle = $args['content_subtitle'] ?? '';
$cta_primary = $args['cta_primary'] ?? [];
$cta_secondary = $args['cta_secondary'] ?? [];
$stats = $args['stats'] ?? [];

// Validate required fields
if ( empty( $headline ) || empty( $image_url ) ) {
    return;
}
?>

<section class="directory-hero jcp-hero jcp-hero--<?php echo esc_attr( $variant ); ?>">
  <div class="hero-split jcp-grid-2">
    
    <!-- Copy Column -->
    <div class="hero-copy jcp-hero-copy">
      <h1 class="jcp-hero-title"><?php echo wp_kses_post( $headline ); ?></h1>
      
      <?php if ( ! empty( $subheadline ) ) : ?>
      <p class="jcp-hero-subtitle"><?php echo wp_kses_post( $subheadline ); ?></p>
      <?php endif; ?>
      
      <!-- CTAs -->
      <?php if ( ! empty( $cta_primary ) || ! empty( $cta_secondary ) ) : ?>
      <div class="directory-cta-row jcp-actions">
        <?php if ( ! empty( $cta_primary['text'] ) && ! empty( $cta_primary['url'] ) ) : ?>
        <a class="btn btn-primary directory-cta directory-cta-secondary" href="<?php echo esc_url( $cta_primary['url'] ); ?>">
          <?php echo esc_html( $cta_primary['text'] ); ?>
        </a>
        <?php endif; ?>
        
        <?php if ( ! empty( $cta_secondary['text'] ) && ! empty( $cta_secondary['url'] ) ) : ?>
        <a class="btn btn-secondary directory-cta" href="<?php echo esc_url( $cta_secondary['url'] ); ?>">
          <?php echo esc_html( $cta_secondary['text'] ); ?>
        </a>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      
      <!-- Stats Row (Left Column) -->
      <?php if ( ! empty( $stats ) ) : ?>
      <div class="directory-meta">
        <?php foreach ( $stats as $stat ) : ?>
        <div class="meta-item">
          <div class="meta-label">
            <?php if ( ! empty( $stat['icon'] ) ) : ?>
            <img src="<?php echo esc_url( jcp_core_icon( $stat['icon'] ) ); ?>" class="meta-icon" alt="">
            <?php endif; ?>
            <strong><?php echo esc_html( $stat['label'] ); ?></strong>
          </div>
          <?php if ( ! empty( $stat['description'] ) ) : ?>
          <span><?php echo esc_html( $stat['description'] ); ?></span>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
    
    <!-- Visual Column -->
    <div class="hero-visual jcp-hero-visual">
      <div class="hero-proof-stack">
        <div class="hero-media-card">
          <div class="hero-media-glow" aria-hidden="true"></div>
          <img 
            class="hero-media-image" 
            src="<?php echo esc_url( $image_url ); ?>" 
            alt="<?php echo esc_attr( $image_alt ); ?>"
          >
          <div class="hero-media-shade" aria-hidden="true"></div>
          
          <!-- Badge (optional, top-left) -->
          <?php if ( ! empty( $badge_text ) ) : ?>
          <div class="hero-media-badge">
            <span class="hero-media-pill<?php echo $badge_animate ? ' pulse-orange' : ''; ?>">
              <?php echo esc_html( $badge_text ); ?>
            </span>
          </div>
          <?php endif; ?>
          
          <!-- Content Overlay (optional, bottom) -->
          <?php if ( ! empty( $content_title ) || ! empty( $content_subtitle ) ) : ?>
          <div class="hero-media-content">
            <?php if ( ! empty( $content_title ) ) : ?>
            <div class="hero-media-title"><?php echo esc_html( $content_title ); ?></div>
            <?php endif; ?>
            <?php if ( ! empty( $content_subtitle ) ) : ?>
            <div class="hero-media-subtitle"><?php echo esc_html( $content_subtitle ); ?></div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          
          <!-- Bottom Stats Overlay (optional) -->
          <?php if ( ! empty( $stats ) ) : ?>
          <div class="hero-media-stats">
            <?php foreach ( $stats as $stat ) : ?>
            <div class="hero-stat">
              <?php if ( ! empty( $stat['icon'] ) ) : ?>
              <img src="<?php echo esc_url( jcp_core_icon( $stat['icon'] ) ); ?>" class="hero-stat-icon" alt="">
              <?php endif; ?>
              <span class="hero-stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
