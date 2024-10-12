<?php 
    $i = 0; 
    if( have_rows('advantage_info') ) : 
    while( have_rows('advantage_info') ) : the_row(); 
    $i++; 
    $bg_color      = get_sub_field('section_background_color');
    $bg_color      = ( $bg_color === 'white' ) ? '' : $bg_color;
    $image         = get_sub_field('image');
    $img_pattern   = get_sub_field('image_bg_pattern');
    $img_pattern   = ( $img_pattern === 'default' ) ? '' : $img_pattern;
    $content       = get_sub_field('content');

    $button_1      = get_sub_field('button_1');
    if( $button_1 ) { 
        $button_1_url    = $button_1['url'];
        $button_1_title  = $button_1['title'];
        $button_1_target = $button_1['target'] ?: '_self';
    }

    $button_2      = get_sub_field('button_2');
    if( $button_2 ) { 
        $button_2_url    = $button_2['url'];
        $button_2_title  = $button_2['title'];
        $button_2_target = $button_2['target'] ?: '_self';
    }

    $reverse_col  = ( $i % 2 == 0 ) ? 'svs-col-reverse' : '';

    if( $image || $content ) {

?>
<div class="container team-member-container <?php echo esc_attr( $img_pattern . ' ' . $bg_color . ' ' . $reverse_col ); ?>"><!--start team-member-container-->
    <div class="center-content">
        <div class="price-services-area">
            <?php if( $image ) { ?>
            <div class="price-services-left">
                <div class="price-svs-img">
                    <?php echo wp_get_attachment_image($image, 'img_540x540'); ?>
                </div>
            </div>
            <?php } ?>

            <div class="price-services-right">
                <div class="price-svs-cont">
                    <?php echo $content; ?>

                    <?php if( ( $button_1_url && $button_1_title ) || ( $button_2_url && $button_2_title ) ) { ?>
                    <div class="lending-btn-area">
                        <?php if( $button_1_url && $button_1_title ) { ?>
                            <a class="visit-btn" href="<?php echo esc_url( $button_1_url ); ?>" target="<?php echo esc_attr( $button_1_target ); ?>"><?php echo esc_html( $button_1_title ); ?></a>
                        <?php } if( $button_2_url && $button_2_title ) { ?>
                            <a class="visit-btn lending-btn" href="<?php echo esc_url( $button_2_url ); ?>" target="<?php echo esc_attr( $button_2_target ); ?>"><?php echo esc_html( $button_2_title ); ?></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- //end .team-member-container-->
<?php } endwhile; endif; ?>