<?php

// plugin - smartcrawl - hide post types without single page - post types //
add_action( 'admin_menu', 'theme_remove_smartcrawl_metabox_post_types', 0 );
function theme_remove_smartcrawl_metabox_post_types() {
	global $pagenow;

	if ( 'post.php' != $pagenow || ! isset( $_GET['post'] ) || empty( $_GET['post'] ) ) {
		return;
	}

	$post_id = (int) $_GET['post'];
	$post_types = array(
		'document',
		'product',
		'elementor_library'
	);

	if ( ! in_array( get_post_type( $post_id ), $post_types ) ) {
		return;
	}

	remove_action( 'admin_menu', array( \SmartCrawl\Admin\Metabox::get(), 'smartcrawl_create_meta_box' ) );
}

// plugin - smartcrawl - hide in quick edit panel - post types //
add_action( 'admin_init', 'theme_remove_smartcrawl_quick_edit' );
function theme_remove_smartcrawl_quick_edit() {
	global $typenow;

	$post_types = array(
		'document',
		'product',
		'elementor_library'
	);

	if ( in_array( $typenow, $post_types ) ) {
		remove_action( 'quick_edit_custom_box', array( \SmartCrawl\Admin\Metabox::get(), 'smartcrawl_quick_edit_dispatch' ), 20 );
	}
}

  add_filter( 'wds-metabox-disabled', function( $disabled, $post_type ) {
    if ( 'document' === $post_type ) {
        return true;
    }
    return $disabled;
}, 10, 2 );

// plugin - smartcrawl -  hide in post list - post types //
add_action( 'admin_head-edit.php', 'theme_hide_smartcrawl_seo_details_post_types' );
function theme_hide_smartcrawl_seo_details_post_types() {
	global $typenow;

	$post_types = array(
		'document',
		'product',
		'elementor_library'
	);

	if ( in_array( $typenow, $post_types ) ) {
		echo '<style>.wds-meta-details { display: none !important; }</style>';
	}
}

// disable visual editor - post types //
add_filter( 'user_can_richedit', 'theme_disable_visual_editor_post_types' );
function theme_disable_visual_editor_post_types( $default ) {
	global $post_type;

	$post_types = array(
		'document',
		'product',
		'elementor_library'
	);

	if ( in_array( $post_type, $post_types ) ) {
		return false;
	}
	return $default;
}

// hide editor tools (media button) - post types //
add_action( 'admin_head', 'theme_hide_editor_tools_post_types' );
function theme_hide_editor_tools_post_types() {
	global $post_type;

	$post_types = array(
		'page',
		'document',
		'product',
		'elementor_library'
	);

	if ( in_array( $post_type, $post_types ) ) {
		echo '<style>#wp-content-media-buttons { display: none !important; }</style>';
	}
}