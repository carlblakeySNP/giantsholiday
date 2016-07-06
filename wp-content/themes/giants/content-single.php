<?php
/**
 * @package Giants
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header"></div><!-- .entry-header -->

	<div class="container">
		<div class="entry-content">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-content -->

</article><!-- #post-## -->
