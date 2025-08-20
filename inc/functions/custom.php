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
		'elementor_library'
	);

	if ( ! in_array( get_post_type( $post_id ), $post_types ) ) {
		return;
	}

	remove_action( 'admin_menu', array( Smartcrawl_Metabox::get(), 'smartcrawl_create_meta_box' ) );
}

// plugin - smartcrawl -  hide in post list - post types //
add_action( 'admin_head-edit.php', 'theme_hide_smartcrawl_seo_details_post_types' );
function theme_hide_smartcrawl_seo_details_post_types() {
	global $typenow;

	$post_types = array(
		'document',
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
		'document',
		'elementor_library'
	);

	if ( in_array( $post_type, $post_types ) ) {
		echo '<style>#wp-content-editor-tools { display: none !important; }</style>';
	}
}