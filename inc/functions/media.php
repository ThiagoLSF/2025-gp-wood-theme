<?php
// thumbnails //
add_theme_support( 'post-thumbnails' );

// media default sizes //
update_option( 'thumbnail_size_w', 500 );
update_option( 'thumbnail_size_h', 500 );
update_option( 'thumbnail_crop', 1 );

update_option( 'medium_size_w', 750 );
update_option( 'medium_size_h', 750 );
update_option( 'medium_crop', 0 );

update_option( 'medium_large_size_w', 1250 );
update_option( 'medium_large_size_h', 1250 );
update_option( 'medium_large_crop', 0 );

update_option( 'large_size_w', 2500 );
update_option( 'large_size_h', 5000 );
update_option( 'large_crop', 0 );

// prevent default media uploads by year/month //
//update_option( 'uploads_use_yearmonth_folders', 0 );

// media organization by post type
//add_filter( 'upload_dir', 'theme_custom_media_upload_directory' );
function theme_custom_media_upload_directory( $args ) {
    $id = isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : null;

    if (
        ( 'post' == get_post_type( $id ) ) OR
        ( 'page' == get_post_type( $id ) ) OR
        ( 'gallery' == get_post_type( $id ) ) 
    ) {
        $newdir = '/' . get_post_type( $id ) . '/' . date( 'Y/m', current_time( 'timestamp' ) );
    } else {
        $newdir = '/' . get_post_type( $id );
    }

    $args['path']   = str_replace( $args['subdir'], '', $args['path'] );
    $args['url']    = str_replace( $args['subdir'], '', $args['url'] );
    $args['subdir'] = $newdir;
    $args['path']  .= $newdir;
    $args['url']   .= $newdir;

    return $args;
}

// allow svg //
add_filter( 'upload_mimes', 'theme_allow_svg' );
function theme_allow_svg( $file_types ) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge( $file_types, $new_filetypes );
    
    return $file_types;
}