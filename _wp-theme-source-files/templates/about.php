<?php 
/**
* Template Name: About
**/

get_header();

get_template_part('template-parts/page-banner');

$body_cont    = get_field('body_content');
$trust_title  = get_field('trust_title');
$trust_title  = $trust_title ?: esc_html__('We Define TRUST as:', 'e2lending');
$note_content = get_field('note_content');
$note_author  = get_field('note_author');

?>
    
    <?php if( get_the_content() ) { ?>
    <div class="container banner-bottom-container"><!--start banner-bottom-container-->
        <div class="center-content2">
            <div class="banner-bottom-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div><!-- //end .banner-bottom-container-->
    <?php } ?>

    <?php if( $body_cont ) { ?>
    <div class="container mission-sports-container"><!--start mission-sports-container-->
        <div class="mission-sports-content">
            <?php echo $body_cont; ?>
        </div>
    </div><!-- //end .mission-sports-container-->
    <?php } ?>

    <?php if( have_rows('trust_item') ) { ?>
    <div class="container five-col-container gray"><!--start mission-sports-container-->
        <h2><?php echo $trust_title; ?></h2>
        <div class="five-col-info">
            <div class="five-col-area">
                <?php 
                    while( have_rows('trust_item') ) : the_row();
                    $trust_title = get_sub_field('title');
                    $trust_cont  = get_sub_field('content');
                ?>
                <div class="five-col">
                    <div class="big-title"><?php echo firstLetter( $trust_title ); ?></div>
                    <div class="five-col-cont">
                        <h6><?php echo $trust_title; ?></h6>
                        <p><?php echo $trust_cont; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div><!-- //end .mission-sports-container-->
    <?php } ?>

    <?php if( $note_content ) { ?>
    <div class="container about-tst-container gray"><!--start about-tst-container-container-->
        <div class="about-tst-content">
            <div class="about-tst-before"></div>
            <div class="about-tst-info">
                <?php 
                    echo $note_content;
                    if( $note_author ) { printf('%s %s %s', '<small>', $note_author, '</small>'); } 
                ?>
            </div>
            <div class="about-tst-after"></div>
        </div>
    </div><!-- //end .about-tst-container-->
    <?php } ?>

    <?php if( have_rows('button') ) { ?>
    <div class="container two-col-container"><!--start two-col-container-->
        <div class="center-content3">
            <div class="two-col-area">
                <?php 
                    while( have_rows('button') ) : the_row();
                    $btn_title   = get_sub_field('title');
                    $link        = get_sub_field('link');
                    if( $link ) {                    
                ?>
                <div class="two-col">
                    <h2><?php echo $btn_title; ?></h2>
                    <?php                          
                        $link_url    = $link['url'];
                        $link_title  = $link['title'];
                        $link_title  = $link_title ? $link_title : 'Learn More';
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        if( $link_url ) {
                    ?>
                        <a class="visit-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php } ?>
                </div>
                <?php } endwhile; ?>
            </div>
        </div>
    </div><!-- //end .two-col-container-->
    <?php } ?>

<?php get_footer(); ?>