<?php
/**
 * Asset Enqueuing
 * Conditional CSS/JS loading per page
 *
 * @package JCP_Core
 */

/**
 * Enqueue CSS and JS based on current page
 *
 * @return void
 */
function jcp_core_enqueue_assets(): void {
    $pages = jcp_core_get_page_detection();
    $render_handle = 'jcp-core-render';
    $render_deps = [];

    $is_marketing = $pages['is_home'] || $pages['is_pricing'] || $pages['is_early_access'];

    // Always load navigation JS
    jcp_core_enqueue_script( 'jcp-core-nav', 'core/jcp-nav.js' );

    // Design System page (internal documentation)
    if ( $pages['is_design_system'] ) {
        jcp_core_enqueue_style( 'jcp-core-base', 'css/base.css' );
        jcp_core_enqueue_style( 'jcp-core-layout', 'css/layout.css', [ 'jcp-core-base' ] );
        jcp_core_enqueue_style( 'jcp-core-buttons', 'css/buttons.css', [ 'jcp-core-layout' ] );
        jcp_core_enqueue_style( 'jcp-core-components', 'css/components.css', [ 'jcp-core-buttons' ] );
        jcp_core_enqueue_style( 'jcp-core-utilities', 'css/utilities.css', [ 'jcp-core-components' ] );
        jcp_core_enqueue_style( 'jcp-core-design-system-page', 'css/design-system-page.css', [ 'jcp-core-utilities' ] );
        return;
    }

    // UI Library page (internal documentation - shows all components)
    if ( $pages['is_ui_library'] ) {
        jcp_core_enqueue_style( 'jcp-core-base', 'css/base.css' );
        jcp_core_enqueue_style( 'jcp-core-layout', 'css/layout.css', [ 'jcp-core-base' ] );
        jcp_core_enqueue_style( 'jcp-core-buttons', 'css/buttons.css', [ 'jcp-core-layout' ] );
        jcp_core_enqueue_style( 'jcp-core-components', 'css/components.css', [ 'jcp-core-buttons' ] );
        jcp_core_enqueue_style( 'jcp-core-utilities', 'css/utilities.css', [ 'jcp-core-components' ] );
        // Load homepage section styles to show all components
        jcp_core_enqueue_style( 'jcp-core-directory', 'css/pages/directory.css', [ 'jcp-core-components' ] );
        jcp_core_enqueue_style( 'jcp-core-home', 'css/pages/home.css', [ 'jcp-core-directory' ] );
        return;
    }

    // Load base CSS with all design system variables on all pages
    jcp_core_enqueue_style( 'jcp-core-base', 'css/base.css' );

    // Marketing pages: full design system
    if ( $is_marketing ) {
        jcp_core_enqueue_style( 'jcp-core-layout', 'css/layout.css', [ 'jcp-core-base' ] );
        jcp_core_enqueue_style( 'jcp-core-buttons', 'css/buttons.css', [ 'jcp-core-layout' ] );
        jcp_core_enqueue_style( 'jcp-core-components', 'css/components.css', [ 'jcp-core-buttons' ] );
        jcp_core_enqueue_style( 'jcp-core-utilities', 'css/utilities.css', [ 'jcp-core-components' ] );
    } else {
        // Other pages: minimal CSS
        jcp_core_enqueue_style( 'jcp-core-buttons', 'css/buttons.css', [ 'jcp-core-base' ] );
        jcp_core_enqueue_style( 'jcp-core-components', 'css/components.css', [ 'jcp-core-buttons' ] );
        jcp_core_enqueue_style( 'jcp-core-utilities', 'css/utilities.css', [ 'jcp-core-components' ] );
    }

    // Page-specific assets
    if ( $pages['is_home'] ) {
        jcp_core_enqueue_style( 'jcp-core-directory', 'css/pages/directory.css', [ 'jcp-core-components' ] );
        jcp_core_enqueue_style( 'jcp-core-home', 'css/pages/home.css', [ 'jcp-core-directory' ] );
        jcp_core_enqueue_script( 'jcp-core-home', 'core/jcp-home.js' );
        $render_deps[] = 'jcp-core-home';
    }

    if ( $pages['is_pricing'] ) {
        jcp_core_enqueue_style( 'jcp-core-pricing', 'css/pages/pricing.css', [ 'jcp-core-components' ] );
        jcp_core_enqueue_style( 'jcp-core-home-faq', 'css/pages/home/faq.css', [ 'jcp-core-pricing' ] );
        jcp_core_enqueue_script( 'jcp-shared-faq', 'shared/jcp-faq.js' );
        jcp_core_enqueue_script( 'jcp-core-pricing', 'core/jcp-pricing.js', [ 'jcp-shared-faq' ] );
        $render_deps[] = 'jcp-core-pricing';
    }

    if ( $pages['is_early_access'] ) {
        jcp_core_enqueue_style( 'jcp-core-early-access', 'css/pages/early-access.css', [ 'jcp-core-components' ] );
        // Use the same homepage CTA styling for consistent marketing CTAs.
        jcp_core_enqueue_style( 'jcp-core-home-final-cta', 'css/pages/home/final-cta.css', [ 'jcp-core-early-access' ] );
        jcp_core_enqueue_script( 'jcp-core-early-access', 'core/jcp-early-access.js' );
        $render_deps[] = 'jcp-core-early-access';
    }

    // Always load render dispatcher
    jcp_core_enqueue_script( $render_handle, 'core/jcp-render.js', $render_deps );

    // Global JS config
    $globals = "window.JCP_ENV = 'live';\n";
    $globals .= "window.JCP_CONFIG = { env: 'live', baseUrl: '" . esc_url_raw( site_url() ) . "' };\n";
    $globals .= "window.JCP_ASSET_BASE = '" . esc_url_raw( get_stylesheet_directory_uri() . '/assets' ) . "';";
    wp_add_inline_script( $render_handle, $globals, 'before' );

    // Demo page
    if ( $pages['is_demo'] ) {
        $demo_mode = isset( $_GET['mode'] ) && $_GET['mode'] === 'run'; // phpcs:ignore
        jcp_core_enqueue_style( 'jcp-core-demo', 'css/pages/demo.css' );
        if ( $demo_mode ) {
            jcp_core_enqueue_style( 'jcp-core-leaflet', 'demo/leaflet/leaflet.css', [ 'jcp-core-demo' ] );
            jcp_core_enqueue_script( 'jcp-core-leaflet', 'demo/leaflet/leaflet.js', [ $render_handle ] );
            jcp_core_enqueue_script( 'jcp-core-demo', 'demo/jcp-demo.js', [ 'jcp-core-leaflet' ] );
        } else {
            jcp_core_enqueue_style( 'jcp-core-survey', 'css/pages/survey.css', [ 'jcp-core-demo' ] );
            jcp_core_enqueue_script( 'jcp-core-survey', 'survey/survey.js', [ $render_handle ] );
        }
        return;
    }

    // Directory page
    if ( $pages['is_directory'] ) {
        jcp_core_enqueue_style( 'jcp-core-demo', 'css/pages/demo.css' );
        jcp_core_enqueue_style( 'jcp-core-directory', 'css/pages/directory-consolidated.css', [ 'jcp-core-utilities' ] );
        jcp_core_enqueue_style( 'jcp-core-directory-trust', 'css/pages/directory-trust.css', [ 'jcp-core-directory' ] );
        jcp_core_enqueue_script( 'jcp-core-directory', 'directory/directory.js', [ $render_handle ] );

        // Fetch all companies
        $companies = get_posts(
            [
                'post_type'      => 'jcp_company',
                'post_status'    => 'publish',
                'numberposts'    => -1,
            ]
        );

        $listings = [];
        foreach ( $companies as $company ) {
            $listings[] = jcp_core_company_data( $company );
        }

        $directory_data = wp_json_encode( [ 'listings' => $listings ] );
        wp_add_inline_script( 'jcp-core-directory', "window.JCP_DIRECTORY_DATA = {$directory_data};", 'before' );
        return;
    }

    // Company (single company profile)
    if ( $pages['is_company'] ) {
        jcp_core_enqueue_style( 'jcp-core-demo', 'css/pages/demo.css' );
        jcp_core_enqueue_style( 'jcp-core-directory', 'css/pages/directory-consolidated.css', [ 'jcp-core-utilities' ] );
        jcp_core_enqueue_style( 'jcp-core-directory-trust', 'css/pages/directory-trust.css', [ 'jcp-core-directory' ] );
        jcp_core_enqueue_style( 'jcp-core-profile', 'css/pages/profile-consolidated.css', [ 'jcp-core-directory' ] );
        jcp_core_enqueue_script( 'jcp-core-profile', 'directory/profile.js', [ $render_handle ] );
        jcp_core_enqueue_script( 'jcp-core-directory-integration', 'directory/directory-integration.js', [ 'jcp-core-profile' ] );

        $post = get_post();
        if ( $post && $post->post_type === 'jcp_company' ) {
            $profile_data = wp_json_encode( jcp_core_company_data( $post ) );
            wp_add_inline_script( 'jcp-core-profile', "window.JCP_PROFILE_DATA = {$profile_data};", 'before' );
        }
        return;
    }

    // Estimate page
    if ( $pages['is_estimate'] ) {
        jcp_core_enqueue_style( 'jcp-core-demo', 'css/pages/demo.css' );
        jcp_core_enqueue_style( 'jcp-core-estimate', 'css/pages/estimate.css' );
        jcp_core_enqueue_script( 'jcp-core-analytics', 'estimate/analytics.js', [ $render_handle ] );
        jcp_core_enqueue_script( 'jcp-core-requests', 'estimate/requests.js', [ $render_handle ] );
        jcp_core_enqueue_script( 'jcp-core-estimate', 'estimate/estimate-builder.js', [ 'jcp-core-analytics', 'jcp-core-requests' ] );
        return;
    }
}

add_action( 'wp_enqueue_scripts', 'jcp_core_enqueue_assets' );
