<?php
/**
 * Section: Hero
 * 
 * Renders the main hero section with headline, CTA, and visual.
 * Fetches content from ACF field group 'Hero Section' on homepage.
 *
 * @package JCP_Core
 */

// Get ACF field values for hero section
$headline = jcp_core_get_acf_field( 'hero_headline', 'Ready to Capture Growth?', 'options' );
$subheadline = jcp_core_get_acf_field( 'hero_subheadline', 'The smartest way to turn leads into revenue.', 'options' );
$image = jcp_core_get_acf_field( 'hero_image', '', 'options' );
$badge = jcp_core_get_acf_field( 'hero_badge', 'For Contractors', 'options' );
$content_title = jcp_core_get_acf_field( 'hero_content_title', 'Automated Lead Capture', 'options' );
$content_subtitle = jcp_core_get_acf_field( 'hero_content_subtitle', 'Job estimator built for you', 'options' );
$cta_primary = jcp_core_get_acf_field( 'hero_cta_primary', [], 'options' );
$cta_secondary = jcp_core_get_acf_field( 'hero_cta_secondary', [], 'options' );
$stats = jcp_core_get_acf_field( 'hero_stats', [], 'options' );

// Parse CTAs (may be stored as repeater or array)
if ( ! is_array( $cta_primary ) || empty( $cta_primary['text'] ) ) {
    $cta_primary = [
        'text' => 'Online Demo',
        'url' => '/demo',
    ];
}

if ( ! is_array( $cta_secondary ) || empty( $cta_secondary['text'] ) ) {
    $cta_secondary = [
        'text' => 'Get Started',
        'url' => '/early-access',
    ];
}

// Set image fallback
if ( empty( $image ) ) {
    $image = get_template_directory_uri() . '/assets/img/hero-home.jpg';
}

// Prepare component arguments
$hero_args = [
    'variant' => 'marketing',
    'headline' => $headline,
    'subheadline' => $subheadline,
    'image_url' => $image,
    'image_alt' => 'JobCapturePro Hero Image',
    'badge_text' => $badge,
    'badge_animate' => true,
    'content_title' => $content_title,
    'content_subtitle' => $content_subtitle,
    'cta_primary' => $cta_primary,
    'cta_secondary' => $cta_secondary,
    'stats' => $stats,
];

// Render hero component
get_template_part( 'templates/components/hero', null, [ 'args' => $hero_args ] );
