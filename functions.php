<?php 

/**
* Проста дебаг функція
**/
function debug($a){
	echo '<pre>';
	print_r($a);
	echo '<pre>';
}

/**
* Блок для підключення файлі Css i JS 
**/

add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );

function my_child_theme_scripts() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}




add_action('after_setup_theme', 'wp1_load_theme_setting');

function wp1_load_theme_setting(){
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
}

//Підключення шрифтів 

add_action('wp_enqueue_scripts', 'my_template_fonts');

function my_template_fonts(){
	//wp_enqueue_script( 'fontwesome', '//kit.fontawesome.com/3e35683809.js');
	wp_enqueue_script( 'ray-bootstrap-font-awesome', 'https://use.fontawesome.com/2460fd5fbc.js');
	wp_enqueue_style( 'ray-bootstrap-fot-awesome', "https://use.fontawesome.com/releases/v5.6.3/css/all.css" );
}

/**
* Реєстрація нового меню
**/

add_action( 'after_setup_theme', 'register_nav_menus_wp1' );

function register_nav_menus_wp1(){
	register_nav_menus( 
		[
		'wp1-menu-1' => 'Верхнє меню',
		'wp1-menu-2' => 'Нижнє меню'
		]	 
	 );
}



/**
* Реєстрація додаткового типу поста
**/

add_action('init', 'register_post_type_lessons');

function register_post_type_lessons(){
	$args = array(
		'labels' => array(
			'name'         => 'Уроки',
			'singular_name'=> 'Урок',
			'add_new'      => 'Добавити урок',
			'menu_name'    => 'Уроки',

		),
		'public'   		=> true,
		'supports' 		=> array('title', 'editor', 'thumbnail'),
		'menu_icon'		=> 'dashicons-welcome-learn-more',
	);

	register_post_type('lesson', $args);
}

add_action('init', 'register_taxonomy_by_lesson_post_type');

function register_taxonomy_by_lesson_post_type(){
	$args = [
		'label' => '',
		'labels'=> [
			'name'         =>      'Предмети',
			'singular_name'=>      'Предмет',
			'menu_name'    =>      'Предмет',
		],
		'hierarchical' => true,
	];

	register_taxonomy( 'subject', ['lesson'], $args);
}


//Рєстрація поста для показу форм
add_action('init', 'register_post_type_myform');

function register_post_type_myform(){
	$args = array(
		'labels' => array(
			'name'         		=> 'Форми',
			'singular_name'		=> 'Форма',
			'add_new'      		=> 'Додати форму',
			'menu_name'			=> 'Форми',

		),
		'public'   		=> true,
		'supports' 		=> array('title'),
		'menu_icon'		=> 'dashicons-feedback'
	);

	register_post_type( 'form', $args );
}

//Реєстрація тексономій для типу поста

add_action('init', 'register_taxonomy_by_myform_post_type');

function register_taxonomy_by_myform_post_type(){
	$args = array(
		'labal' => '',
		'labels' => array(
			'name' => 'Призначення',
			'singular_name' => 'Призначення',
			'menu_name' => 'Призначення',
			'add_new_item' => 'Добавити призначення',
		),
	);

	register_taxonomy( 'form_type', ['form'], $args );
}




////////////////////////////////////TEST function/Hooks
