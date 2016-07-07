<?php
/*
Template Name: Giants Contact
*/

get_header();

?>


 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php

//$content = apply_filters( 'wpautop', get_the_content() );

?>
	<div class="content top-text-hero">
         <div class="container pad">   
            <h2><?php the_title(); ?></h2>
            <p><?php echo apply_filters( 'wpautop', get_the_content() ); ?></p>
        </div>
    </div>
    <div class="content">

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
            <div class="grid text-group">
                <div class="block-2">
                    <a href="/">
                        <h3><?php the_field('secondary_content_title'); ?></h3>
                    </a>
                </div>
                <div class="block-6">
                    <?php the_field('secondary_content'); ?>
                </div>
            </div>
        </div>
        <div class="container pad">
            <?php 

            $contact_shortcode = get_field('contact_shortcode');
            echo do_shortcode($contact_shortcode); 

            ?>
        </div>

	</div>
<!-- Modal -->
<div class="modal" id="modal">
    <div class="videoWrapper">
        <iframe width="560" height="315" id="ytplayer" src="//www.youtube.com/embed/<?php echo $video_url; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<!-- /Modal -->
 <?php endwhile; endif; ?>


<?php get_footer(); ?>