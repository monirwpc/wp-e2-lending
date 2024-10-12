<?php 
    get_header(); 

    $positions = get_field('positions');
    $link      = get_field('leadership_article_page_button_url', 'option');
    if( $link ) { 
        $link_url    = $link['url'];
        $link_title  = $link['title'];                
        $link_target = $link['target'];
    }

    $link_url    = $link_url ?: home_url('/') . 'leadership';
    $link_title  = $link_title ?: 'Back to ALL Leadership Team';
    $link_target = $link_target ?: '_self';
?> 

    <div class="container inner-banner-bottom-container"><!--start inner-banner-bottom-container-->
        <div class="center-content">
            <div class="inner-banner-bottom-content">
                <h1><?php the_title(); ?></h1>
                <?php if( $positions = get_field('positions') ) { 
                    printf('%s %s %s', '<p>', $positions, '</p>');
                } ?>
            </div>
        </div>
    </div><!-- //end .inner-banner-bottom-container-->

    <div class="container team-member-container gray"><!--start team-member-container-->
        <div class="center-content">
            <div class="price-services-area">
                <?php if( has_post_thumbnail() ) { ?>
                <div class="price-services-left">
                    <div class="price-svs-img">
                        <?php the_post_thumbnail('img_540x540'); ?>
                    </div>
                </div>
                <?php } ?>

                <div class="price-services-right">
                    <div class="price-svs-cont">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- //end .team-member-container-->

    <div class="container leadership-btn-container"><!--start leadership-btn-container-->
        <div class="center-content">
            <a class="visit-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        </div>
    </div><!-- //end .leadership-btn-container-->

        
<?php get_footer(); ?> 