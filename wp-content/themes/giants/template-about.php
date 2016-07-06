<?php
/*
Template Name: Giants About
*/

get_header();

?>


 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
			<div id="about" class="grid text-group">
				<div class="block-2">
					<a href="/">
						<h3>About Giants Enterprises</h3>
					</a>
				</div>
				<div class="block-6">
                    <?php the_content(); ?>
				</div>
			</div>
		</div>
        <?php if(get_field('secondary_content') != '') : ?>
         <div class="container pad">
            <div class="text-group about-below">
                <h3><?php the_field('secondary_content_title'); ?></h3>
                <?php the_field('secondary_content'); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="separation_image" style="background-image:url(<?php $separation_image = get_field('separation_image'); echo $separation_image['url']; ?>);"></div>
        <?php if(get_field('below') != '') : ?>
        <div class="container pad">
            <div class="text-group about-below">
                    <?php the_field('below'); ?>
            </div>
        </div>
        <?php endif; ?>

        <div id="directions" >
        </div>
	</div>
<script>
(function($) {
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
                $(self).css('background-position', 'center '+j+'%');
            }
        });
    }
    $(window).scroll( function(e){
      ch_scroll();
    });
})(jQuery);
</script>
<!-- Modal -->
<div class="modal" id="modal">
    <div class="videoWrapper">
        <iframe width="560" height="315" id="ytplayer" src="//www.youtube.com/embed/<?php echo $video_url; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<!-- /Modal -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>