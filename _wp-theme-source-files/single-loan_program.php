<?php 
    get_header(); 

    get_template_part('template-parts/page-banner');

    $body_btn = get_field('body_content_button');
    $nav_bar  = get_field('navigation_bar_bg_color');
    $nav_bar  = ( $nav_bar === 'default' ) ? '' : $nav_bar;

    $link      = get_field('loan_programs_article_page_back_btn', 'option');
    if( $link ) { 
        $link_url    = $link['url'];
        $link_title  = $link['title'];
        $link_target = $link['target'];
    }

    $link_url    = $link_url ?: home_url('/') . 'loan-programs';
    $link_title  = $link_title ?: 'Back to ALL LOAN PROGRAMS';
    $link_target = $link_target ?: '_self';

    $query = new WP_Query(array(
        'post_type'      => 'loan_program',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'orderby'        => 'rand',
        'post__not_in'   => array( get_the_ID() )
    ));
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

    <div class="container programs-nextprev-container <?php echo esc_attr( $nav_bar ); ?>"><!--start programs-nextprev-container-->
        <div class="programs-nextprev-area">
            <div class="programs-prev">
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
            <div class="programs-next">
                <?php 
                    if( get_previous_post() ) {
                        previous_post_link('%link', '%title');
                    } else {
                        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                            printf('<a href="%s">%s</a>', esc_url( get_the_permalink() ), get_the_title() );
                        endwhile; wp_reset_postdata(); endif; wp_reset_query();
                    }
                ?>
            </div>
        </div>
    </div><!-- //end .programs-nextprev-container-->
        

<?php get_footer(); ?>