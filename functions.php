<?php
/**
 * JobCapturePro Theme Bootstrap
 * Loads all modular theme functionality from /inc/ directory
 *
 * @package JCP_Core
 */

// Load helper functions (asset paths, URLs, ACF helpers)
require_once get_template_directory() . '/inc/helpers.php';

// Load company data functions
require_once get_template_directory() . '/inc/company-data.php';

// Load asset enqueuing logic
require_once get_template_directory() . '/inc/enqueue.php';

// Load template routing
require_once get_template_directory() . '/inc/template-routes.php';

// Load ACF configuration (if ACF is available)
require_once get_template_directory() . '/inc/acf-config.php';

// Load design system page setup
require_once get_template_directory() . '/inc/design-system-setup.php';

