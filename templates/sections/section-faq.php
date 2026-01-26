<?php
/**
 * Section: FAQ
 * 
 * Renders frequently asked questions section.
 * Content comes from ACF repeater field in 'FAQ Section' field group.
 * Can be toggled on/off via ACF enable/disable field.
 *
 * @package JCP_Core
 */

// Check if section is enabled in ACF
if ( ! jcp_core_is_section_enabled( 'faq' ) ) {
    return;
}

// Get ACF field values
$title = jcp_core_get_acf_field( 'faq_title', 'Frequently Asked Questions', 'options' );
$subtitle = jcp_core_get_acf_field( 'faq_subtitle', 'Everything you need to know about JobCapturePro', 'options' );
$faq_items = jcp_core_get_acf_field( 'faq_items', [], 'options' );

// Fallback FAQs if not set
if ( empty( $faq_items ) || ! is_array( $faq_items ) ) {
    $faq_items = [
        [
            'question' => 'How does the AI estimation work?',
            'answer' => 'Our AI analyzes property photos and customer input to instantly generate accurate estimates based on historical data.',
        ],
        [
            'question' => 'Can I use this on my phone?',
            'answer' => 'Yes! JobCapturePro is fully responsive and works great on smartphones, tablets, and desktops.',
        ],
        [
            'question' => 'Is my data secure?',
            'answer' => 'We use bank-level encryption and comply with HIPAA and SOC 2 standards to protect your data.',
        ],
        [
            'question' => 'How long does setup take?',
            'answer' => 'Most contractors are up and running within 30 minutes. We provide onboarding support every step of the way.',
        ],
    ];
}
?>

<section class="section section-faq jcp-section">
  <div class="section-container jcp-container">
    <!-- Section Header -->
    <div class="section-header jcp-section-header text-center">
      <h2 class="section-title jcp-section-title"><?php echo wp_kses_post( $title ); ?></h2>
      <?php if ( ! empty( $subtitle ) ) : ?>
      <p class="section-subtitle jcp-section-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
      <?php endif; ?>
    </div>

    <!-- FAQ Accordion -->
    <div class="faq-accordion" id="jcpFaqAccordion">
      <?php foreach ( $faq_items as $index => $item ) : 
        $item_id = 'faq-item-' . $index;
        $button_id = 'faq-button-' . $index;
      ?>
      <div class="faq-item">
        <button 
          id="<?php echo esc_attr( $button_id ); ?>" 
          class="faq-question"
          aria-expanded="false"
          aria-controls="<?php echo esc_attr( $item_id ); ?>"
        >
          <span class="faq-question-text"><?php echo wp_kses_post( $item['question'] ?? '' ); ?></span>
          <span class="faq-toggle-icon" aria-hidden="true">+</span>
        </button>
        
        <div 
          id="<?php echo esc_attr( $item_id ); ?>" 
          class="faq-answer"
          role="region"
          aria-labelledby="<?php echo esc_attr( $button_id ); ?>"
          hidden
        >
          <div class="faq-answer-content">
            <?php echo wp_kses_post( $item['answer'] ?? '' ); ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
// Accordion interaction
document.addEventListener('DOMContentLoaded', function() {
  const accordion = document.getElementById('jcpFaqAccordion');
  if (!accordion) return;
  
  const items = accordion.querySelectorAll('.faq-item');
  
  items.forEach(item => {
    const button = item.querySelector('.faq-question');
    const content = item.querySelector('.faq-answer');
    
    button.addEventListener('click', function() {
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      
      // Close all items
      items.forEach(i => {
        const btn = i.querySelector('.faq-question');
        const cnt = i.querySelector('.faq-answer');
        btn.setAttribute('aria-expanded', 'false');
        cnt.hidden = true;
      });
      
      // Open clicked item
      if (!isExpanded) {
        this.setAttribute('aria-expanded', 'true');
        content.hidden = false;
      }
    });
  });
});
</script>
