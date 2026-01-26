<?php
/**
 * Reusable Button Component
 * 
 * Accepts array of arguments:
 * - text: Button text (required)
 * - url: Button link URL (required)
 * - variant: 'primary', 'secondary', 'ghost' (default: 'primary')
 * - icon: Icon name/slug for left icon (optional)
 * - icon_right: Icon name/slug for right icon (optional)
 * - size: 'small', 'medium', 'large' (default: 'medium')
 * - class: Additional CSS classes (optional)
 * - target: Link target ('_self', '_blank', etc.)
 * - rel: Link rel attribute (optional, auto-added for external)
 * - disabled: Boolean to disable button (default: false)
 *
 * @package JCP_Core
 * @var array $args Component arguments
 */

if ( ! isset( $args ) || ! is_array( $args ) ) {
    return;
}

// Extract variables
$text = $args['text'] ?? '';
$url = $args['url'] ?? '#';
$variant = $args['variant'] ?? 'primary';
$icon = $args['icon'] ?? '';
$icon_right = $args['icon_right'] ?? '';
$size = $args['size'] ?? 'medium';
$custom_class = $args['class'] ?? '';
$target = $args['target'] ?? '_self';
$rel = $args['rel'] ?? '';
$disabled = $args['disabled'] ?? false;

// Validate required fields
if ( empty( $text ) ) {
    return;
}

// Build CSS classes
$button_classes = [
    'btn',
    'btn-' . esc_attr( $variant ),
    'btn-' . esc_attr( $size ),
];

if ( ! empty( $custom_class ) ) {
    $button_classes[] = $custom_class;
}

$button_class = implode( ' ', $button_classes );

// Auto-detect external links
if ( $target === '_blank' && empty( $rel ) ) {
    $rel = 'noopener noreferrer';
}

// Build rel attribute
$rel_attr = ! empty( $rel ) ? ' rel="' . esc_attr( $rel ) . '"' : '';

// Determine if it's a disabled button or regular link
if ( $disabled ) {
    $tag = 'button';
    $href_attr = ' disabled';
    $disabled_class = ' is-disabled';
} else {
    $tag = 'a';
    $href_attr = ' href="' . esc_url( $url ) . '"';
    $target_attr = $target !== '_self' ? ' target="' . esc_attr( $target ) . '"' : '';
    $disabled_class = '';
}
?>

<?php echo '<' . esc_html( $tag ); ?> 
  class="<?php echo esc_attr( $button_class . $disabled_class ); ?>"<?php echo $href_attr; ?><?php echo $rel_attr; ?><?php echo $target_attr ?? ''; ?>>
  <?php if ( ! empty( $icon ) ) : ?>
  <img src="<?php echo esc_url( jcp_core_icon( $icon ) ); ?>" class="btn-icon btn-icon--left" alt="">
  <?php endif; ?>
  <span class="btn-text"><?php echo esc_html( $text ); ?></span>
  <?php if ( ! empty( $icon_right ) ) : ?>
  <img src="<?php echo esc_url( jcp_core_icon( $icon_right ) ); ?>" class="btn-icon btn-icon--right" alt="">
  <?php endif; ?>
<?php echo '</' . esc_html( $tag ) . '>'; ?>
