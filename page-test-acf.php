<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

acf_form_head();

get_header();
?>

<div class="form-content">
<?php
the_post();
the_content();


$posts = get_posts( array(
	

	'post_type' => 'form',
	'order'  => 'ASC',

) );

foreach( $posts as $post ){
	setup_postdata($post); ?>
 
<div class="posts-container">
	<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
</div>



<?php }

wp_reset_postdata(); 




?>
</div>
<?php
get_footer();