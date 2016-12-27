<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Giants
 */

get_header(); ?>

<div id="primary" class="content-area">
		
	<?php while ( have_posts() ) : the_post(); ?>
	<?php
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$styles = 'style="background-image:url('.$url.');"';
        $date = get_field('event_date');

	?>

    <div class="separation_image" <?php echo $styles; ?>></div>

    <div class="container pad">
    	<div class="entry-header"></div>

        <div class="grid text-group">
            <div class="block-2">
                <a href="/">
                    <h3><span><?php echo $date; ?></span><br /><?php the_title(); ?></h3>
                </a>
                <br />
                <?php if(get_field('event_active')) :?>
                    <a href="<?php the_field('link'); ?>" class="button_box" target="_blank"><?php the_field('button_text'); ?></a>
                <?php else: ?>
                <?php endif; ?>
<div class="social-grid">
    <a href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo $currentPostTitle; ?>&p[summary]=&p[url]=<?php echo $currentPostLink; ?>&p[images][0]=<?php echo urlencode($url); ?>"
  target="_blank" class="social-block facebook"><i class="fa fa-facebook"></i></a>
    <a href="http://twitter.com/intent/tweet?url=<?php echo $currentPostLink; ?>;text=<?php echo $currentPostTitle; ?>#wearegiants;size=l&amp;count=none" target="_blank" class="social-block twitter"><i class="fa fa-twitter"></i></a>
    <a href="https://plus.google.com/share?url=<?php echo $currentPostLink; ?>" target="_blank" class="social-block google"><i class="fa fa-google-plus"></i></a>
    <a href="http://pinterest.com/pin/create/button/?url=<?php echo $currentPostLink; ?>&media=<?php echo urlencode($url); ?>&description=<?php echo $currentPostLink; ?>" target="_blank" class="social-block pinterest"><i class="fa fa-pinterest-p"></i></a>
    <a href="mailto:?subject=<?php echo $currentPostTitle; ?>&body=<?php echo $currentPostLink; ?>" class="social-block envelope"><i class="fa fa-envelope"></i></a>
    <a href="http://api.addthis.com/oexchange/0.8/offer?url=<?php echo $currentPostLink; ?>" target="_blank" class="social-block share"><i class="fa fa-share-alt"></i></a>
</div>
            </div>
            <div class="block-6">
                <?php the_content(); ?>
                <?php the_field('event_secondary_content'); ?>
                <br /><br />
            </div>
        </div>
    </div>
    <?php
		$gallery = get_field('gallery_shortcode');
		if($gallery != '') :
    ?>
	<div id="page-slider">
		<ul class="theslider">
		<?php

		if($gallery){
			$gallery = str_replace('[gallery ids=&quot;', '', $gallery);
			$gallery = str_replace('&quot;]', '', $gallery);
			$gallArr = explode(",",$gallery);

			foreach ($gallArr as $value) {
				$img  = wp_get_attachment( $value );
				echo '<li style="background-image:url('.$img['src'].');" data-caption="'.$img['caption'].'"></li>';
			}
		}
		?>
		</ul>
		<ul class="slide-nav"></ul>
	</div>
	<?php endif; ?>

    <?php
        // check if the repeater field has rows of data
        if( have_rows('footer_gallery') ):
            // loop through the rows of data
            echo '<div class="slick">';
            while ( have_rows('footer_gallery') ) : the_row();
                // display a sub field value
                echo '<div class="slick-slide" style="background-image:url('.get_sub_field('footer_gallery_image').');"></div>';
            endwhile;
            echo '</div>';
        else :
            // no rows found
        endif;
    ?>
    

	<?php endwhile; // end of the loop. ?>
</div><!-- #primary -->

<?php get_footer(); ?>