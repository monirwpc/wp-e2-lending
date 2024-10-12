<?php 
    $shape_2 = ( is_page_template('templates/contact.php') ) ? 'cont-bg-shape-2' : '';
?>
<div class="container contact-container <?php echo esc_attr( $shape_2 ); ?>"><!--start contact-container-->
    <div class="center-content">
    	<?php 
        	$form_title = get_field('form_title');
        	if( $form_title ) { printf('<h2>%s</h2>', $form_title ); }
        ?>

        <div class="contact-form contact-form-info">
            <?php 
            	$form_shortcode = get_field('form_shortcode');
            	$form_shortcode = $form_shortcode ?: '[contact-form-7 id="330" title="Contact Form"]';
            	echo do_shortcode( $form_shortcode );
            ?>
    	</div>
    </div>
</div><!-- //end .contact-container-->