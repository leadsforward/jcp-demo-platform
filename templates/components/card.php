<?php
/**
 * Generic Card Component
 * 
 * Accepts array of arguments:
 * - title: Card title (required)
 * - content: Card content HTML (required)
 * - icon: Icon name/slug (optional)
 * - image: Image URL (optional)
 * - image_alt: Image alt text (optional)
 * - footer: Footer content (optional)
 * - link: Card link URL (makes card clickable)
 * - variant: 'default', 'feature', 'pricing' (default: 'default')
 * - class: Additional CSS classes (optional)
 *
 * @package JCP_Core
 * @var array $args Component arguments
 */

if ( ! isset( $args ) || ! is_array( $args ) ) {
    return;
}

// Extract variables
$title = $args['title'] ?? '';
$content = $args['content'] ?? '';
$icon = $args['icon'] ?? '';
$image = $args['image'] ?? '';
$image_alt = $args['image_alt'] ?? 'Card image';
$footer = $args['footer'] ?? '';
$link = $args['link'] ?? '';
$variant = $args['variant'] ?? 'default';
$custom_class = $args['class'] ?? '';

// Validate required fields
if ( empty( $title ) || empty( $content ) ) {
    return;
}

// Build classes
$card_classes = [
    'card',
    'card--' . esc_attr( $variant ),
];

if ( ! empty( $link ) ) {
    $card_classes[] = 'card--clickable';
}

if ( ! empty( $custom_class ) ) {
    $card_classes[] = $custom_class;
}

$card_class = implode( ' ', $card_classes );

// Determine if card is a link
$wrapper_tag = ! empty( $link ) ? 'a' : 'div';
$wrapper_attrs = '';

if ( ! empty( $link ) ) {
    $wrapper_attrs = ' href="' . esc_url( $link ) . '"';
}
?>

<?php echo '<' . esc_html( $wrapper_tag ); ?> class="<?php echo esc_attr( $card_class ); ?>"<?php echo $wrapper_attrs; ?>>
  
  <?php if ( ! empty( $image ) ) : ?>
  <div class="card-image">
    <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
  </div>
  <?php endif; ?>
  
  <div class="card-body">
    <?php if ( ! empty( $icon ) ) : ?>
    <div class="card-icon">
      <img src="<?php echo esc_url( jcp_core_icon( $icon ) ); ?>" alt="">
    </div>
    <?php endif; ?>
    
    <h3 class="card-title"><?php echo wp_kses_post( $title ); ?></h3>
    <div class="card-content"><?php echo wp_kses_post( $content ); ?></div>
  </div>
  
  <?php if ( ! empty( $footer ) ) : ?>
  <div class="card-footer"><?php echo wp_kses_post( $footer ); ?></div>
  <?php endif; ?>
  
<?php echo '</' . esc_html( $wrapper_tag ) . '>'; ?>
