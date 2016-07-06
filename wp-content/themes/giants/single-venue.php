<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Giants
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>
		<?php if(count($post->ancestors) == 0) : ?>
			<?php get_template_part( 'content', 'venue' ); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'subvenue' ); ?>	
		<?php endif; ?>
			<?php giants_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>