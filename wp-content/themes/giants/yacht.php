<?php
/**
 * @package Giants
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
                echo '<div class="slick-item" style="background-image:url('.get_sub_field('page_gallery_image')['sizes']['large'].');">';

                if(get_sub_field('page_gallery_video_code') != ''){

	                $source = 'https://www.youtube.com/embed/';
	                if(get_sub_field('page_gallery_video_type') == 'Vimeo'){
	                   $source = 'https://player.vimeo.com/video/'; 
	                }
	                echo '<iframe width="100%" height="100%" src="'.$source.get_sub_field('page_gallery_video_code').'/"  frameborder="0" allowfullscreen></iframe>';

                }else{

					echo '<div class="caption">'.
							'<div class="container">'.
								'<div class="text">'.get_sub_field('page_gallery_caption').'</div>'.
								'<div class="triangle"></div>'.
							'</div>'.
						'</div>';
				}

				echo '</div>';
            endwhile;
            echo '</div>';
        else :
            // no rows found
        endif;
    ?>
	</div><!-- .entry-header -->
    <div id="about"></div>
	<div id="venues" class="container">
		<div class="grid">
				<?php the_title( sprintf( '<h1 class="entry-title notop"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'giants' ) ); ?>
			</div><!-- .entry-content -->

		</div>

	</div>
    <div id="yacht"></div>
    <?php if( have_rows('boxes') ): ?>
        <div class="container pad boxes">
            <?php while ( have_rows('boxes') ) : the_row(); ?>

                <?php if(!get_sub_field('choose_content_type')) : ?>

                    <?php 
                        $img = get_sub_field('box_image');
                    ?>
                    <div class="grid video-play">
                        <div class="block-2">
                            <a href="/">
                                <h3><?php the_sub_field('box_title'); ?></h3>
                            </a>
                                <p><?php the_sub_field('box_copy'); ?></p>
                                <p><a href="<?php the_sub_field('box_link'); ?>">Read More</a></p>
                            
                        </div>
                        <div class="block-6" style="height:200px;background-image: url(<?php echo $img['sizes']['large']; ?>);">
                            
                        </div>
                    </div>
               
                <?php else: ?>
                    <div class="grid video-play">
                        <?php 
                            $post_type = get_sub_field('post_type'); 
                            $img = wp_get_attachment_image_src( get_post_thumbnail_id($post_type->ID), 'large');
                        ?>

                        <div class="block-2">
                            
                                <a href="<?php echo get_permalink($post_type->ID); ?>"><h3><?php echo $post_type->post_title; ?></h3></a>
                                <p><?php echo $post_type->post_content; ?></p>
                                <p><a href="<?php echo get_permalink($post_type->ID); ?>">Read More</a></p>
                            
                        </div>
                        <div class="block-6" style="height:200px;background-image: url(<?php echo $img[0]; ?>);">
                            
                        </div>
                    </div>
                    
                <?php endif; ?>
            <?php endwhile; ?>
        </div>

    <?php endif; ?>




    <?php if( have_rows('text_slideshow') ): ?>
        <div id="text-slideshow">
            <?php while ( have_rows('text_slideshow') ) : the_row(); ?>
            <?php 
                $title = get_sub_field('title'); 
                $copy = get_sub_field('copy');
                $image = get_sub_field('image');
            ?>

        <div class="large-feature" style="background-image: url(<?php echo $image['sizes']['large']; ?>);">
            <div class="container">
                <div class="box">
                    <h3><?php echo $title; ?></h3>
                    <?php echo $copy; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <?php 
        $title = get_field('title'); 
        $copy = get_field('copy');
        $image = get_field('image');
    ?>
    <div id="experience"></div>
    <?php if($title) : ?>
        <div class="large-feature" style="background-image: url(<?php echo $image['sizes']['large']; ?>);">
            <div class="container">
                <div class="box">
                    <h3><?php echo $title; ?></h3>
                    <?php echo $copy; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    </div>

<div id="events"></div>
    <?php if( have_rows('blocks') ): ?>
        <div class="addons">
            <div class="container">
                <h1 class="entry-title">Private Events</h1>
                <div class="grid3 blocks">
                <?php while ( have_rows('blocks') ) : the_row(); ?>
                    <?php 
                        $title = get_sub_field('title'); 
                        $copy = get_sub_field('copy');
                        $image = get_sub_field('image');
                    ?>
                     <div class="block">
                        <div class="content">
                            <div class="image" style="background-image:url(<?php echo $image['sizes']['large']; ?>);"></div>

                            <div class="content-wrap">
                                <h3><?php echo $title; ?></h3>
                                <?php echo $copy; ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if( have_rows('multiple_galleries') ): ?>
       <div class="gray-background addons">
            <div class="container">
                <h1 class="entry-title">Gallery</h1>
                <div class="grid3 blocks">
                <?php while ( have_rows('multiple_galleries') ) : the_row(); ?>
                    <?php 
                        $images = array();
                    ?>
                    <?php while ( have_rows('new_gallery') ) : the_row(); ?>
                    <?php 
                        $imgArray = get_sub_field('image');
                        array_push($images, $imgArray['sizes']['large']);
                    ?>
                    <?php endwhile; ?>
                    <?php 
           
                    $comma_separated = implode(",", $images);
                    ?>
                     <div class="block">
                        <div class="galleries">
                            <div class="image" style="background-image:url(<?php echo $images[0]; ?>);" data-gallery="<?php echo $comma_separated; ?>"></div>
                        </div>
                    </div>

                <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</article>

<script>
    (function($){
        $('.galleries .image').each(function(){
            $(this).on('click', function(){
                var gallery = $(this).data('gallery').split(',');
                var imagesEl = '';
                $.each(gallery, function( index, value ){
                    imagesEl += '<div class="img"><img src="'+value+'" /></div>';
                });
                var galleryEl = $('<div class="modal-gallery"><div class="close"><i class="fa fa-close"></i></div><div class="container"><div id="gal">'+imagesEl+'</div></div></div>');
                $( "body" ).append( galleryEl );
                var close = galleryEl.find('.close');
                $('#gal').slick();
                close.on('click', function(){
                    $('.modal-gallery').remove();
                });

            });
        });


    })(jQuery)
</script>
