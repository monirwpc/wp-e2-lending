<?php 
/**
* Template Name: Become a Partner
**/

get_header();

get_template_part('template-parts/page-banner');

$body_btn = get_field('body_content_button');

?> 

    <?php if( get_the_content() ) { ?>
    <div class="container inner-banner-bottom-container"><!--start inner-banner-bottom-container-->
        <div class="center-content">
            <div class="inner-banner-bottom-content">
                <?php the_content(); ?>

                <?php 
                    if( $body_btn ) {
                    $body_btn_url    = $body_btn['url'];
                    $body_btn_title  = $body_btn['title'];
                    $body_btn_target = $body_btn['target'] ?: '_self';
                    if( $body_btn_url || $body_btn_title ) { 
                ?>
                    <a class="visit-btn" href="<?php echo esc_url( $body_btn_url ); ?>" target="<?php echo esc_attr( $body_btn_target ); ?>"><?php echo esc_html( $body_btn_title ); ?></a>
                <?php } } ?>
            </div>
        </div>
    </div><!-- //end .inner-banner-bottom-container-->
    <?php } ?>

    <?php get_template_part('template-parts/page-advantage-info'); ?>

    <?php get_template_part('template-parts/partner-forms'); ?>

<?php get_footer(); ?>