<?php
/*
Template Name: Giants Hompage
*/

get_header();

?>
<div id="HomeSlider">
    <div class="home-gallery">
<?php
    // query arguments
    $args=array(
        'post_type' => 'slide',
        'post_status' => 'publish',
        'group' => 'venues',
        'numberposts' => -1
    );

            // define loop
        $loop = new WP_Query( $args );
        $i = 0;
        while ($loop->have_posts()) : $loop->the_post();

            $url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
            $styles = 'style="background-image:url('.$url.');"';
            $hide_on_homepage = get_field("hide_on_homepage");
            if($hide_on_homepage == '') :


            // output list item
            ?>
                <div class="slick-item type_venues" id="slide<?php echo $i; ?>" <?php echo $styles; ?>>

<?php
$layout = get_field('layout_type');
if($layout == 'video'){
$source = 'https://www.youtube.com/embed/';
    if(get_field('video_souce') == 'Vimeo'){
       $source = 'https://player.vimeo.com/video/'; 
    }
    echo '<iframe width="100%" height="100%" src="'.$source.get_field('video_code').'/"  frameborder="0" allowfullscreen></iframe>';
}elseif($layout == 'footer'){
    echo '<div class="navarea">';
    echo '<div class="copy">';
    echo '<h2>'.get_the_title().'</h2>';
    echo get_the_content();
    echo $hide_on_homepage;
    echo '<p><a href='.get_field("button_link").' class="button">'.get_field("button_copy").'</a></p>'; 
    echo '</div>';
    echo '</div>';
}else{
    echo '<div class="overlay">';
    echo '<div class="overlay-left">';
    echo '<h2>'.get_the_title().'</h2>';
    echo get_the_content();
    echo '</div>';
    echo '<div class="overlay-right">';
    echo '<img src="'.get_field('slide_poster').'">';
    echo '</div>';
    echo '</div>';
}

?>


                </div>
            <?php
            endif;
            $i++;
        endwhile;
        
        // reset query
        wp_reset_query();


        // query arguments
        $args=array(
            'post_type' => 'slide',
            'post_status' => 'publish',
            'group' => 'services',
            'numberposts' => -1
        );

        // define loop
        $loop = new WP_Query( $args );
        while ($loop->have_posts()) : $loop->the_post();

            $url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
            $styles = 'style="background-image:url('.$url.');"';
            $hide_on_homepage = get_field("hide_on_homepage");
            if($hide_on_homepage != '1') :

            // output list item
            ?>
                <div class="slick-item type_services" id="slide<?php echo $i; ?>" <?php echo $styles; ?>>
<?php
$layout = get_field('layout_type');
$link = get_field("button_link");
$hide_on_homepage = get_field("hide_on_homepage");
if($link == ''){
    $link = get_field('hard_link');
}
if($hide_on_homepage != '1'){
    if($layout == 'video'){
        $source = 'https://www.youtube.com/embed/';
        if(get_field('video_souce') == 'Vimeo'){
           $source = 'https://player.vimeo.com/video/'; 
        }
        echo '<iframe width="100%" height="100%" src="'.$source.get_field('video_code').'/"  frameborder="0" allowfullscreen></iframe>';
    }elseif($layout == 'footer'){
        echo '<div class="navarea">';
        echo '<div class="copy">';
        echo '<h2>'.get_the_title().'</h2>';
        echo get_the_content();
        echo '<p><a href="'.$link.'" class="button">'.get_field("button_copy").'</a></p>'; 
        echo '</div>';
        echo '</div>';
    }else{
        echo '<div class="overlay">';
        echo '<div class="overlay-left">';
        echo '<h2>'.get_the_title().'</h2>';
        echo get_the_content();
        echo '</div>';
        echo '<div class="overlay-right">';
        echo '<img src="'.get_field('slide_poster').'">';
        echo '</div>';
        echo '</div>';
    }
}

