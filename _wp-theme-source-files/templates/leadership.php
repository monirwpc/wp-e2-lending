<?php 
/**
* Template Name: Leadership
**/

get_header();

get_template_part('template-parts/page-banner');

$query = new WP_Query(array(
    'post_type'      => 'leadership',
    'post_status'    => 'publish',
    'posts_per_page' => -1
));

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
    <div class="container team-container"><!--start team-container-->
        <div class="center-content">
            <div class="room-services-col-area">
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                <div class="room-services-col">
                    <div class="room-services-info">
                        <?php if( has_post_thumbnail() ) { ?>
                        <div class="room-img">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <?php the_post_thumbnail('img_540x540'); ?>
                            </a>
                        </div>
                        <?php } ?>

                        <div class="room-services-cont">
                            <?php 
                                the_title('<h3><a href="'.esc_url( get_the_permalink() ).'">', '</a></h3>');
                                if( $positions = get_field('positions') ) { 
                                    printf('%s %s %s', '<p>', $positions, '</p>'); 
                                } 
                            ?>

                            <div class="more-btn">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html__('Read Bio', 'e2lending'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>                
            </div>
        </div>
    </div><!-- //end .team-container-->
    <?php } wp_reset_query(); ?>
    

<?php get_footer(); ?>