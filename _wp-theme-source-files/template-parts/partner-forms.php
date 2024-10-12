<?php 
	$hide_shape = get_field('disable_form_section_triangle_shape');
	$hide_shape = ( $hide_shape == 1 ) ? 'hide-shape' : '';
	$hide_forms = get_field('disable_partner_form');
	if( $hide_forms != 1 ) {
?>

<div class="container contact-container <?php echo esc_attr( $hide_shape ); ?>"><!--start contact-container-->
    <div class="center-content">        
        <?php 
        	$partner_f_title = get_field('partner_forms_title');
        	$partner_f_title = $partner_f_title ?: esc_html__('Become a Partner', 'e2lending');
        	printf('<h2>%s</h2>', $partner_f_title );
        ?>
        <div class="contact-form">
            <?php 
            	$partner_form = get_field('partner_forms_shortcode');
            	$partner_form = $partner_form ?: '[contact-form-7 id="267" title="Become a Partner"]';
            	echo do_shortcode( $partner_form );
            ?>
    	</div>
    </div>
</div><!-- //end .contact-container-->
<?php } ?>