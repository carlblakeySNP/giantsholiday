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
                echo '<div class="slick-item" style="background-image:url('.get_sub_field('page_gallery_image').');">';

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
    <div class="container">
        <div class="grid">
            <div class="block-6">
                <h1 class="entry-title notop">
                    <?php the_title(); ?>
                </h1><!-- .entry-header -->
                <?php the_content(); ?>
            </div>
            <div class="block-2">
                <ul class="venue-details">
                    <?php if(get_field('dimentions')) : ?>
                        <li class="details-title">Dimensions</li>
                        <li><?php the_field('dimentions'); ?></li>
                    <?php endif; ?>
                    <?php if(get_field('seated')) : ?>
                        <li class="details-title">Seated</li>
                        <li><?php the_field('seated'); ?></li>
                    <?php endif; ?>
                    <?php if(get_field('reception')) : ?>
                        <li class="details-title">Reception</li>
                        <li><?php the_field('reception'); ?></li>
                    <?php endif; ?>
                    <?php if(get_field('rate')) : ?>
                        <li class="details-title">Rate</li>
                        <li><?php the_field('rate'); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php 
$plan_view = get_field('plan_view');
$elevation_view = get_field('elevation_view');
$floor_plan = get_field('floor_plan');
$floor_plan_pdf = get_field('floor_plan_pdf');

?>
<?php 
if($plan_view['url'] != '') :
    $num1 = 'block-full';
    if($elevation_view['url'] != '') {
        $num1 = 'block-2';
        $num2 = 'block-6';
    }
?>
<article class="plans">
    <div class="container">
        <div class="grid">
            <div class="<?php echo $num1; ?>">
                <div class="content">
                    <h3>Plan View</h3>
                    <a href="<?php echo $plan_view['url']; ?>" target="_blank"><img src="<?php echo $plan_view['url']; ?>" /></a>
                </div>
            </div>
            <?php if($elevation_view['url'] != '') : ?>
            <div class="<?php echo $num2; ?>">
                <div class="content">
                    <h3>Elevation View</h3>
                    <a href="<?php echo $elevation_view['url']; ?>" target="_blank"><img src="<?php echo $elevation_view['url']; ?>" /></a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php if($floor_plan['url'] != '') : ?>
        <div class="content">
            <h3>Floor Plan</h3>
            <a href="<?php echo $floor_plan_pdf; ?>" target="_blank">
                <img src="<?php echo $floor_plan['url']; ?>" />
            </a>
        </div>
    <?php endif; ?>
    </div>
</article>
<?php endif; ?>

    <?php if( have_rows('boxes') ): ?>
        <div class="container pad boxes">
            <?php while ( have_rows('boxes') ) : the_row(); ?>
                <?php 
                    $img = get_sub_field('box_image');
                ?>
                <div class="grid video-play">
                    <div class="block-2">
                        <a href="/">
                            <h3><?php the_sub_field('box_title'); ?></h3>
                            <p><?php the_sub_field('box_copy'); ?></p>
                            <p><a href="<?php the_sub_field('box_link'); ?>">Read More</a></p>
                        </a>
                    </div>
                    <div class="block-6" style="height:200px;background-image: url(<?php echo $img['sizes']['large']; ?>);">
                        
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
