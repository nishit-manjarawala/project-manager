<?php
/*Style sheet*/
function project_manager_enqueue_styles() {
    wp_enqueue_style( 'bootstrapstarter-style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'propeller-style', get_template_directory_uri().'/assets/css/propeller.min.css' );
    wp_enqueue_style( 'propeller-theme-style', get_template_directory_uri().'/themes/css/propeller-theme.css' );
    wp_enqueue_style( 'propeller-admin-style', get_template_directory_uri().'/themes/css/propeller-admin.css' );
    wp_enqueue_style( 'material-icons-style','https://fonts.googleapis.com/icon?family=Material+Icons' );
}

/*Jquery sheet*/
function project_manager_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap-scripts', get_template_directory_uri().'/assets/js/bootstrap.min.js', $dependencies);
    wp_enqueue_script('bootstrap-propeller-scripts', get_template_directory_uri().'/assets/js/propeller.min.js', $dependencies);
}
add_action( 'wp_enqueue_scripts', 'project_manager_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'project_manager_enqueue_scripts' );