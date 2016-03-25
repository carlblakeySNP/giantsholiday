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
                <h1 class="entry-title notop">Directions <br />To AT&T Park</h1>
                <p>Enter your starting address:</p>
                <form action="http://maps.google.com/maps" method="get" target="_blank">
                <input type="hidden" name="daddr" value="324 Willie Mays Plaza San Francisco, CA 94107 (AT&amp;T Park)" />
                <div class="grid">
                    <div class="block-6"><input type="text" name="saddr" /></div>
                    <div class="block-2"><input type="submit" value="Get Directions" /></div>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <iframe width='100%' height='500px' frameBorder='0' src='https://a.tiles.mapbox.com/v3/jcnh74.ikf4e7k8/attribution.html'></iframe>
        </div>

        <div class="footer-middle">
            <div class="container padding grid3">
                <?php dynamic_sidebar( 'footer-middle' ); ?>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container padding grid">
                <div class="block-6">
                    <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footnav' ) ); ?>
                </div>
                <div class="block-2">
                    <div class="copyright"><?php dynamic_sidebar( 'footer-bottom' ); ?></div>
                </div>
            </div>
        </div>  
    </footer>
</div>

<?php
if(is_front_page()) :
?>
<script>

$(function() {

    $('.home-gallery').slick({
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 6000,
            speed: 600,
            pauseOnHover: false
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
            //sl.find('.inside-slider li').height(h);
            
            if(h >= t){
                $('.stuck').css('position','absolute'); 
            }else{
                $('.stuck').css('position','fixed');  
            }
            if(sp > 112){
                $('header').css({
                    position: 'fixed',
                    top: -112
                });
            }else{
                $('header').css({
                    position: 'absolute',
                    top: 0
                }); 
            }
        }


        $(window).scroll( function(e){
            scrollHP();
        });
        $(window).resize( function(e){
            scrollHP();
        });
        $(window).load( function(e){
            scrollHP();
            $('#HomeSlider').addClass('on');

        });

});


</script>
<?php endif; ?>
<script>
$(function() {

    $('.hamburger').on('click', function(){
        console.log('clicked');
        var el = $('#page');
        if(el.hasClass('open')){
            el.removeClass('open');
        }else{
            el.addClass('open');
        }
    });
});


</script>
<iframe src=" http://m.mlb.com/third_party_footer?c_id=sf&no_links=false" frameBorder="0" scrolling="no" style="background-color:#1e1e1e;width:100%; height:151px; overflow:hidden; border:none; margin:0 0 -10px 0;"></iframe>

<?php wp_footer(); ?>
</body>
</html>
