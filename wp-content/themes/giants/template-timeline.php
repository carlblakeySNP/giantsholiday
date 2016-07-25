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
    <div class="leader">
        <h1><?php echo get_field('sub_title'); ?></h1>
        <?php the_content(); ?>
    </div>
 
    <?php $i = 0; while( have_rows('timeline') ): the_row(); 
 
        // vars
    $timeline_year = get_sub_field('timeline_year');
    $timeline_title = get_sub_field('timeline_title');
    $timeline_copy = get_sub_field('timeline_copy');
    $timeline_image = get_sub_field('timeline_image')['sizes']['large'];

    $second_caption = get_sub_field('second_caption');
    $second_image = get_sub_field('second_image')['sizes']['large'];

    if($second_caption != '') :
 
        ?>
        <div class="item double">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/logo-bg.png" class="hr-logo" />
            
            <div class="copy">
                <p class="year"><span><?php echo $timeline_year; ?></span></p>
                <h2><?php echo $timeline_title; ?></h2>
                
            </div>
            <div class="left">
                <div class="image"><div class="img-wrap"><img src="<?php echo $timeline_image; ?>" /></div></div>
                <div class="body"><?php echo $timeline_copy; ?></div>
            </div>
            <div class="right">
                <div class="image"><div class="img-wrap"><img src="<?php echo $second_image; ?>" /></div></div>
                <div class="body"><?php echo $second_caption; ?></div>
            </div>
        </div>
    <?php else : ?>
        <div class="item<?php echo ($i % 2 == 0) ? ' left' : ' right' ;?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/logo-bg.png" class="hr-logo" />
            
            <div class="copy">
                <p class="year"><span><?php echo $timeline_year; ?></span></p>
                <h2><?php echo $timeline_title; ?></h2>
                <div class="body"><?php echo $timeline_copy; ?></div>
            </div>
            <div class="image"><div class="img-wrap"><img src="<?php echo $timeline_image; ?>" /></div></div>
        </div>
        <?php endif; ?>
    <?php $i++; endwhile; ?>
    
<?php endif; ?>
    </div>
</div>
<?php endwhile; endif; ?>



<!-- /Modal -->

<?php get_footer(); ?>