<?php
/*
Template Name: Giants Timeline
*/

get_header();

?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

<?php if( have_rows('timeline') ): ?>
<div id="Timeline">
    <div class="container">
    <h1><?php echo get_field('sub_title'); ?></h1>
    <?php the_content(); ?>
 
    <?php $i = 0; while( have_rows('timeline') ): the_row(); 
 
        // vars
    $timeline_year = get_sub_field('timeline_year');
    $timeline_title = get_sub_field('timeline_title');
    $timeline_copy = get_sub_field('timeline_copy');
    $timeline_image = get_sub_field('timeline_image')['sizes']['large'];
 
        ?>
        <div class="item<?php echo ($i % 2 == 0) ? ' left' : ' right' ;?>">
            <div class="year"><span><?php echo $timeline_year; ?></span></div>
            <div class="copy">
                <h2><?php echo $timeline_title; ?></h2>
                <div class="body"><?php echo $timeline_copy; ?></div>
            </div>
            <div class="image"><img src="<?php echo $timeline_image; ?>" /></div>
        </div>
    <?php $i++; endwhile; ?>

<?php endif; ?>
    </div>
</div>
<?php endwhile; endif; ?>



<!-- /Modal -->
<?php get_footer(); ?>