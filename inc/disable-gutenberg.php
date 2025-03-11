<?php

// Disable Gutenberg
// add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg Post Type
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    if ($post_type === 'page' || $post_type === 'upcoming-webinar') return false;
    return $current_status;
}

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

    $excluded_templates = array(
        'page-templates/template-home.php',
    );

    $excluded_ids = array(
        get_option( 'page_on_front' )
    );
    
    $excluded_post_types = array(
        'expert',
    );

    if ( empty( $id ) ) {
            return false;
        }
    
        $id = intval( $id );
        $template = get_page_template_slug( $id );
    
        // Get the current post type
        $post_type = get_post_type( $id );
    
        return in_array( $id, $excluded_ids ) 
            || in_array( $template, $excluded_templates ) 
            || in_array( $post_type, $excluded_post_types );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

    if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
        return $can_edit;

    if( ea_disable_editor( $_GET['post'] ) )
        $can_edit = false;

    return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

