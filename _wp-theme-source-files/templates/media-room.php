<?php 
/**
* Template Name: Media Room
**/

get_header();

get_template_part('template-parts/page-banner');

$select_cats  = get_field('select_categories');

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

    <?php 
        if( ! $select_cats ) {
            $category =  get_categories( array(
                'taxonomy'    => 'category',
                'hide_empty'  => 1,
                'order'       => 'ASC',
                'orderby'     => 'id'
            ) );

            $select_cats = array();
            foreach( $category as $cat ){
                array_push($select_cats, $cat->term_id );
            }
        }
        
        $i = 0;
        foreach( $select_cats as $cat_id ) {
            $i++;
            $cat_name = get_cat_name( $cat_id );
            $cat_link = get_category_link( $cat_id );
            $cat_link = ( $cat_id != get_option('default_category') ) ? $cat_link : get_permalink( get_option( 'page_for_posts' ) );

            $webinars_cat_id = 6;
            $webinars_class  = ( $cat_id != $webinars_cat_id ) ? '' : 'blog-webinars';
            $gray_bg         = ( $i % 2 == 0 ) ? 'media-blog-before' : 'gray';

            $query = new WP_Query(array(
                'post_type'      => 'post',
                'category__in'   => $cat_id,
                'post_status'    => 'publish',
                'posts_per_page' => 3
            ));

        if( $query->have_posts() ) {            
    ?>

    <div class="container media-blog-container <?php echo esc_attr( $gray_bg .' '. $webinars_class ); ?>"><!--start media-blog-container-->
        <div class="center-content">
            <h2><?php echo $cat_name; ?></h2>
            <div class="room-services-col-area">
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                <div class="room-services-col">
                    <div class="room-services-info">
                        <?php if( has_post_thumbnail() ) { ?>
                        <div class="room-img">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        </div>
                        <?php } ?>

                        <div class="room-services-cont">
                            <p><?php the_title(); ?></p>
                            <?php if( $cat_id != $webinars_cat_id ) { ?>
                                <div class="more-btn">
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html__('Read More', 'e2lending'); ?></a>
                                </div>
                            <?php } else { ?>
                                <div class="more-btn">
                                    <small><?php echo get_the_date('l, F m, Y | g:i A'); ?></small>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="visit-room">
                <a class="visit-btn" href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html__('VIEW ALL', 'e2lending'); ?></a>
            </div>
        </div>
    </div><!-- //end .media-blog-container-->
    <?php } wp_reset_query(); } ?>


<?php get_footer(); ?>