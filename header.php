<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php
	if (!is_404()) {
		if(is_user_logged_in()){
			get_template_part('includes/header-top','content');
			get_template_part('includes/left-sidebar-content','content');
		}else{
			get_template_part('includes/login-content','content');
		}
	}
?>
<!--content area start-->
