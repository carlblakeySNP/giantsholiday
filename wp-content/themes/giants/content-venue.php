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
                echo '<div class="slick-item" style="background-image:url('.get_sub_field('page_gallery_image')['sizes']['slideshow'].');">'.
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

		<h1 class="entry-title notop">
			<?php the_title(); ?>
		</h1><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	<?php 

		$args = array(
			'child_of' => $post->ID,
			'post_type' => 'venue',
    		'sort_column'   => 'menu_order'
		); 

        $venues = get_pages($args);

	?>
	    <div class="content-item venues">
	        <?php 
	        	$i = 0;
	        	foreach ($venues as $venue) : 
	        		if($i == 0) :
	        			$url = wp_get_attachment_image_src( get_post_thumbnail_id($venue->ID), 'large');

	        ?>
	        	<div class="grid-bind">
	        		<div class="top-item grid">
		        		<div class="block-6">
		        			<img src="<?php echo $url[0]; ?>" />
		        		</div>
		        		<div class="block-2">
		        			<div class="content">
		        				<h2><?php echo $venue->post_title; ?></h2>
		        				<p><?php echo $venue->post_excerpt; ?></p>
		        				<a href="<?php the_permalink($venue->ID); ?>" class="">Learn More &raquo;</a>
		        			</div>
		        		</div>
	        		</div>
	        	</div>
	        <?php else : 
	        	if($i == 1){
	        		echo '<div class="item grid3">';
	        	}
	        	$url = wp_get_attachment_image_src( get_post_thumbnail_id($venue->ID), 'medium' );

	        ?>

	        		<div class="block">
	        			<div class="grid-bind">
	        				<div class="image" style="background-image:url(<?php echo $url[0]; ?>);"></div>
	        				<div class="content">
	        					<h2><?php echo $venue->post_title; ?></h2>
	        					<p><?php echo $venue->post_excerpt; ?></p>
		        				<a href="<?php the_permalink($venue->ID); ?>" class="">Learn More &raquo;</a>
	        				</div>
	        			</div>
	        		</div>
	        <?php 

	        	if($i == count($venues)-1){
	        		echo '</div>';
	        	}
	        	endif; ?>
	        <?php

	        	$i++;
	        	endforeach; 
	        ?>

		</div><!-- .entry-content -->
	</div>


</article><!-- #post-## -->
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
<article class="addons">
	<div class="container">
		<h1 class="entry-title">Extra Bases</h1>
		<div class="grid3">


<?php $terms = wp_get_post_terms( $post->ID, 'addon'); 
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
