<?php 
    $read_more = get_field('read_article_text', $wp_query->get_queried_object() );
    $read_more = $read_more ?: esc_html__('Read More', 'e2lending');
    $date      = get_the_date('l, F m, Y');
    $date      = ( is_category('webinars') ) ? get_the_date('l, F m, Y | g:i A') : $date;
?>
<div class="blog-item-row">
	<?php if( has_post_thumbnail() ) { ?>
    <div class="blog-item-img">
        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    </div>
    <?php } ?>

    <div class="blog-item-content">
        <h6><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h6>
        <div class="date-time">
        	<?php echo $date; ?>
        </div>
        <?php the_excerpt(); ?>

        <a class="blog-more-btn" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo $read_more; ?></a>
    </div>
</div>