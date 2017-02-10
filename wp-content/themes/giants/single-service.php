<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Giants
 */

get_header(); ?>

<div id="primary" class="content-area">
		
	<?php while ( have_posts() ) : the_post(); ?>

	<div class="container">
			<div class="entry-header"></div>

		<div class="entry-content">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-content -->
	<?php
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$styles = 'style="background-image:url('.$url.');"';
	?>

    <div class="separation_image" <?php echo $styles; ?>></div>
    <div class="separation_caption"><div class="container"><?php the_field('caption'); ?></div></div>

    <div class="container pad">
        <div class="grid text-group">
            <div class="block-2">
                <a href="/">
                    <h3><span>Case Study:</span><br /><?php the_field('case_study_title'); ?></h3>
                </a>
            </div>
            <div class="block-6">
                <?php the_field('case_study_content'); ?>
            </div>
        </div>
    </div>
    <div class="container pad">
        <?php 
            $video_title = get_field('video_title');
            $video_copy = get_field('video_copy');
            $video_url = get_field('video_url');

            if($video_url != '') :
        ?>
        <div class="video-play grid">
            <div class="block-6">
                <div class="block-wrap">
                    <h2><?php echo $video_title; ?></h2>
                    <p><?php echo $video_copy; ?></p>
                </div>
            </div>
            <div class="block-2">
                <div class="block-wrap">
                    <a href="#" class="button-play trigger-modal"><div class="arrow"></div></a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    
    <?php
        // check if the repeater field has rows of data
        if( have_rows('page_gallery') ):
            // loop through the rows of data
            echo '<div class="slick">';
            while ( have_rows('page_gallery') ) : the_row();
                // display a sub field value
                echo '<div class="slick-slide" style="background-image:url('.get_sub_field('page_gallery_image')['sizes']['slideshow'].');"></div>';
            endwhile;
            echo '</div>';
        else :
            // no rows found
        endif;
    ?>
    


	<?php endwhile; // end of the loop. ?>
</div><!-- #primary -->
<!-- Modal -->
<div class="modal" id="modal">
    <div class="videoWrapper">
        <iframe width="560" height="315" id="ytplayer" src="//www.youtube.com/embed/<?php echo $video_url; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<!-- /Modal -->
<?php get_footer(); ?>