?>
                </div>
            <?php
            endif;
            $i++;
        endwhile;
        
        // reset query
        wp_reset_query();



        // query arguments
        $args=array(
            'post_type' => 'slide',
            'post_status' => 'publish',
            'group' => 'events',
            'numberposts' => -1
        );

        // define loop
        $loop = new WP_Query( $args );
        while ($loop->have_posts()) : $loop->the_post();

            $url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
            $styles = 'style="background-image:url('.$url.');"';
            $hide_on_homepage = get_field("hide_on_homepage");
            if($hide_on_homepage != '1') :
            // output list item
            ?>
                <div class="slick-item type_events" id="slide<?php echo $i; ?>" <?php echo $styles; ?>>
<?php
$layout = get_field('layout_type');
$link = get_field("button_link");
$button_copy = get_field("button_copy");


    if($link == ''){
        $link = get_field('hard_link');
    }
    if($button_copy == ''){
        $button_copy = 'Learn More';
    }
    if($layout == 'video'){
        $source = 'https://www.youtube.com/embed/';
        if(get_field('video_souce') == 'Vimeo'){
           $source = 'https://player.vimeo.com/video/'; 
        }
        echo '<iframe width="100%" height="100%" src="'.$source.get_field('video_code').'/"  frameborder="0" allowfullscreen></iframe>';
    }elseif($layout == 'footer'){
        echo '<div class="navarea">';
        echo '<div class="copy">';
        echo '<h2>'.get_the_title().'</h2>';
        echo get_the_content();
        if($link != ''){
            echo '<p><br /><a href='.$link.' class="button">'.$button_copy.'</a></p>'; 
        }
        echo '</div>';
        echo '</div>';
    }else{
        echo '<div class="overlay">';
        echo '<div class="overlay-left">';
        echo '<h2>'.get_the_title().'</h2>';
        echo get_the_content();
        if($link != ''){
            echo '<p><br /><a href='.$link.' class="button">'.$button_copy.'</a></p>'; 
        }
        echo '</div>';
        echo '<div class="overlay-right">';
        echo '<img src="'.get_field('slide_poster').'">';
        echo '</div>';
        echo '</div>';
    }


?>
                </div>
            <?php
             endif;
            $i++;
        endwhile;

        // reset query
        wp_reset_query();


?>

    </div>
    <div class="stuck">
        <div class="slide-tabs">
            <a href="#" class="slider-tab venuesbutton active" id="venuesbutton">
                <i class="icon map-marker"></i> <span>Venues</span>
            </a>
            <a href="#" class="slider-tab servicesbutton" id="servicesbutton">
                <i class="icon calendar"></i> <span>Services</span>
            </a>
            <a href="#" class="slider-tab eventsbutton" id="eventsbutton">
                <i class="icon ticket"></i> <span>Events</span>
            </a>
        </div>
    </div>
</div>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="content">
		<div class="container pad">
        <br /><br />
			<div class="grid">
				<div class="block">
					<a href="/">
						<h3>About Giants Enterprises</h3>
					</a>
				</div>
				<div class="block-6">
                <?php the_content(); ?>
				</div>
			</div>
<?php 
                $video_title = get_field('video_title');
                $video_copy = get_field('video_copy');
                $video_url = get_field('video_url');

                if($video_url != '') :
            ?>
        <br /><br />
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
		</div>
	</div>
 <?php endwhile; endif; ?>

<?php if( have_rows('random_image') ): ?>
<div id="bottomcarousel">
    <div> 
        <ul class="bottomslides">
 
    <?php while( have_rows('random_image') ): the_row(); 
 
        // vars
        $image = get_sub_field('image_item');
 
        ?>
 
            <li class="slide" style="background-image:url(<?php echo $image ?>);"></li>
 
    <?php endwhile; ?>
 
        </ul>
    </div>
    <ul class="bottomnav-slide-nav"></ul>
</div>
<?php endif; ?>
<!-- Modal -->
<div class="modal" id="modal">
    <div class="videoWrapper">
        <iframe width="560" height="315" id="ytplayer" src="//www.youtube.com/embed/<?php echo $video_url; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<!-- /Modal -->
<?php get_footer(); ?>