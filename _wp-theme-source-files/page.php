<?php 

get_header();

get_template_part('template-parts/page-banner');

?> 

    <div class="container blog-article-container"><!--start blog-article-container-->
        <div class="blog-article-content">
            <div class="entry-content">
                <div class="blog-meta">
                    <?php printf('<span>Last updated %s</span>', get_the_modified_time('F m, Y') ); ?>
                </div>

                <?php the_content(); ?>
                
            </div>
        </div>
    </div><!-- //end .blog-article-container-->


<?php get_footer(); ?>