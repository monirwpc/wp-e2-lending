<?php 

get_header();

get_template_part('template-parts/page-banner');

?>

<div class="container inner-banner-bottom-container"><!--start 404 container-->
        <div class="center-content">
            <div class="inner-banner-bottom-content">
            <h2><?php _e('404 NOT FOUND!', 'e2lending'); ?></h2>
            <p class="lead"><?php _e("We're sorry, the page you have looked for does not exist in our content! </br> Perhaps you would like to go to our homepage or try searching below.", "e2lending"); ?></p>
        </div>
    </div>
</div><!-- //end 404 container-->

<?php get_footer(); ?>