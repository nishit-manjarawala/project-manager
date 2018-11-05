<?php
/*Style sheet*/
function project_manager_enqueue_styles() {
	wp_enqueue_style( 'material-icons-style','https://fonts.googleapis.com/icon?family=Material+Icons' );
    wp_enqueue_style( 'bootstrapstarter-style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'propeller-style', get_template_directory_uri().'/assets/css/propeller.min.css' );
    wp_enqueue_style( 'propeller-theme-style', get_template_directory_uri().'/themes/css/propeller-theme.css' );
    wp_enqueue_style( 'propeller-admin-style', get_template_directory_uri().'/themes/css/propeller-admin.css' );
    
}

/*Jquery sheet*/
function project_manager_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap-scripts', get_template_directory_uri().'/assets/js/bootstrap.min.js', $dependencies,'4.9.8', 'in_footer');
    wp_enqueue_script('bootstrap-propeller-scripts', get_template_directory_uri().'/assets/js/propeller.min.js', $dependencies,'4.9.8', 'in_footer');
    wp_enqueue_script('project-manager-scripts', get_template_directory_uri().'/assets/js/project-manager.js', $dependencies,'4.9.8', 'in_footer');
}
add_action( 'wp_enqueue_scripts', 'project_manager_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'project_manager_enqueue_scripts' );

/*add class for body*/
function theme_body_classes( $classes ) {
	$classes[] = 'body-custom';	
	if (is_404()) {
		$classes[] = 'body-404page';	
	}
	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

//login code
add_action( 'send_headers', 'check_is_user_login' );
function check_is_user_login() {
    global $wpdb;
	if(isset($_POST['_wpnonce'])){
		$retrieved_nonce = $_POST['_wpnonce'];	
		if(wp_verify_nonce($retrieved_nonce, 'theme_login_form' ) && isset($_POST['theme_login_button']) && isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
			wp_cache_delete(get_current_user_id(), 'users');			
			$username = $wpdb->escape($_POST['username']);  
			$password = $wpdb->escape($_POST['password']);
			$remember=false;
			if(isset($_POST['remember'])){
				$remember=true;
			}
			$login_data = array();
			$login_data['user_login'] = $username;  
			$login_data['user_password'] = $password;  
			$login_data['remember'] = $remember;
			$user_verify = wp_signon( $login_data, true );
			if(!is_wp_error($user_verify)){
				wp_set_auth_cookie($user_verify->ID);
				wp_safe_redirect(get_site_url());
				exit(); 
			}else{
				$_SESSION['error']=$user_verify->get_error_message();
			}
		}
		
		if(wp_verify_nonce($retrieved_nonce, 'theme_register_form' ) && isset($_POST['theme_signup_button']) && isset($_POST['username']) && isset($_POST['email']) && !empty($_POST['username']) && !empty($_POST['email'])){
			$user_login = $_POST['username'];
			$user_email = $_POST['email'];
			$errors = register_new_user($user_login, $user_email);
			if ( !is_wp_error($errors) ) {
				$redirect_to = !empty( $_POST['redirect_to'] ) ? $_POST['redirect_to'] : get_site_url();
				$_SESSION['error']="We have sent you email regarding your registeration please confirm it.";
				wp_safe_redirect( $redirect_to );
				exit();
			}else{
				$_SESSION['error']=$errors->get_error_message();
			}
		}
	}
}


//change login page url
add_action('init','theme_login_page');
function theme_login_page(){
	global $pagenow;	
	if( 'wp-login.php' == $pagenow && $_GET['action']!="logout") {
		wp_redirect(get_site_url());
		exit();
	}
}
//remove black bar
add_filter('show_admin_bar', '__return_false');

/*session for site*/
add_action('init', 'session_activator_start', 1);
add_action('wp_logout', 'session_activator_end');
add_action('wp_login', 'session_activator_end');
function session_activator_start() {
    if(!session_id()) {
        session_start();
    }
}
function session_activator_end() {
    session_destroy();
}