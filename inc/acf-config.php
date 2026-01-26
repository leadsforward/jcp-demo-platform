<?php
/**
 * ACF Configuration
 * Homepage field groups and options page setup
 *
 * @package JCP_Core
 */

// Only run if ACF is active
if ( ! function_exists( 'acf_add_options_page' ) ) {
    return;
}

/**
 * Create Homepage Options Page in ACF
 */
function jcp_core_register_homepage_options_page() {
    acf_add_options_page(
        [
            'page_title' => 'Homepage Settings',
            'menu_title' => 'Homepage Settings',
            'menu_slug'  => 'jcp-homepage',
            'capability' => 'manage_options',
            'position'   => 20,
            'icon_url'   => 'dashicons-layout',
        ]
    );
}

add_action( 'acf/init', 'jcp_core_register_homepage_options_page' );

/**
 * Register ACF field groups for Homepage
 * Using programmatic approach (no JSON sync needed)
 */
function jcp_core_register_acf_field_groups() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // Hero Section Field Group
    acf_add_local_field_group(
        [
            'key'      => 'jcp_homepage_hero',
            'title'    => 'Hero Section',
            'fields'   => [
                [
                    'key'        => 'hero_headline',
                    'label'      => 'Headline (H1)',
                    'name'       => 'hero_headline',
                    'type'       => 'text',
                    'required'   => 1,
                    'default'    => 'Turn every completed job into more calls and more customers',
                    'maxlength'  => 120,
                ],
                [
                    'key'        => 'hero_subheadline',
                    'label'      => 'Subheadline',
                    'name'       => 'hero_subheadline',
                    'type'       => 'textarea',
                    'default'    => 'Your team already takes job photos. JobCapturePro automatically turns those jobs into website updates, Google visibility, social posts, directory listings, and review requests so your work keeps bringing in new business.',
                    'rows'       => 4,
                ],
                [
                    'key'        => 'hero_image_url',
                    'label'      => 'Hero Image URL',
                    'name'       => 'hero_image_url',
                    'type'       => 'url',
                    'default'    => 'http://jobcapturepro.com/wp-content/uploads/2025/12/jcp-user-photo.jpg',
                ],
                [
                    'key'        => 'hero_image_alt',
                    'label'      => 'Hero Image Alt Text',
                    'name'       => 'hero_image_alt',
                    'type'       => 'text',
                    'default'    => 'Contractor capturing a job photo with JobCapturePro',
                ],
                [
                    'key'        => 'hero_badge_text',
                    'label'      => 'Badge Text (top-left overlay)',
                    'name'       => 'hero_badge_text',
                    'type'       => 'text',
                    'default'    => 'Real job proof',
                ],
                [
                    'key'        => 'hero_content_title',
                    'label'      => 'Bottom Content Title (e.g., "Verified instantly")',
                    'name'       => 'hero_content_title',
                    'type'       => 'text',
                    'default'    => 'Verified job proof',
                ],
                [
                    'key'        => 'hero_content_subtitle',
                    'label'      => 'Bottom Content Subtitle',
                    'name'       => 'hero_content_subtitle',
                    'type'       => 'text',
                    'default'    => 'AI check-ins appear in minutes',
                ],
                [
                    'key'        => 'hero_cta_primary_text',
                    'label'      => 'Primary CTA Button Text',
                    'name'       => 'hero_cta_primary_text',
                    'type'       => 'text',
                    'default'    => 'Watch the Live Demo',
                ],
                [
                    'key'        => 'hero_cta_primary_url',
                    'label'      => 'Primary CTA Button URL',
                    'name'       => 'hero_cta_primary_url',
                    'type'       => 'url',
                    'default'    => '/demo',
                ],
                [
                    'key'        => 'hero_cta_secondary_text',
                    'label'      => 'Secondary CTA Button Text',
                    'name'       => 'hero_cta_secondary_text',
                    'type'       => 'text',
                    'default'    => 'Learn how it works',
                ],
                [
                    'key'        => 'hero_cta_secondary_url',
                    'label'      => 'Secondary CTA Button URL',
                    'name'       => 'hero_cta_secondary_url',
                    'type'       => 'url',
                    'default'    => '#how-it-works',
                ],
                [
                    'key'        => 'hero_stats',
                    'label'      => 'Stats Row (bottom overlay)',
                    'name'       => 'hero_stats',
                    'type'       => 'repeater',
                    'min'        => 3,
                    'max'        => 5,
                    'layout'     => 'block',
                    'button_label' => 'Add Stat',
                    'sub_fields' => [
                        [
                            'key'      => 'stat_icon',
                            'label'    => 'Icon Name (Lucide)',
                            'name'     => 'stat_icon',
                            'type'     => 'text',
                            'required' => 1,
                            'default'  => 'map-pin',
                            'instructions' => 'e.g., map-pin, globe, star. See /assets/shared/assets/icons/lucide/',
                        ],
                        [
                            'key'      => 'stat_label',
                            'label'    => 'Label Text',
                            'name'     => 'stat_label',
                            'type'     => 'text',
                            'required' => 1,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'options_page',
                        'operator' => '==',
                        'value'    => 'jcp-homepage',
                    ],
                ],
            ],
            'menu_order' => 10,
        ]
    );

    // How It Works Section Field Group
    acf_add_local_field_group(
        [
            'key'      => 'jcp_homepage_how_it_works',
            'title'    => 'How It Works Section',
            'fields'   => [
                [
                    'key'      => 'enable_how_it_works',
                    'label'    => 'Enable this section',
                    'name'     => 'enable_how_it_works',
                    'type'     => 'true_false',
                    'default'  => 1,
                ],
                [
                    'key'        => 'how_it_works_title',
                    'label'      => 'Section Title',
                    'name'       => 'how_it_works_title',
                    'type'       => 'text',
                    'default'    => 'How JobCapturePro works',
                    'conditional_logic' => [
                        [
                            [
                                'field'    => 'enable_how_it_works',
                                'operator' => '==',
                                'value'    => '1',
                            ],
                        ],
                    ],
                ],
                [
                    'key'        => 'how_it_works_subtitle',
                    'label'      => 'Subtitle',
                    'name'       => 'how_it_works_subtitle',
                    'type'       => 'textarea',
                    'default'    => 'Every completed job becomes verified proof across every channel that matters. Here\'s the simple flow your crew already knows.',
                    'rows'       => 3,
                    'conditional_logic' => [
                        [
                            [
                                'field'    => 'enable_how_it_works',
                                'operator' => '==',
                                'value'    => '1',
                            ],
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'options_page',
                        'operator' => '==',
                        'value'    => 'jcp-homepage',
                    ],
                ],
            ],
            'menu_order' => 20,
        ]
    );

    // FAQ Section Field Group
    acf_add_local_field_group(
        [
            'key'      => 'jcp_homepage_faq',
            'title'    => 'FAQ Section',
            'fields'   => [
                [
                    'key'      => 'enable_faq',
                    'label'    => 'Enable this section',
                    'name'     => 'enable_faq',
                    'type'     => 'true_false',
                    'default'  => 1,
                ],
                [
                    'key'        => 'faq_title',
                    'label'      => 'Section Title',
                    'name'       => 'faq_title',
                    'type'       => 'text',
                    'default'    => 'FAQ',
                    'conditional_logic' => [
                        [
                            [
                                'field'    => 'enable_faq',
                                'operator' => '==',
                                'value'    => '1',
                            ],
                        ],
                    ],
                ],
                [
                    'key'      => 'faq_items',
                    'label'    => 'FAQ Items',
                    'name'     => 'faq_items',
                    'type'     => 'repeater',
                    'layout'   => 'block',
                    'button_label' => 'Add FAQ',
                    'conditional_logic' => [
                        [
                            [
                                'field'    => 'enable_faq',
                                'operator' => '==',
                                'value'    => '1',
                            ],
                        ],
                    ],
                    'sub_fields' => [
                        [
                            'key'      => 'faq_question',
                            'label'    => 'Question',
                            'name'     => 'faq_question',
                            'type'     => 'text',
                            'required' => 1,
                        ],
                        [
                            'key'      => 'faq_answer',
                            'label'    => 'Answer',
                            'name'     => 'faq_answer',
                            'type'     => 'textarea',
                            'required' => 1,
                            'rows'     => 3,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'options_page',
                        'operator' => '==',
                        'value'    => 'jcp-homepage',
                    ],
                ],
            ],
            'menu_order' => 30,
        ]
    );

    // General Settings Field Group
    acf_add_local_field_group(
        [
            'key'      => 'jcp_homepage_general',
            'title'    => 'General Settings',
            'fields'   => [
                [
                    'key'        => 'site_logo_url',
                    'label'      => 'Site Logo URL',
                    'name'       => 'site_logo_url',
                    'type'       => 'url',
                    'default'    => 'https://jobcapturepro.com/wp-content/uploads/2025/11/JobCapturePro-Logo-Dark.png',
                ],
                [
                    'key'        => 'site_primary_color',
                    'label'      => 'Primary Brand Color',
                    'name'       => 'site_primary_color',
                    'type'       => 'color_picker',
                    'default'    => '#ff503e',
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'options_page',
                        'operator' => '==',
                        'value'    => 'jcp-homepage',
                    ],
                ],
            ],
            'menu_order' => 0,
        ]
    );
}

add_action( 'acf/init', 'jcp_core_register_acf_field_groups' );
