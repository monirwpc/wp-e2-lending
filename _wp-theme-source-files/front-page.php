<?php get_header(); ?>
    
    <?php 
        $ban_img     = get_field('banner_bg_image');
        $ban_img_url = assetsPath() . '/images/banner-img.jpg';
        $ban_cont    = get_field('banner_content');
        $ban_btn     = get_field('banner_button');
        $panel_title = get_field('panel_title');
        $panel_title = $panel_title ? $panel_title : 'Today’s Turn Times';
        $panel_cont  = get_field('panel_cont');
        $panel_small = get_field('panel_secondary_text');        
    ?>
    <div class="container banner-container"><!--start banner-container-->
        <?php if( $ban_img ) {
            echo wp_get_attachment_image($ban_img, 'full');
        } else { ?>
            <img src="<?php echo esc_url( $ban_img_url ); ?>" alt="homepage banner" />
        <?php } ?>

        <?php if( $ban_cont ) { ?>
        <div class="banner-left-content">
            <div class="banner-content">
                <?php echo $ban_cont; ?>

                <?php 
                    if( $ban_btn ) {
                    $ban_btn_url    = $ban_btn['url'];
                    $ban_btn_title  = $ban_btn['title'];
                    $ban_btn_title  = $ban_btn_title ? $ban_btn_title : 'ABOUT';
                    $ban_btn_target = $ban_btn['target'] ? $ban_btn['target'] : '_self';
                    if( $ban_btn_url ) { 
                ?>
                    <a class="visit-btn" href="<?php echo esc_url( $ban_btn_url ); ?>" target="<?php echo esc_attr( $ban_btn_target ); ?>"><?php echo esc_html( $ban_btn_title ); ?></a>
                <?php } } ?>
            </div>
        </div>
        <?php } ?>
        
        <?php if( $panel_cont ) { ?>
        <div class="banner-side-panel">
            <button class="panel-btn"><?php echo $panel_title; ?></button>
            <div class="banner-panel-cont">
                <button class="panel-close-btn"></button>
                <?php echo $panel_cont; ?>                
                <small><?php echo $panel_small; ?></small>
            </div>
        </div>
        <?php } ?>
    </div><!-- //end .banner-container-->

    <?php 
        $partner_intro = get_field('partner_intro');
        $partner_intro = $partner_intro ? $partner_intro : esc_html__('<h2>A True Partner</h2>', 'e2lending');
        $partner_btn   = get_field('partner_button');        

        if( have_rows('partner_items') ) {
    ?>
    <div class="container partner-container"><!--start partner-container-->
        <div class="center-content">
            <div class="partner-top-cont">
                <?php echo $partner_intro; ?>                
            </div>

            <div class="partner-col-area">
                <?php while( have_rows('partner_items') ) : the_row(); 
                    $partner_icon  = get_sub_field('icon');
                    $partner_title = get_sub_field('title');
                ?>
                <div class="partner-col">
                    <div class="partner-col-row">
                        <?php if( $partner_icon ) { ?>
                        <div class="partner-col-img">
                            <img src="<?php echo esc_url( $partner_icon['url'] ); ?>" alt="<?php echo esc_attr( $partner_icon['alt'] ); ?>" />
                        </div>
                        <?php } ?>

                        <div class="partner-col-cont">
                            <p><?php echo $partner_title; ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <?php 
                if( $partner_btn ) { 
                $partner_url       = $partner_btn['url'];
                $partner_btn_title = $partner_btn['title'];
                $partner_btn_title = $partner_btn_title ? $partner_btn_title : 'BECOME A PARTNER';
                $partner_target    = $partner_btn['target'] ? $partner_btn['target'] : '_self';
                if( $partner_url ) { 
            ?>
            <div class="visit-room">
                <a class="visit-btn" href="<?php echo esc_url( $partner_url ); ?>" target="<?php echo esc_attr( $partner_target ); ?>"><?php echo esc_html( $partner_btn_title ); ?></a>
            </div>
            <?php } } ?>
        </div>
    </div><!-- //end .partner-container-->
    <?php } ?>

    <?php 
        $media_intro = get_field('media_room_intro');
        $media_intro = $media_intro ? $media_intro : esc_html__('<h2>Media Room</h2>', 'e2lending');
        $mr_btn      = get_field('media_room_button');
        $cat_or_post = get_field('select_posts_or_categories');
        $sel_posts   = get_field('select_posts');
        $sel_cat     = get_field('select_a_category');

        if( $cat_or_post == 'post' && $sel_posts ) {
            $query = new WP_Query(array(
                'post_type'      => 'post',
                'post__in'       => $sel_posts,
                'post_status'    => 'publish'
            ));
        } elseif( $cat_or_post == 'cat' && $sel_cat ) {
            $query = new WP_Query(array(
                'post_type'      => 'post',
                'category__in'   => $sel_cat,
                'post_status'    => 'publish',
                'posts_per_page' => 3
            ));
        } else {
            $query = new WP_Query(array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 3
            ));
        }

        if( $media_intro || $query->have_posts() ) {
    ?>
    <div class="container room-services-container gray"><!--start room-services-container-->
        <div class="center-content">
            <div class="partner-top-cont">
                <?php echo $media_intro; ?>
            </div>

            <?php if( $query->have_posts() ) { ?>
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
                            <div class="more-btn">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html__('Read More', 'e2lending'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php } wp_reset_query(); ?>

            <?php 
                if( $mr_btn ) { 
                $mr_btn_url    = $mr_btn['url'];
                $mr_btn_title  = $mr_btn['title'];
                $mr_btn_title  = $mr_btn_title ? $mr_btn_title : 'VISIT The Media Room';
                $mr_btn_target = $mr_btn['target'] ? $mr_btn['target'] : '_self';
                if( $mr_btn_url ) { 
            ?>
            <div class="visit-room">
                <a class="visit-btn" href="<?php echo esc_url( $mr_btn_url ); ?>" target="<?php echo esc_attr( $mr_btn_target ); ?>"><?php echo esc_html( $mr_btn_title ); ?></a>
            </div>
            <?php } } ?>
        </div>
    </div><!-- //end .room-services-container-->
    <?php } ?>

    <?php 
        $fp_img   = get_field('firstprice_image');
        $fp_intro = get_field('firstprice_content');
        $fp_btn   = get_field('firstprice_button');        

        if( $fp_img || $fp_intro ) {
    ?>
    <div class="container price-services-container"><!--start price-services-container-->
        <div class="center-content">
            <div class="price-services-area">
                <?php if( $fp_img ) { ?>
                <div class="price-services-left">                    
                    <div class="price-svs-img">
                        <?php echo wp_get_attachment_image($fp_img, 'img_540x540'); ?>
                    </div>
                </div>
                <?php } ?>
                
                <div class="price-services-right">
                    <div class="price-svs-cont">
                        <?php echo $fp_intro; ?>                        

                        <?php 
                            if( $fp_btn ) { 
                            $fp_btn_url    = $fp_btn['url'];
                            $fp_btn_title  = $fp_btn['title'];
                            $fp_btn_title  = $fp_btn_title ? $fp_btn_title : 'Get an Instant Quote';
                            $fp_btn_target = $fp_btn['target'] ? $fp_btn['target'] : '_self';
                            if( $fp_btn_url ) { 
                        ?>
                            <a class="visit-btn" href="<?php echo esc_url( $fp_btn_url ); ?>" target="<?php echo esc_attr( $fp_btn_target ); ?>"><?php echo esc_html( $fp_btn_title ); ?></a>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- //end .price-services-container-->
    <?php } ?>

    <?php if( have_rows('testimonial') ) { ?>
    <div class="testimonials-main-container"><!--start testimonials-main-container-->
        <div class="container testimonials-container gray"><!--start testimonials-container-->
            <div class="testimonials-content">
                <div class="tst-before"></div>
                <div class="testimonials-slider">
                    <div class="owl-carousel">
                        <?php while( have_rows('testimonial') ) : the_row(); ?>
                        <div class="item">
                            <div class="tst-content">
                                <?php the_sub_field('content'); ?>
                                <?php if( $review_author = get_sub_field('author_name') ) { ?>
                                    <small><?php echo esc_html__('by ', 'e2lending') . $review_author; ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="tst-after"></div>
            </div>
        </div><!-- //end .testimonials-container-->
    </div><!-- //end .testimonials-main-container-->
    <?php } ?>

<?php get_footer(); ?>