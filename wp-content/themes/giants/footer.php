<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Giants
 */
?>

	</div><!-- #content -->

    <footer>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php 
            $showtop = get_field('footer_widget'); 
            if($showtop) :
        ?>

        <?php endif; ?>
    <?php endwhile; ?> 
<?php endif; ?>
        <div class="directions">
            <div class="container pad">
                <h1 class="entry-title notop">Directions To AT&T Park</h1>
                <p>Enter your starting address:</p>
                <form action="http://maps.google.com/maps" method="get" target="_blank">
                <input type="hidden" name="daddr" value="324 Willie Mays Plaza San Francisco, CA 94107 (AT&amp;T Park)" />
                <div class="grid">
                    <div class="block-6"><input type="text" name="saddr" /></div>
                    <div class="block-2"><input type="submit" value="Get Directions" /></div>
                </div>
                </form>
            </div>
        </div>
        <div class="footer-top" id="map">
        </div>

        <div class="footer-middle">
            <div class="container padding grid3">
                <?php dynamic_sidebar( 'footer-middle' ); ?>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container padding ">
                <div>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footnav' ) ); ?>
                    <div class="copyright"><?php dynamic_sidebar( 'social' ); ?></div>
                    <br />

                    <?php echo  do_shortcode('[contact-form-7 id="1200" title="Newsletter Email"]'); ?>


                    <br /><br />
                    <div class="copyright"><?php dynamic_sidebar( 'footer-bottom' ); ?></div>
                </div>
            </div>
        </div>  
    </footer>
</div>


<script src="<?php echo get_stylesheet_directory_uri(); ?>/build/js/main.min.js"></script>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.25.1/mapbox-gl.js'></script>
<script>

    mapboxgl.accessToken = 'pk.eyJ1IjoicmRhdmlzIiwiYSI6ImNpdThybXg1cTAwNnIyb3RxOGt5amF2bzIifQ.dIR470x1E_JrDsP7jjjmjw';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/rdavis/ciu8udbxb001p2ilftmbfm2pn', //stylesheet location
        center: [-122.3895,37.7785], // starting position
        zoom: 16 // starting zoom
    });
    map.scrollZoom.disable();
    map.addControl(new mapboxgl.Navigation());
    (function($) {
        setTimeout($('.mapboxgl-canvas').css({left:0,right:0,bottom:0,top:0}), 2000);
    })(jQuery);
</script>
<?php
if(is_front_page()) :
?>
<script>

(function($) {

    $('.home-gallery').slick({
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 6000,
            speed: 600,
            pauseOnHover: true
        });

        $('.home-gallery').on('afterChange', function(event, slick, currentSlide){
            if($('.slick-item.slick-active').hasClass('type_venues')){
                $('#venuesbutton').addClass('active').siblings().removeClass('active');
            }else if($('.slick-item.slick-active').hasClass('type_services')){
                $('#servicesbutton').addClass('active').siblings().removeClass('active');
            }else if($('.slick-item.slick-active').hasClass('type_events')){
                $('#eventsbutton').addClass('active').siblings().removeClass('active');
            }
        });

        $('.slide-tabs a').on('click', function(e){
            e.preventDefault();
            $(this).addClass('active').siblings().removeClass('active');
            var vi = $('.type_venues').length;
            var si = $('.type_services').length;
            if($(this).hasClass('venuesbutton')){
                $('.home-gallery').slick('slickGoTo', 0);
            }else if($(this).hasClass('servicesbutton')){
               $('.home-gallery').slick('slickGoTo', vi - 1 );
            }else if($(this).hasClass('eventsbutton')){
                $('.home-gallery').slick('slickGoTo', vi + si - 1);
            }
        });

        // Affix header on window
        function scrollHP(){
            $('.home-gallery').css('opacity',1);
            var h = document.body.clientHeight;
            var w = $(window).width();
            var sp = parseInt($(window).scrollTop(), 0);
            var sl = $('#HomeSlider');
            $('#HomeSlider').height($(window).height()-155);
            $('.slick-item').height($(window).height()-155);
            var so = sl.offset();
            var wh = parseInt(sl.height(), 0)-155;
            var t = so.top + wh - sp + 155;
            $('.bottomslides li').width(w);
            $('.inside-slider li').width(w);
        }


        $(window).scroll( function(e){
            scrollHP();
        });
        $(window).resize( function(e){
            scrollHP();
        });
        scrollHP();

})(jQuery);
</script>
<?php endif; ?>
<script>
(function($) {


    $('.hamburger').on('click', function(){
        console.log('clicked');
        var el = $('#page');
        if(el.hasClass('open')){
            el.removeClass('open');
        }else{
            el.addClass('open');
        }
    });
    is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
    is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
    is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
    is_safari = navigator.userAgent.indexOf("Safari") > -1;
    is_opera = navigator.userAgent.indexOf("Presto") > -1;
    is_mac = (navigator.userAgent.indexOf('Mac OS') != -1);
    is_windows = !is_mac;

    if (is_chrome && is_safari){
      is_safari=false;
    }

    if (is_safari || is_windows){
      $('#masthead').css('-webkit-text-stroke', '0.5px');
    }

})(jQuery);
</script>

<?php if($devmode == flase) :?>
<iframe src=" http://m.mlb.com/third_party_footer?c_id=sf&no_links=false" frameBorder="0" scrolling="no" style="background-color:#1e1e1e;width:100%; height:151px; overflow:hidden; border:none; margin:0 0 -10px 0;"></iframe>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
