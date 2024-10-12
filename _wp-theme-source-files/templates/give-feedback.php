<?php 
/**
* Template Name: Give Feedback
**/

get_header();

get_template_part('template-parts/page-banner');

?>

    <?php if( get_the_content() ) { ?>
    <div class="container inner-banner-bottom-container"><!--start inner-banner-bottom-container-->
        <div class="center-content">
            <div class="inner-banner-bottom-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div><!-- //end .inner-banner-bottom-container-->
    <?php } ?>

    <?php get_template_part('template-parts/contact-forms'); ?>
       
<?php get_footer(); ?>