<?php
/**
 * Home Page Template
 * 
 * Renders the homepage using modular sections.
 * Each section is self-contained and can be enabled/disabled via ACF.
 *
 * @package JCP_Core
 */

get_header(); ?>

<main id="jcpMain" class="jcp-main">
  
  <!-- Section 1: Hero -->
  <?php get_template_part( 'templates/sections/section-hero' ); ?>
  
  <!-- Section 2: How It Works -->
  <?php get_template_part( 'templates/sections/section-how-it-works' ); ?>
  
  <!-- Section 3: Features -->
  <?php get_template_part( 'templates/sections/section-features' ); ?>
  
  <!-- Section 4: Outcomes (Social Proof) -->
  <?php get_template_part( 'templates/sections/section-outcomes' ); ?>
  
  <!-- Section 5: Demo Preview -->
  <?php get_template_part( 'templates/sections/section-demo-preview' ); ?>
  
  <!-- Section 6: Who It's For -->
  <?php get_template_part( 'templates/sections/section-who-its-for' ); ?>
  
  <!-- Section 7: Pricing Preview -->
  <?php get_template_part( 'templates/sections/section-pricing-preview' ); ?>
  
  <!-- Section 8: FAQ -->
  <?php get_template_part( 'templates/sections/section-faq' ); ?>
  
  <!-- Section 9: Final CTA -->
  <?php get_template_part( 'templates/sections/section-final-cta' ); ?>
  
</main>

<?php get_footer();
