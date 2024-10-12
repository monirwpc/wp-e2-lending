<?php

get_header();

if( have_posts() ) : while( have_posts() ) : the_post();

get_template_part('template-parts/page-banner');

$cat_name  = get_the_category()[0]->name;
$cat_slug  = get_the_category()[0]->slug;
$cat_id    = get_the_category()[0]->term_id;
$cat_link  = get_category_link( $cat_id );
$cat_link  = ( $cat_id != get_option('default_category') ) ? $cat_link : get_permalink( get_option( 'page_for_posts' ) );
$back_all  = get_field('back_to_all_post_text', 'term_'.$cat_id );
$back_all  = $back_all ?: esc_html__('RETURN TO ALL '.$cat_name.' Articles', 'e2lending');

$date      = get_the_date('l, F m, Y');
$date      = ( $cat_slug === 'webinars' ) ? get_the_date('l, F m, Y | g:i A') : $date;

// SOCIAL SHARE
// Get current page URL 
$s_url = urlencode(get_permalink());

// Get current page title
$s_title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));

// sharing media
$facebook = 'http://www.facebook.com/share.php?u='. $s_url . '&title=' . $s_title;
$twitter  = 'http://twitter.com/intent/tweet?text=Currently reading ' . $s_title . '&url=' . $s_url;
$linkedin = 'http://www.linkedin.com/shareArticle?mini=true&url=' . $s_url . '&title=' . $s_title . '&source=' . get_bloginfo( 'name' );

?>

    <div class="container blog-article-container"><!--start blog-article-container-->
        <div class="blog-article-content">
            <div class="entry-content">
                <h2><?php the_title(); ?></h2>
                <div class="blog-meta">
                    <span><?php printf('by %s', get_the_author() ); ?></span>
                    <span><?php echo $date; ?></span>

                    <div class="blog-social">
                        <ul>
                            <li>
                                <a class="shareWindow" href="<?php echo esc_url( $facebook ); ?>">
                                    <img src="<?php echo assetsPath(); ?>/images/fb-icon.png" alt="facebook share" />
                                </a>
                            </li>
                            <li>                                
                                <a class="shareWindow" href="<?php echo esc_url( $linkedin ); ?>">
                                    <img src="<?php echo assetsPath(); ?>/images/linkedin-icon.png" alt="linkedin share" />
                                </a>
                            </li>
                            <li>
                                <a class="shareWindow" href="<?php echo esc_url( $twitter ); ?>">
                                    <img src="<?php echo assetsPath(); ?>/images/twi-icon.png" alt="twitter share" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php the_content(); ?>

            </div>
            <div class="visit-room">
                <a class="visit-btn" href="<?php echo esc_url( $cat_link ); ?>"><?php echo $back_all; ?></a>
            </div>
        </div>
    </div><!-- //end .blog-article-container-->

<?php 
    endwhile; wp_reset_postdata(); endif; wp_reset_query(); 
    get_footer(); 
?>