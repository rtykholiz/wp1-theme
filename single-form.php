<?php get_header(); ?>
<?php the_post();
switch(get_the_ID()){
	case '51':
		$class_name = 'acf-form-register-form';
	break;
	case '63':
		$class_name = 'acf-form-login-form';
	default: 
		echo "it's a default value";
}
	acf_form(array(
		'form_attributes' => array('class' => $class_name),
		'html_submit_button'  => '<input type="submit" class="acf-button button button-primary" value="Register" />',
	));

the_ID();
the_content();
?>
<?php get_footer(); ?>