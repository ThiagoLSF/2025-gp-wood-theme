<?php
/*
// menu order //
add_filter( 'custom_menu_order', function() {
	return true;
});

add_filter( 'menu_order', 'theme_change_admin_menu' );
function theme_change_admin_menu( $menu_order ) {
	$new_positions = array(
		'edit.php?post_type=record' 	=> 3,
		'edit.php?post_type=release'    => 4,
		'edit.php?post_type=video'  	=> 5,
		'edit.php?post_type=catalogue'	=> 6,
		'edit.php?post_type=person'     => 7,
		'edit.php?post_type=place'      => 8,
		'edit.php?post_type=gallery'	=> 9,
		'edit.php?post_type=page' 		=> 10,
		'edit.php?post_type=prebuilt'   => 11,
		'upload.php' 					=> 12,
	);
	
	function move_element( &$array, $a, $b ) {
		$out = array_splice( $array, $a, 1 );
		array_splice( $array, $b, 0, $out );
	}
	
	foreach( $new_positions as $value => $new_index ) {
		if ( $current_index = array_search( $value, $menu_order ) ) {
			move_element( $menu_order, $current_index, $new_index );
		}
	}
	
	return $menu_order;
};
*/

// menu items //
add_action( 'admin_menu', 'theme_remove_admin_menus' );
function theme_remove_admin_menus() {
	//remove_menu_page( 'admin.php?page=hostinger#home' );
	remove_menu_page( 'themes.php' );
	//remove_submenu_page( 'themes.php','customize.php?return=' . urlencode( wp_unslash ( $_SERVER['REQUEST_URI'] ) ) );
	remove_submenu_page( 'options-general.php','options-discussion.php' );
	//remove_submenu_page( 'options-general.php','options-privacy.php' );
}

// menu nav //
add_action( 'admin_menu', 'theme_change_menus_position' );
function theme_change_menus_position() {
    // add new menu page //
     add_menu_page(
       'Menus',
       'Menus',
       'edit_theme_options',
       'nav-menus.php',
       '',
       'dashicons-editor-ul',
       60
    );
}

// admin style //
add_action( 'wp_before_admin_bar_render', 'theme_admin_css' );
function theme_admin_css() { ?>
    <style>
		
	</style>
<?php }

// admin bar //
//add_filter( 'show_admin_bar', 'theme_remove_admin_bar' );
function theme_remove_admin_bar() {
	return false;
}

//add_action( 'admin_bar_menu', 'theme_remove_admin_bar_menus', 999);
function theme_remove_admin_bar_menus( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'customize' );
	$wp_admin_bar->remove_menu( 'site-editor' );
}

//add_action( 'login_enqueue_scripts', 'theme_login_css' );
function theme_login_css() { ?>
	<style>
		/* background colour */
		body.login {
			background-color: white;
		}
		
		/* logo */
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/custom/assets/images/logo-login.png);
			width: 320px;
			height: 131px;
			padding-bottom: 0;
			-moz-background-size: auto 80%;
			-webkit-background-size: auto 80%;
			background-size: auto 80%;
			background-repeat: no-repeat;
			background-position: center center;
		}
		*/
		
		/* box */
		body.login form {
			color: white;
			border: 0;
			background: <?php the_field( 'theme_color', 'option' ); ?>;
			border-radius: 3px;
		}
		
		/* submit button */
		body.login form input#wp-submit {
			background: <?php the_field( 'theme_color', 'option' ); ?>;
    		border-color: transparent;
		}
		
		/* link */
		body.login #nav a {
			color: <?php the_field( 'theme_color', 'option' ); ?>;
		}
	</style>
<?php }

//add_filter( 'login_headerurl', 'theme_login_logo_url' );
function theme_login_logo_url() {
	return home_url();
}

//add_filter( 'login_headertitle', 'theme_login_logo_title' );
function theme_login_logo_title() {
    //return 'Your Site Name and Info';
	return get_bloginfo( 'name' );
}