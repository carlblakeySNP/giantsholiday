<?php 

function slideshow_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'count' => '-1',
		'group' => 'venues',
		'gallery' => '',
		'style' => 'two'
	), $atts ) );

	$args=array(
		'post_type' => 'slide',
		'post_status' => 'publish',
		'posts_per_page' => $count,
		'group' => $group
	);
	query_posts($args);
	$i = 0;

	$head = '<div class="jcarousel-wrapper">'."\r\n";
	$head .= '<div class="jcarousel">'."\r\n";

	$i = 0;
	$items = '<ul class="carousel-inner">'."\r\n";
	query_posts($args);
	while (have_posts()) : the_post();
		$active = '';
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if($i==0){
			$active = ' active';
		}
		$items .= '<li>'."\r\n";
		$items .= '<img src="'.$url.'" />'."\r\n";
		$items .= '</li>'."\r\n";
		$i++;
	endwhile;
	wp_reset_query();
	$items .= '</ul>'."\r\n";
	$foot = '</div>'."\r\n";
	$foot .= '<a href="#" class="jcarousel-control-prev">&lsaquo;</a>'."\r\n";
	$foot .= '<a href="#" class="jcarousel-control-next">&rsaquo;</a>'."\r\n";
	//$foot .= '<p class="jcarousel-pagination"></p>'."\r\n";
	$foot .= '</div>'."\r\n";

	add_action('wp_footer', 'add_jcarousel_js', 100);

	return $head.$items.$foot;

}

function add_jcarousel_js(){

	$script = '<script>'."\r\n";
	$script .= "$(function() {
        var jcarousel = $('.jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 600) {
                    width = width / 2;
                } else if (width >= 350) {
                    width = width;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href=\"#' + page + '\">' + page + '</a>';
                }
            });
    });"."\r\n";
	$script .= '</script>';
	echo $script;

}

add_shortcode( 'slideshow', 'slideshow_shortcode' );




function slick_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'count' => '-1',
		'group' => 'venues',
		'gallery' => '',
		'style' => 'two'
	), $atts ) );

	$args=array(
		'post_type' => 'slide',
		'post_status' => 'publish',
		'posts_per_page' => $count,
		'group' => $group
	);
	query_posts($args);

	$i = 0;
	$slick = '<div class="touch-slider">'."\r\n";
	query_posts($args);
	while (have_posts()) : the_post();
		$active = '';
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if($i==0){
			$active = ' active';
		}
		$layout = get_field('layout_type',$post->ID);

		if($layout == 'video') :
			$slick .= '<div class="slick-item video">'."\r\n";
            $source = 'https://www.youtube.com/embed/';
            if(get_field('video_souce') == 'Vimeo'){
               $source = 'https://player.vimeo.com/video/'; 
            }
            $slick .= '<iframe width="100%" height="100%" src="'.$source.get_field('video_code').'/"  frameborder="0" allowfullscreen></iframe>';
			$slick .= '</div>'."\r\n";

            ?>  </div>  <?php               
        else:
			$slick .= '<div class="slick-item" style="background-image:url('.$url.');">'."\r\n";
			$slick .= '<div class="slick-details"><div class="container"><h3>'.get_the_title().'</h3>'.get_the_content().'</div></div>';
			$slick .= '</div>'."\r\n";
		endif;
		$i++;
	endwhile;
	wp_reset_query();
	$slick .= '</div>'."\r\n";

	add_action('wp_footer', 'add_slick_js', 100);

	return $slick;

}

function add_slick_js(){

	$script = '<script>'."\r\n";
	$script .= "$( document ).ready(function() {
        $('.touch-slider').slick({
        	dots: true,
        	arrows: false,
        	autoplay: true,
        	pauseOnHover: false,
  			autoplaySpeed: 6000,
        }).on('click', function( e, slick, currentSlide ) {
    		$('.touch-slider').slick('slickPause');
		});
    });"."\r\n";
	$script .= '</script>';
	echo $script;

}

add_shortcode( 'slick', 'slick_shortcode' );

?>