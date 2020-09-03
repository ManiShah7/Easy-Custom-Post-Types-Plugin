<?php
if (function_exists('acf_add_local_field_group')) :
    $dashicons = [
        'dashicons-menu' => '<span class="dashicons dashicons-menu"></span>',
        'dashicons-menu-alt' => '<span class="dashicons dashicons-menu-alt"></span>',
    ];

    acf_add_local_field_group(array(
        'key' => 'easy_custom_post_types_fields',
        'title' => 'Easy Custom Post Types Fields',
        'fields' => array(
            array(
                'key' => 'field_ecpts_custom_post_types',
                'label' => 'Custom post types',
                'name' => 'custom_post_types',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add new CPT',
                'sub_fields' => array(
                    array(
                        'key' => 'field_ecpts_custom_post_type_name',
                        'label' => 'Custom post type name',
                        'name' => 'custom_post_type_name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_ecpts_dashicon',
                        'label' => 'Custom post type dashicon',
                        'name' => 'ecpts_dashicon',
                        'type' => 'select',
                        'choices' => $dashicons,
                        'ui' => 1
                    ),
                    array(
                        'key' => 'field_ecpts_supports',
                        'label' => 'checkbox',
                        'name' => 'ecpts_supports',
                        'type' => 'checkbox',
                        'choices' => [
                            'title' => 'title',
                            'editor' => 'editor',
                        ],
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-easy-custom-post-types',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;
