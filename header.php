<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php 

	acf_form_head();


	wp_head() ?>
</head>
<body>
	<div class="main-wrapper">
	<div class="wrapper-menu"><?php



if(get_post_type(get_the_ID()) == 'form')
{
	echo 'this is form post type';
}
if(get_post_type(get_the_ID()) == 'lesson'){
	echo 'this is lesson post type';
}


	 wp_nav_menu( [
		'theme_location' => 'wp1-menu-1',
		
		] ) ?></div>