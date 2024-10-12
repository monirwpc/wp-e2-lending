<?php 

global $wp_query;

get_header();

get_template_part('template-parts/page-banner');

$intro       = get_field('intro', $wp_query->get_queried_object() );

$cat_id      = $wp_query->get_queried_object_id();
$category    = get_category( $cat_id );

$total_posts = $category->category_count;
$posts_limit = get_field('default_post_display', 'option');
$posts_limit = ( $posts_limit ) ? $posts_limit : 6;

$query = new WP_Query(array(
    'post_type'      => 'post',
    'category__in'   => $cat_id,
    'post_status'    => 'publish',
    'posts_per_page' => $posts_limit
));

if( $query->have_posts() ) {

?>

    <?php if( $intro ) { ?>
    <div class="container inner-banner-bottom-container"><!--start inner-banner-bottom-container-->
        <div class="center-content">
            <div class="inner-banner-bottom-content">
                <?php echo $intro; ?>
            </div>
        </div>
    </div><!-- //end .inner-banner-bottom-container-->
    <?php } ?>

    <div class="container blog-container <?php if( ! $intro ) { echo 'webinar-container'; } ?>"><!--start blog-container-->
        <div class="center-content">
            <div class="blog-item-area">
            	<?php 
                    while( $query->have_posts() ) : $query->the_post();

                    get_template_part('template-parts/post-loop');

            	    endwhile; wp_reset_postdata(); 
                ?>
            </div>

            <?php if( $total_posts > $posts_limit ) { ?>
                <div class="visit-room load-more">
                    <a 
                        class         = "visit-btn btn" 
                        data-limit    = "<?php echo $posts_limit; ?>" 
                        data-offset   = "<?php echo $posts_limit; ?>" 
                        data-paged    = "1" 
                        data-posts    = "<?php echo $total_posts; ?>" 
                        data-category = "<?php echo $cat_id; ?>" 
                        data-ajaxURL  = "<?php echo admin_url('admin-ajax.php'); ?>" 
                        href          = "#"
                    ><?php echo esc_html__('Load More', 'e2lending'); ?></a>
                </div>
            <?php } ?>
        </div>
    </div><!-- //end .blog-container-->

<?php 
    } wp_reset_query();

    get_footer();
?>