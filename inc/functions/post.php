<?php
// excerpt //
add_post_type_support( 'page', 'excerpt' ); // add to pages

remove_filter( 'term_description', 'wpautop' ); // remove tag <p>

add_filter( 'excerpt_length', 'theme_custom_excerpt_length' );
function theme_custom_excerpt_length( $length ) {
	return 35;
}

add_filter( 'excerpt_more', 'theme_custom_excerpt_more' );
function theme_custom_excerpt_more( $more ) {
	return ' (...)';
}

// post editor //
//add_filter( 'quicktags_settings', 'theme_custom_editor' );
function theme_custom_editor( $arrange_buttons ) {
	$arrange_buttons['buttons'] = 'strong,em,u,block,ul,ol,li,link';
	return $arrange_buttons;
}

// post custom permalink //
add_filter( 'pre_post_link', 'theme_custom_post_permalink_prefix', 10, 3 );
function theme_custom_post_permalink_prefix( $permalink, $post, $leavename ) {
    if ( $post->post_type === 'post' ) {
        $permalink = '/news' . $permalink;
    }
    return $permalink;
}

add_action( 'init', 'theme_custom_post_permalink_rewrite' );
function theme_custom_post_permalink_rewrite() {
    add_rewrite_rule(
        '^news/([^/]+)/?$',
        'index.php?post_type=post&name=$matches[1]',
        'top'
    );
    flush_rewrite_rules();
}

// remove post from back-end //
//add_filter( 'register_post_type_args', 'theme_remove_post_backend', 10, 2 );
function theme_remove_post_backend( $args, $name ) {
    if( 'post' === $name )
    {   
        $args['show_ui']        = false; // Display the user-interface
        $args['show_in_nav_menus'] = false; // Display for selection in navigation menus
        $args['show_in_menu']      = false; // Display in the admin menu
        $args['show_in_admin_bar'] = false; // Display in the WordPress admin bar
    }
    return $args;
}

// remove quick draft from the dashboard //
//add_action( 'wp_dashboard_setup', 'theme_remove_draft_widget', 999 );
function theme_remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// disable default taxonomies category and post_tags //
//add_action( 'init', 'theme_unregister_default_tax' );
function theme_unregister_default_tax( ) {
    unregister_taxonomy_for_object_type( 'category', 'post' );
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}

//add_filter( 'taxonomy_labels_category', 'theme_change_taxonomy_labels' );
//add_filter( 'taxonomy_labels_post_tag', 'theme_change_taxonomy_labels' );
function theme_change_taxonomy_labels( $labels ) {
    $labels->name = '';
    $labels->singular_name = '';
    $labels->menu_name = '';
    return $labels;
}