<?php
// jquery //
add_action( 'wp_enqueue_scripts', 'theme_remove_default_jquery' );
function theme_remove_default_jquery() {
    // Remove default  //
	//wp_deregister_script( 'jquery' );
    
    // Add custom  //
    //wp_register_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js", array(), '3.6.0', false );
    //wp_enqueue_script( 'jquery' );
}

// remove wp scripts //
add_action( 'wp_footer', 'theme_remove_scripts' );
function theme_remove_scripts(){
	//wp_dequeue_script( 'wp-embed' );
}

// remove wp css //
add_action( 'wp_print_styles', 'theme_remove_styles', 100 );
function theme_remove_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'theme_remove_global_styles' );
function theme_remove_global_styles(){
	wp_dequeue_style( 'global-styles' );
}

add_action( 'wp_enqueue_scripts', 'theme_remove_classic_styles', 20 );
function theme_remove_classic_styles() {
    wp_dequeue_style( 'classic-theme-styles' );
}

// generate random number to be added to enqueue scripts and CSS //
function theme_get_random() {
   $randomizr = rand( 1000, 1999 );
   return $randomizr;
}

$version_number = theme_get_random();
//$version_number = '-2022-10-13';
global $version_number;

// enqueue css //
add_action( 'wp_enqueue_scripts', 'theme_enqueue_css', 0 );
function theme_enqueue_css() {
    global $version_number;
}

// enqueue footer css //
add_action( 'wp_footer', 'theme_enqueue_footer_css' );
function theme_enqueue_footer_css() {
    global $version_number;
     
    // base //
    wp_enqueue_style( 'base', get_stylesheet_directory_uri() .'/inc/style/style.css', false, $version_number );

    // theme //
    wp_enqueue_style( 'theme', get_stylesheet_directory_uri() .'/inc/style/theme/style.css', false, $version_number );
}

// enqueue scripts //
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts', 90 );
function theme_enqueue_scripts() {
    global $version_number;

    wp_enqueue_script( 'script-header',  get_stylesheet_directory_uri() .'/inc/scripts/script-header.js', null, $version_number);
    wp_enqueue_script( 'script-footer',  get_stylesheet_directory_uri() .'/inc/scripts/script-footer.js', null, $version_number, true );
}

// favicon and theme //
//add_action( 'wp_head', 'theme_favicon_theme' );
function theme_favicon_theme() {
    global $version_number;
    global $custom_theme_color;
    
    ?>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo( 'template_directory' ); ?>/inc/favicons/apple-touch-icon.png?v=<?php echo $version_number?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo( 'template_directory' ); ?>/inc/favicons/favicon-32x32.png?v=<?php echo $version_number?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo( 'template_directory' ); ?>/inc/favicons/favicon-16x16.png?v=<?php echo $version_number?>">
        <link rel="manifest" href="<?php bloginfo( 'template_directory' ); ?>/inc/favicons/site.webmanifest?v=<?php echo $version_number?>">
        <link rel="mask-icon" href="<?php bloginfo( 'template_directory' ); ?>/inc/favicons/safari-pinned-tab.svg?v=<?php echo $version_number?>" color="<?php echo $custom_theme_color; ?>">
        
        <meta name="apple-mobile-web-app-title" content="<?php echo $custom_theme_color; ?>">
        <meta name="application-name" content="<?php echo get_bloginfo( 'name' );?>">
        
        <meta name="msapplication-TileColor" content="<?php echo $custom_theme_color; ?>">
        <meta name="theme-color" content="<?php echo $custom_theme_color ?>">
    <?php
}
