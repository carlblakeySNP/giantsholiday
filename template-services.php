<?php
/*
Template Name: Giants Services
*/

get_header();

?>

    <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
            ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
    <?php
        // check if the repeater field has rows of data
        if( have_rows('page_gallery') ):
            // loop through the rows of data
            echo '<div class="slick-gallery">';
            while ( have_rows('page_gallery') ) : the_row();
                // display a sub field value
                echo '<div class="slick-item" style="background-image:url('.get_sub_field('page_gallery_image').');">';

                if(get_sub_field('page_gallery_video_code') != ''){

                    $source = 'https://www.youtube.com/embed/';
                    if(get_sub_field('page_gallery_video_type') == 'Vimeo'){
                       $source = 'https://player.vimeo.com/video/'; 
                    }
                    echo '<iframe width="100%" height="100%" src="'.$source.get_sub_field('page_gallery_video_code').'/"  frameborder="0" allowfullscreen></iframe>';

                }else{

                    // echo '<div class="caption">'.
                    //         '<div class="container">'.
                    //             '<div class="text">'.get_sub_field('page_gallery_caption').'</div>'.
                    //             '<div class="triangle"></div>'.
                    //         '</div>'.
                    //     '</div>';
                }

                echo '</div>';
            endwhile;
            echo '</div>';
        else :
            // no rows found
        endif;
    ?>

    </div><!-- .entry-header -->

    <div class="services">
        <div class="container">
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
            <br />
            <br />
            <?php endif; ?>
            <div class="grid">
                <div class="block-2">
                    <h1 class="entry-title notop right-buffer"><?php the_field( 'sub_title' ); ?></h1>
                </div>
                <div class="block-6">
                    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'giants' ) ); ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-group">
                    <?php the_field('below'); ?>
            </div>
        </div>
        <div class="separation_image" style="background-image:url(<?php $separation_image = get_field('separation_image'); echo $separation_image['url']; ?>);"></div>

        <div id="park" class="container pad">
            <div class="grid text-group" style="padding-top:0;">
                <div class="block-6">
                    <h3 class="entry-title notop"><?php the_field('secondary_content_title'); ?></h3>
                    <?php the_field('secondary_content'); ?>

                </div>
            </div>
        </div>
        <?php
        // check if the repeater field has rows of data
        $script = '';
        if( have_rows('services_case_studies') ):
            // loop through the rows of data
            $i = 0;
            $j = 0;
            while ( have_rows('services_case_studies') ) : the_row();
                // display a sub field value
            echo '<div class="case-study" id="cs'.$i.'">';
                if(get_sub_field('case_study_slideshow')){
                    
                    $slides = get_sub_field('case_study_slideshow');
                    
                    
                    if(count($slides) > 1 ){
                        echo '<div class="slideshow show'.$j.'">';
                        foreach($slides as $slide){
                            echo '<div class="slide" style="background-image:url('.$slide['case_study_slideshow_image'].');"></div>';
                        }
                        echo '</div>';
                        $script .= "$('.show".$j."').slick({dots: false,arrows: true,autoplay: true,autoplaySpeed: 6000,speed: 600,pauseOnHover: false});";
                        $j++;
                    }
                    
                    
                }else{
                    echo '<div class="separation_image" style="background-image:url('.get_sub_field('case_study_image').');"></div>';
                }

                echo '<div style="padding-bottom:40px;">'.
                        '<div class="container pad">'.
                            '<div class="grid">'.
                                '<div class="block-2">'.
                                    '<h1 class="entry-title notop right-buffer">'.get_sub_field('case_study_title').'</h1>'.
                                    '<div class="case-study-details">'.get_sub_field('case_study_details').'</div>'.
                                '</div>'.
                                '<div class="block-6">'.get_sub_field('case_study_description').'</div>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                '</div>';
                        echo '</div>';

                        $i++;
            endwhile;
        else :
            // no rows found
        endif;
    ?>
    </div>
</article><!-- #post-## -->

        <?php endwhile; ?>

        <?php giants_paging_nav(); ?>

    <?php else : ?>

        <?php //get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>
<!-- Modal -->
<div class="modal" id="modal">
    <div class="videoWrapper">
        <iframe width="560" height="315" id="ytplayer" src="//www.youtube.com/embed/<?php echo $video_url; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<!-- /Modal -->
<script>
(function($) {
<?php echo $script; ?>
    
    function ch_scroll(){
        var h = parseInt($(window).height(), 0),
        w = parseInt($(window).width(), 0),
        sp = parseInt($(window).scrollTop(), 0),
        np = 1-(sp/h);
        $('.separation_image').each(function(){
            var self = $(this);
            var el = $(self).offset();
            var elt = sp - (el.top-h);
            if(elt > 0){
                var j = 100 - (elt/h*100);
                $(self).css({
                    backgroundPosition: 'center '+j+'%',
                    //height: (h-100)+'px'
                });
            }
        });
        isw = $('.issuuembed').parent().width();
        $('.issuuembed').css({
            width: isw,
            height: isw * 0.62
        });
    }
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            //$(this).parent().addClass('active').siblings().removeClass('active');
            var target = $(this.hash);
            var topoffset = fh;
            target = target.length ? target : $('[id=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - topoffset
                }, 800 );
                return false;
            }
        }
    });
    $(window).scroll( function(e){
      ch_scroll();
    });
    $(window).resize( function(e){
      ch_scroll();
    });
    $(window).load( function(e){
      ch_scroll();
    });
})(jQuery);
</script>

<?php get_footer(); ?>