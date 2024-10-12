<?php 
    global $wp_query;

    $page_title   = wp_title('' , false );
    $thumb_id     = get_post_thumbnail_id();

    $banner_title = get_field('banner_title');
    $banner_img   = get_field('banner_bg_image');
    $banner_style = get_field('banner_style');

    if( $wp_query->is_posts_page ) {
        $thumb_id     = get_post_thumbnail_id( get_option( 'page_for_posts' ) );

        $banner_title = get_field('banner_title', get_option( 'page_for_posts', true ) );
        $banner_img   = get_field('banner_bg_image', get_option( 'page_for_posts', true ) );
        $banner_style = get_field('banner_style', get_option( 'page_for_posts', true ) );
    }

    if( is_category() ) {
        $banner_title = get_field('banner_title', $wp_query->get_queried_object() );
        $banner_img   = get_field('banner_bg_image', $wp_query->get_queried_object() );
        $banner_style = get_field('banner_style', $wp_query->get_queried_object() );
    }

    if( is_single() ) {
        $cat_name = get_the_category()[0]->cat_name;
        if( $cat_name ) {
            $page_title = $cat_name;
        }
    }

    $banner_title = $banner_title ? $banner_title : $page_title;
    $banner_style = ( $banner_style === 'default' ) ? '' : $banner_style;
    $banner_img   = $banner_img ? $banner_img : wp_get_attachment_url( $thumb_id );
    $banner_img   = $banner_img ? $banner_img : assetsPath() . '/images/about-banner.jpg';

	if( is_archive() && ! is_category() ) {
		$banner_title = get_the_archive_title();
        $banner_img   = assetsPath() . '/images/about-banner.jpg';
    }
?>

<div class="pg-banner <?php echo esc_attr( $banner_style ); ?>" style="background-image: url( <?php echo esc_url( $banner_img ); ?> )"><!--start banner-container-->
    <div class="about-banner-content">
        <h1><?php echo $banner_title; ?></h1>
    </div>
</div><!-- //end .banner-container-->