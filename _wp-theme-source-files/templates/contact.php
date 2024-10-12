<?php 
/**
* Template Name: Contact US
**/

get_header();

get_template_part('template-parts/page-banner');

?>

    <div class="container contact-page-container"><!--start contact-page-container-->
        <div class="center-content">
            <?php if( get_the_content() ) { ?>
            <div class="page-intro"><!-- start page-intro -->
                <?php the_content(); ?>
            </div><!-- //end .page-intro -->
            <?php } ?>

            <?php if( have_rows('column_info') ) { ?>
            <div class="contact-col-area">
                <?php while( have_rows('column_info') ) : the_row(); $icon = get_sub_field('icon'); ?>
                <div class="contact-col">
                    <?php if( $icon ) { ?>
                    <div class="contact-icon">
                        <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                    </div>
                    <?php } the_sub_field('content'); ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php } ?>

        </div>
    </div><!-- //end .contact-page-container-->

    <?php get_template_part('template-parts/contact-forms'); ?>

<?php get_footer(); ?>