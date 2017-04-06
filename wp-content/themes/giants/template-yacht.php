<?php
/*
Template Name: Giants Yacht
*/

get_header();

?>

    <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'yacht', get_post_format() );
            ?>

        <?php endwhile; ?>

        <?php giants_paging_nav(); ?>

    <?php else : ?>

        <?php //get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

<script type="text/javascript">
(function($){   

    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            var topoffset = 100;
            target = target.length ? target : $('[id=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - topoffset
                }, 800 );
                return false;
            }
        }
    });

})(jQuery);    

</script>
<?php get_footer(); ?>
