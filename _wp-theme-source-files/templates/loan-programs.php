<?php 
/**
* Template Name: Loan Programs & Features
**/

get_header();

get_template_part('template-parts/page-banner');

$more_btn = get_field('read_more_button_text');
$more_btn = $more_btn ?: esc_html__('Read More', 'e2lending');
$img_dot  = get_field('image_bg_pattern');
$img_dot  = ( $img_dot === 'default' ) ? '' : $img_dot;
$intro    = get_field('page_intro');
$intro    = $intro ?: '<h2>'. get_the_title() .'</h2>';

if( is_page('features') ) {
    $query = new WP_Query(array(
        'post_type'      => 'features',
        'post_status'    => 'publish',
        'posts_per_page' => -1
    ));
} else {
   $query = new WP_Query(array(
        'post_type'      => 'loan_program',
        'post_status'    => 'publish',
        'posts_per_page' => -1
    ));
}

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

    <?php if( $query->have_posts() ) { ?>
    <div class="container loan-programs-container gray <?php echo esc_attr( $img_dot ); ?>"><!--start team-member-container-->
        <div class="center-content">

            <div class="page-intro"><!-- start page-intro -->
                <?php echo $intro; ?>
            </div><!-- //end .page-intro -->

            <div class="room-services-col-area loan-program-posts">
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                <div class="room-services-col">
                    <div class="room-services-info">
                        <?php if( has_post_thumbnail() ) { ?>
                        <div class="room-img">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                        </div>
                        <?php } ?>
                        <div class="room-services-cont">
                            <div class="pdt-title">
                            <?php 
                                $cus_title = get_field('post_custom_title');
                                $sub_title = get_field('post_sub_title');
                                if( $cus_title ) {
                                    printf('<h3><a href="%s">%s</a></h3>', esc_url( get_the_permalink() ), $cus_title );
                                } else {
                                    the_title('<h3><a href="'.esc_url( get_the_permalink() ).'">', '</a></h3>');
                                }
                                if( $sub_title ) { 
                                    printf('%s %s %s', '<small>', $sub_title, '</small>');
                                }
                            ?>
                            </div>

                            <?php the_excerpt(); ?>
                            <div class="more-btn">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo $more_btn; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div><!-- //end .team-member-container-->
    <?php } wp_reset_query(); ?>


<?php get_footer(); ?>