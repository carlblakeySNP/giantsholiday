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
                echo '<div class="slick-item" style="background-image:url('.get_sub_field('page_gallery_image').');">'.
					'<div class="caption">'.
						'<div class="container">'.
							'<div class="text">'.get_sub_field('page_gallery_caption').'</div>'.
							'<div class="triangle"></div>'.
						'</div>'.
					'</div>'.
				'</div>';
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
</article><!-- #post-## -->
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
<?php 
$terms = wp_get_post_terms( $post->ID, 'addon'); 
if($terms[0] != '') :
?>
<article class="addons">
	<div class="container">
		<h1 class="entry-title">Recommended Add-Ons</h1>
		<div class="grid3">


<?php 
foreach ($terms as $term) :
	//print_r($term);
	$termcall = 'addon_'.$term->term_id;
	$termimage = get_field('image', $termcall);
	$name = $term->name;
	$description = $term->description;
	$img = $termimage['sizes']['medium'];
?>
		<div class="block">
			<div class="content">
				<div class="image" style="background-image:url(<?php echo $img; ?>);"></div>
				<div class="content-wrap">
					<h3><?php echo $name; ?></h3>
					<p><?php echo $description; ?></p>
				</div>
			</div>
		</div>
<?php endforeach; ?>
		</div>
	</div>
</article>
<?php endif; ?>

<?php 
$show_catering = get_field('show_catering');
if($show_catering):
?>
<div class="catering">
	<div class="container">
		<?php if ( is_active_sidebar( 'center_content' ) ) : ?>
			<?php 
				dynamic_sidebar( 'center_content' );
			?>
		<?php endif; ?>
	</div>
</div>
<?php 
endif;
?>
	<div class="container">
		<h1 class="entry-title">More <?php echo get_the_title($post->post_parent); ?> Venues</h1>








                    <div class="grid3">

			<?php

            	// query arguments
                $args = array(
                    'post_type' => 'venue',
                    'post_status' => 'publish',
                    'post_parent' => $post->post_parent,
                    'posts_per_page' => 6
                );

                // define loop
                $loop = new WP_Query( $args );

                while ($loop->have_posts()) : $loop->the_post();

				$args = array(
					'child_of' => $loop->post->ID,
					'post_type' => 'venue'
				); 

                	$venues = get_pages($args);
                	$logo = get_field('venue_logo');

                    $url = wp_get_attachment_image_src( get_post_thumbnail_id($loop->post->ID), 'medium' );
                    $styles = 'style="background-image:url('.$url[0].');"';
                    // output list item
                    ?>

                    	<div class="block venue-item">
	                    	<div class="content">
	                    		<a href="<?php the_permalink(); ?>">
	                    			<h3><?php the_title(); ?></h3>
	                    			<div class="img" <?php echo $styles; ?> >
	                    			</div>
	                    		</a>
                    		</div>
                    	</div>

                   <?php

                endwhile;
                
                // reset query
                wp_reset_query();

			?>
                    </div>








	</div>
<article class="more-venues">

</article>