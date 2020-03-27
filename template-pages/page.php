<?php get_header(); ?>

<?php the_post(); ?>
<div class="content-main">
	<div class="item item-thumbnail"><?php if(has_post_thumbnail()) the_post_thumbnail( ); ?></div>
	<div class="item item-content"><?php the_content(); ?></div>
</div>

<?php get_footer(); ?>