<?php
// acf - fields //
add_filter( 'acf/settings/save_json', 'theme_acf_json_save_folder' );
function theme_acf_json_save_folder( $path ) {
    return get_stylesheet_directory() . '/inc/acf/json';
}

add_filter( 'acf/settings/load_json', 'theme_acf_json_load_folder' );
function theme_acf_json_load_folder( $paths ) {
    unset($paths[0]); // remove the default path (optional)
    $paths[] = get_stylesheet_directory() . '/inc/acf/json';
    return $paths;
}

// acfe - modules //
add_action( 'acf/init', 'theme_acfe_modules' );
function theme_acfe_modules(){
	// force sync //
    acf_update_setting( 'acfe/modules/force_sync', true );

    // force sync deleted json //
    acf_update_setting( 'acfe/modules/force_sync/delete', true );

	// classic editor //
    acf_update_setting( 'acfe/modules/classic_editor', true );

    // block types //
    acf_update_setting( 'acfe/modules/block_types', false );

	// dynamic forms //
    acf_update_setting( 'acfe/modules/forms', false );

	// options pages //
	acf_update_setting( 'acfe/modules/options_pages', false );

	// post types //
    acf_update_setting( 'acfe/modules/post_types', false );

	// taxonomies //
    acf_update_setting( 'acfe/modules/taxonomies', false );

	// rewrite rules ui //
    acf_update_setting( 'acfe/modules/rewrite_rules', true );

	// templates //
    acf_update_setting( 'acfe/modules/templates', false );

    // scripts //
    acf_update_setting( 'acfe/modules/scripts', true );

    // developer mode //
    acf_update_setting( 'acfe/dev', true );

    // performance //
    acf_update_setting( 'acfe/modules/performance', 'hybrid' );

    
}

// custom css panel //
add_action( 'wp_before_admin_bar_render', 'theme_acf_css' );
function theme_acf_css() { ?>
    <style>
        /* command update */
		[data-name="command_update"] {
			text-align: right;
		}

        /* image */
        .acf-image-uploader .image-wrap img {
            max-width: 200px !important;
        }

        /* column endpoint */
        .acf-field.clear-both {
            padding: 1px !important;
            border: 0 !important;
        }
    </style>
<?php }