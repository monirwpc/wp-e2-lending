<?php 
/**
* Template Name: Job Aids
**/

get_header();

get_template_part('template-parts/page-banner');

?>

    <?php 
        $how_to = new WP_Query(array(
            'post_type'      => 'e2_how_to',
            'posts_per_page' => -1,
            'order'          => 'ASC',
        ));
        if($how_to->have_posts()) : 
    ?>
    <div class="container pdf-download-container"><!--start pdf-download-container-->
        <div class="center-content">
            <h2><?php esc_html_e('How-tos', 'e2lending'); ?></h2>
            <div class="pdf-col-area">
                <?php while($how_to->have_posts()) : $how_to->the_post(); ?>
                <div class="pdf-col">
                    <?php if(get_field('upload_pdf_file')) : ?>
                    <div class="pdf-download">
                        <a target="_blank" href="<?php echo esc_url(get_field('upload_pdf_file')); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pdf-img.png" alt="" />
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="pdf-cont">
                        <p><?php the_title(); ?></p>
                        <?php if(get_field('upload_pdf_file')) : ?>
                        <a href="<?php echo esc_url(get_field('upload_pdf_file')); ?>" download ><?php esc_html_e('Download PDF', 'e2lending'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div><!-- //end .pdf-download-container-->
    <?php 
        endif; wp_reset_query(); 
        $documents = new WP_Query(array(
            'post_type'      => 'e2_documents',
            'posts_per_page' => -1,
            'order'          => 'ASC',
        ));
        if($documents->have_posts()) :
    ?>
    <div class="container pdf-download-container gray"><!--start pdf-download-container-->
        <div class="center-content">
            <h2><?php esc_html_e('Process Flow Documents', 'e2lending'); ?></h2>
            <div class="pdf-col-area bg-yellow">
                <?php while($documents->have_posts()) : $documents->the_post(); ?>
                <div class="pdf-col">
                    <?php if(get_field('upload_pdf_file')) : ?>
                    <div class="pdf-download">
                        <a target="_blank" href="<?php echo esc_url(get_field('upload_pdf_file')); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pdf-img.png" alt="" />
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="pdf-cont">
                        <p><?php the_title(); ?></p>
                        <?php if(get_field('upload_pdf_file')) : ?>
                        <a href="<?php echo esc_url(get_field('upload_pdf_file')); ?>" download ><?php esc_html_e('Download PDF', 'e2lending'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div><!-- //end .pdf-download-container-->        
    <?php 
        endif; wp_reset_query(); 
        $forms = new WP_Query(array(
            'post_type'      => 'e2_forms',
            'posts_per_page' => -1,
            'order'          => 'ASC',
        ));
        if($forms->have_posts()) :
    ?>
    <div class="container pdf-download-container"><!--start pdf-download-container-->
        <div class="center-content">
            <h2><?php esc_html_e('Forms', 'e2lending'); ?></h2>
            <div class="pdf-col-area bg-orange">
                <?php while($forms->have_posts()) : $forms->the_post(); ?>
                <div class="pdf-col">
                    <?php if(get_field('upload_pdf_file')) : ?>
                    <div class="pdf-download">
                        <a target="_blank" href="<?php echo esc_url(get_field('upload_pdf_file')); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pdf-img.png" alt="" />
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="pdf-cont">
                        <p><?php the_title(); ?></p>
                        <?php if(get_field('upload_pdf_file')) : ?>
                        <a href="<?php echo esc_url(get_field('upload_pdf_file')); ?>" download ><?php esc_html_e('Download PDF', 'e2lending'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div><!-- //end .pdf-download-container-->
    <?php endif; wp_reset_query(); ?>
    

<?php get_footer(); ?>