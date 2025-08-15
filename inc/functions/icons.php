<?php
// fontawesome //
$font_awesome_style = 'sharp-duotone-light';

function font_awesome_style() {
    global $font_awesome_style;

    if ( $font_awesome_style == 'solid' ) return 'fa-solid';
    if ( $font_awesome_style == 'regular' ) return 'fa-regular';
    if ( $font_awesome_style == 'light' ) return 'fa-light';
    if ( $font_awesome_style == 'thin' ) return 'fa-thin';

    if ( $font_awesome_style == 'sharp-solid' ) return 'fa-sharp fa-solid';
    if ( $font_awesome_style == 'sharp-regular' ) return 'fa-sharp fa-regular';
    if ( $font_awesome_style == 'sharp-light' ) return 'fa-sharp fa-light';
    if ( $font_awesome_style == 'sharp-thin' ) return 'fa-sharp fa-thin';

    if ( $font_awesome_style == 'duotone-solid' ) return 'fa-duotone fa-solid';
    if ( $font_awesome_style == 'duotone-regular' ) return 'fa-duotone fa-regular';
    if ( $font_awesome_style == 'duotone-light' ) return 'fa-duotone fa-light';
    if ( $font_awesome_style == 'duotone-thin' ) return 'fa-duotone fa-thin';

    if ( $font_awesome_style == 'sharp-duotone-solid' ) return 'fa-sharp-duotone fa-solid';
    if ( $font_awesome_style == 'sharp-duotone-regular' ) return 'fa-sharp-duotone fa-regular';
    if ( $font_awesome_style == 'sharp-duotone-light' ) return 'fa-sharp-duotone fa-light';
    if ( $font_awesome_style == 'sharp-duotone-thin' ) return 'fa-sharp-duotone fa-thin';
}

// fontawesome - enqueue //
add_action( 'wp_enqueue_scripts', 'theme_enqueue_font_awesome', 90 );
function theme_enqueue_font_awesome() { 
    global $version_number;
    global $font_awesome_style;

    $scripts_url = get_stylesheet_directory_uri() . '/inc/icons/font-awesome/';
    
    // style //
    wp_register_script( 'font-awesome-style', $scripts_url . $font_awesome_style . '.min.js', null, $version_number );
    wp_enqueue_script( 'font-awesome-style' );

    // brands //
    wp_register_script( 'font-awesome-brands', $scripts_url . 'brands.min.js', null, $version_number );
    wp_enqueue_script( 'font-awesome-brands' );

    // font awesome //
    wp_register_script( 'font-awesome', $scripts_url . 'fontawesome.min.js', null, $version_number );
    wp_enqueue_script( 'font-awesome' );
}

// fontawesome - control panel //
add_action( 'wp_before_admin_bar_render', 'theme_admin_font_awesome' );
function theme_admin_font_awesome() { 
    $scripts_url = get_stylesheet_directory_uri() . '/inc/icons/';

    // Style //
    wp_register_script( 'panel-font-awesome-style', $scripts_url . 'solid.min.js', null, null );
    wp_enqueue_script( 'panel-font-awesome-style' );

    // Font Awesome //
    wp_register_script( 'panel-font-awesome', $scripts_url . 'fontawesome.min.js', null, null );
    wp_enqueue_script( 'panel-font-awesome' );
}

// component icon //
function icon_base($icon) {
    // <i class="fa-thin fa-arrow-right"></i>
    echo '<i class="'. font_awesome_style() . ' fa-' . esc_attr($icon) . '"></i>'; // Font Awesome markup
}

// custom icons //
function icon_close() {
    $icon = 'xmark';
    
    echo '<i class="';
        echo font_awesome_style();
        echo ' fa-';
        echo $icon;
    echo '"></i>';
}

function icon_loading() {
    echo 'circle';
}

function icon_flickity_arrow() {
    echo 'arrowShape:  "M30.6,77.8l1.6-1.6c1-1,1-2.7,0-3.8L13.4,53.8h83.9c1.5,0,2.7-1.2,2.7-2.7v-2.2c0-1.5-1.2-2.7-2.7-2.7H13.4l18.7-18.6c1-1,1-2.7,0-3.8l-1.6-1.6c-1-1-2.7-1-3.8,0l-26,25.9c-1,1-1,2.7,0,3.8l26,25.9C27.8,78.8,29.5,78.8,30.6,77.8z",';
}

function icon_search() {
    $icon = 'magnifying-glass';
    
    echo '<i class="';
        echo font_awesome_style();
        echo ' fa-';
        echo $icon;
    echo '"></i>';
}

function icon_submenu() {
    $icon = 'chevron-down';
    
    echo '<i class="';
        echo font_awesome_style();
        echo ' fa-';
        echo $icon;
    echo '"></i>';
}