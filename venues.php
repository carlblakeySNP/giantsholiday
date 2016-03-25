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

	<div id="venues" class="container">
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
            <br />
            <?php endif; ?>
		<div class="content-items">
			<?php

            	// query arguments
                $args = array(
                    'post_type' => 'venue',
                    'post_parent' => 0,
                    'post_status' => 'publish',
                    'numberposts' => -1
                );

                // define loop
                $loop = new WP_Query( $args );

                while ($loop->have_posts()) : $loop->the_post();

				$args = array(
					'child_of'  => $loop->post->ID,
					'post_type' => 'venue',
    				'sort_column'   => 'menu_order'
				); 

                	$venues = get_pages($args);
                	$logo = get_field('venue_logo');

                    $url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
                    $styles = 'style="background-image:url('.$url.');"';
                    // output list item
                    ?>

                    <div class="content-item grid">
                    	<div class="block-2 item-text"><a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    		<ul>
		                    	<?php
		                    		foreach ($venues as $venue) {
		                    			echo '<li class="venue"><a href="'.get_permalink( $venue->ID).'">'.$venue->post_title.'</a></li>';
		                    		}
		                    	?>
                    		</ul>
                    	</div>
                    	<div class="block-6 item-img" <?php echo $styles; ?>><a href="<?php echo get_permalink($loop->post->ID); ?>"><img src="<?php echo $logo['url']; ?>" /></a></div>

                    </div>

                   <?php

                endwhile;
                
                // reset query
                wp_reset_query();

			?>
		</div>
	</div>

	<div id="rates" class="rate-table">
		<div class="container pad">
			<table>
				<thead>
					<tr>
						<td>Location</td>
						<td>Venue</td>
						<td>Floor Plan</td>
						<td>Seated</td>
						<td>Reception</td>
						<td>Rate</td>
					</tr>
				</thead>
				<tbody>
				<?php 
            	// query arguments
                $args = array(
                    'post_type' => 'venue',
                    'post_status' => 'publish',
     				'sort_column'   => 'menu_order',
                    'posts_per_page' => -1
                );

                // define loop
                $loop = new WP_Query( $args );

                while ($loop->have_posts()) : $loop->the_post();


                $location = get_field('location');
                $venue_name = get_the_title();
                $dimentions = get_field('dimentions');
                $seated = get_field('seated');
                $reception = get_field('reception');
                $rate = get_field('rate');
                $floor_plan_pdf = get_field('floor_plan_pdf');

	                if($location == ''){
	                	$location = '';
	                }

	                if($dimentions == ''){
	                	$dimentions = '';
	                }

	                if($seated == ''){
	                	$seated = '';
	                }

	                if($reception == ''){
	                	$reception = '';
	                }

	                if($rate == ''){
	                	$rate = '';
	                }

	                $floor_plan = '';
	                if($floor_plan_pdf != ''){
	                	$floor_plan = '<a href="'.$floor_plan_pdf.'" target="_blank">download</a>';
	                }else{
	                	$floor_plan = '';
	                }

	                if($post->post_parent == 0){
	                	$location = '<strong>'.$location.'</strong>';
                		$venue_name = '<strong>'.$venue_name.'</strong>';
                		$dimentions = '<strong>'.$dimentions.'</strong>';
                		$seated = '<strong>'.$seated.'</strong>';
                		$reception = '<strong>'.$reception.'</strong>';
                		$rate = '<strong>'.$rate.'</strong>';
                		$floor_plan_pdf = '<strong>'.$floor_plan_pdf.'</strong>';
                	}


					echo '<tr>'."\r\n";
						echo '<td>'.$location.'</td>'."\r\n";
						echo '<td>'.$venue_name.'</td>'."\r\n";
						//echo '<td>'.$dimentions.'</td>'."\r\n";
						echo '<td>'.$floor_plan.'</td>'."\r\n";
						echo '<td>'.$seated.'</td>'."\r\n";
						echo '<td>'.$reception.'</td>'."\r\n";
						echo '<td>'.$rate.'</td>'."\r\n";
					echo '</tr>'."\r\n";
                endwhile;
                
                // reset query
                wp_reset_query();
				?>
				</tbody>
			</table>				
		</div>
	</div>
    <div id="policies" class="container pad">
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
    <div class="slick-header" id="local-attractions"><div class="container"><h3>Local Attractions</h3></div></div>
	<div id="slick-wrap">
		<?php echo do_shortcode('[slick group="attractions"]'); ?>
	</div>
</article><!-- #post-## -->
<!-- Modal -->
<div class="modal" id="modal">
    <div class="videoWrapper">
        <iframe width="560" height="315" id="ytplayer" src="//www.youtube.com/embed/<?php echo $video_url; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<!-- /Modal -->
