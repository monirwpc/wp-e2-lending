<?php 

get_header();

get_template_part('template-parts/page-banner');

if( have_posts() ) {

?>

    <div class="container blog-container webinar-container"><!--start blog-container-->
        <div class="center-content">
            <div class="blog-item-area">
            	<?php 
                    while( have_posts() ) : the_post();

                    get_template_part('template-parts/post-loop');

            	    endwhile; wp_reset_postdata(); 
                ?>
            </div>

            <div class="pagination-area"><!-- start pagination -->
                <div class="numeric-pagination">
                    <?php pagination_bar( $wp_query ); ?>
                </div>
            </div><!-- //end pagination -->
            
        </div>
    </div><!-- //end .blog-container-->

<?php 
    } wp_reset_query();

    get_footer();
?>