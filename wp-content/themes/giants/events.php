<?php
/**
 * @package Giants
 */
?>

<div class="slick-gallery events-header">
        <?php

        // query arguments
        $args=array(
            'name' => $slug,
            'post_type' => 'slide',
            'post_status' => 'publish',
            'group' => 'events',
            'sort_column'   => 'menu_order',
            'numberposts' => -1
        );

        // define loop
        $loop = new WP_Query( $args );
        while ($loop->have_posts()) : $loop->the_post();

            $url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
            $layout = get_field('layout_type');
            $img = get_field("slide_poster");
            $link = get_field("button_link");
            $button_copy = get_field("button_copy");
            if($link == ''){
                $link = get_field('hard_link');
            }
            if($button_copy == ''){
                $button_copy = 'Learn More';
            }
            // output list item
            if($layout == 'video') :
                 ?> <div class="slick-item type_events video" id="slide<?php echo $i; ?>"> <?php
                    $source = 'https://www.youtube.com/embed/';
                    if(get_field('video_souce') == 'Vimeo'){
                       $source = 'https://player.vimeo.com/video/';
                    }
                    echo '<iframe width="100%" height="100%" src="'.$source.get_field('video_code').'/"  frameborder="0" allowfullscreen></iframe>';

                ?>  </div>  <?php
            else:

                $styles = 'style="background-image:url('.$url.');"';

                ?> <div class="slick-item type_events" id="slide<?php echo $i; ?>" <?php echo $styles; ?>> <?php

                echo '<div class="overlay">';
                echo '<div class="overlay-left">';
                echo '<h2>'.get_the_title().'</h2>';
                echo get_the_content();
                if($link != ''){
                    echo '<p><br /><a href='.$link.' class="button">'.$button_copy.'</a></p>';
                }
                echo '</div>';
                echo '<div class="overlay-right">';
                echo '<img src="'.$img.'" />';
                echo '</div>';
                echo '</div>';

                ?>  </div>  <?php
            endif;

            $i++;
        endwhile;

        // reset query
        wp_reset_query();


?>

</div><!-- .entry-header -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="events">
        <div class="container">
            <div class="grid">
                <div class="block-2">
                    <?php the_title( sprintf( '<h1 class="entry-title notop"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
                </div>
                <div class="block-6">
                <div class="entry-content">
                    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'giants' ) ); ?>
                </div><!-- .entry-content -->
                </div>
            </div>
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
            <?php endif; ?>
        </div>
		<div class="content-items">
			<?php

            	// query arguments
                $args = array(
                    'post_type' => 'gevent',
                    'post_parent' => 0,
                    'post_status' => 'publish',
                    'sort_column'   => 'menu_order',
                    'numberposts' => -1,
                    'meta_query'    => array(
                        array(
                            'key'       => 'event_active',
                            'value'     => true,
                        ),
                    ),
                );

                // define loop
                $loop = new WP_Query( $args );

                while ($loop->have_posts()) : $loop->the_post();


                    $url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
                    $styles = 'style="background-image:url('.$url.');"';

					$date = get_field('event_date');
                    // output list item
                    ?>

                    <div class="content-item">
                    	<div class="container">
	                    	<div class="grid">
	                    		<div class="block-2 item-img" <?php echo $styles; ?>><a href="<?php the_permalink(); ?>"></a></div>
		                    	<div class="block-6">
		                    		<div class="item-text">
		                    			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                    			<h3><?php echo $date; ?></h3>
		                    			<div class="description"><?php the_excerpt(); ?></div>
		                    			<a href="<?php the_permalink(); ?>" class="button_box">Learn More</a>
		                    		</div>
		                    	</div>
	                    	</div>
                    	</div>
                    </div>

                   <?php

                endwhile;

                // reset query
                wp_reset_query();

			?>
		</div>
        <div class="container">
            <hr />
            <h1 class="entry-title notop">Recent Past Events</h1>

<?php
$args = array( 'order' => 'ASC',);

$terms = get_terms( 'eventyear', $args );
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
     foreach ( $terms as $term ) :
        
               // query arguments
                $args = array(
                    'post_type' => 'gevent',
                    'post_parent' => 0,
                    'post_status' => 'publish',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'numberposts' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'eventyear',
                            'field' => 'slug',
                            'terms' => $term->slug
                        )
                    ),
                    'meta_query'    => array(
                        array(
                            'key'       => 'event_active',
                            'value'     => 0,
                        ),
                    ),
                );

                // define loop
                $loop = new WP_Query( $args );

                if($loop->have_posts()) :
                    echo '<h3>'.$term->slug.'</h3>';  
                    ?>
                <?php

                    while ($loop->have_posts()) : $loop->the_post();

                        // output list item
                        // if(get_field('event_year') != '') :


?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
<?php
                        // endif;
                    endwhile;
                endif;
                // reset query
                wp_reset_query();

            ?>
            <br />
            <br />

<?php

     endforeach;
 endif;

 ?>
             <?php echo get_field('expired_event_copy'); ?>
            <br />
            <br />
        </div>
	</div>

</article><!-- #post-## -->
<!-- Modal -->
<div class="modal" id="modal">
    <div class="videoWrapper">
        <iframe width="560" height="315" id="ytplayer" src="//www.youtube.com/embed/<?php echo $video_url; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<!-- /Modal -->
