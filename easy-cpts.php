<?php
/*
Plugin Name: Easy Custom Post Types
Plugin URI: https://github.com/ManiShahDesigns
description: Easily add custom post types to your blog.
Version: 0.1
Author: Mani Shah Alizadegan
Author URI: https://github.com/ManiShahDesigns
License: GPL2
 */

class EasyCPTS
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'create_plugin_settings_page'));
        require $this->DIR . 'includes/custom-fields/index.php';
        if (function_exists('acf_add_options_page'))
        {
            acf_add_options_page([
                'page_title' => 'Easy Custom Post Types',
                'parent_slug' => 'options-general.php',
            ]);
        }
        add_action('init', array($this, 'addCustomPostType'));
    }

    public function addCustomPostType()
    {
        $repeater = get_field('custom_post_types', 'options');

        // Registering your Custom Post Type
        foreach ($repeater as $field)
        {
            $labels = array(
                'name' => _x($field['custom_post_type_name'], 'Post Type General Name', 'twentytwenty'),
                'singular_name' => _x($field['custom_post_type_name'], 'Post Type Singular Name', 'twentytwenty'),
                'menu_name' => __($field['custom_post_type_name'], 'twentytwenty'),
                'parent_item_colon' => __('Parent Movie', 'twentytwenty'),
                'all_items' => __('All ' . $field['custom_post_type_name'], 'twentytwenty'),
                'view_item' => __('View Movie', 'twentytwenty'),
                'add_new_item' => __('Add New ' . $field['custom_post_type_name'], 'twentytwenty'),
                'add_new' => __('Add New', 'twentytwenty'),
                'edit_item' => __('Edit Movie', 'twentytwenty'),
                'update_item' => __('Update Movie', 'twentytwenty'),
                'search_items' => __('Search Movie', 'twentytwenty'),
                'not_found' => __('Not Found', 'twentytwenty'),
                'not_found_in_trash' => __('Not found in Trash', 'twentytwenty'),
            );

            $args = array(
                'label' => __($field['custom_post_type_name'], 'twentytwenty'),
                'description' => __($field['custom_post_type_name'], 'twentytwenty'),
                'labels' => $labels,
                // Features this CPT supports in Post Editor
                'supports' => __($field['ecpts_supports'], 'twentytwenty'),

                // array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),

                'taxonomies' => array('genres'),

                'hierarchical' => false,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_in_admin_bar' => true,
                'menu_position' => 5,
                'can_export' => true,
                'has_archive' => true,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'capability_type' => 'post',
                'show_in_rest' => true,
                'menu_icon' => $field['ecpts_dashicon'],
            );

            register_post_type($field['custom_post_type_name'], $args);
        }
    }
}

$var = new EasyCPTS();
