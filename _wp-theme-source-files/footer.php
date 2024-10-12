        
        <?php 
            $footer_logo  = get_field('footer_logo', 'option');
            $footer_cont  = get_field('footer_left_content', 'option');
            $copyright    = get_field('copyright_text', 'option');
            $social_title = get_field('social_media_title', 'option');
            $social_title = $social_title ? $social_title : esc_html__('Follow Us:', 'e2lending');
            $facebook_url = get_field('facebook_url', 'option');
            $linkedin_url = get_field('linkedin_url', 'option');
            $nl_title     = get_field('newsletter_title', 'option');
            $footer_addr  = get_field('footer_address', 'option');

            $footer_url   = $footer_logo ? $footer_logo['url'] : assetsPath() . '/images/footer-logo.png';
            $nl_title     = $nl_title ? $nl_title : esc_html__('Sign up for the FSB Partners Newsletter:', 'e2lending');
        ?>
        <footer class="container footer-container"><!--start footer-container-->
            <div class="footer-content">
                <div class="footer-left">
                    <div class="footer-left-cont">                        
                        <div class="footer-logo">
                            <img src="<?php echo esc_url( $footer_url ); ?>" alt="<?php echo altText( $footer_logo['id'] ); ?>" />
                        </div>

                        <div class="footer-cont-info">
                            <?php echo $footer_cont; ?>
                            <?php if( $copyright ) { ?>
                                <p class="copyright"><?php echo $copyright; ?></p>
                            <?php } else { ?>
                                <p class="copyright"><?php printf('© FSB Partners %d. All Rights Reserved.', date('Y') ); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="footer-right">
                    <div class="newsletter-area">
                        <div class="footer-social">
                            <h6><?php echo $social_title; ?></h6>

                            <?php if( $facebook_url || $linkedin_url ) { ?>
                                <ul>
                                    <li>
                                        <a target="_blank" href="<?php echo esc_url( $facebook_url ); ?>">
                                            <img src="<?php echo assetsPath(); ?>/images/facebook.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="<?php echo esc_url( $linkedin_url ); ?>">
                                            <img src="<?php echo assetsPath(); ?>/images/linkedin.png" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>

                        <div class="newsletter">
                            <h6><?php echo $nl_title; ?></h6>
                            <div class="newsletter-field-area">
                                <div class="newsletter-field">
                                    <input type="email" name="emil" placeholder="Email Address" />
                                </div>
                                <div class="newsl-submit">
                                    <input type="submit" name="submit" value="SUBSCRIBE" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-col-area">
                        <div class="footer-col">
                            <?php 
                                wp_nav_menu(array(
                                    'theme_location'  => 'footer-menu',
                                    'depth'           => '1',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                ));
                            ?>
                        </div>

                        <?php if( $footer_addr ) { ?>
                        <div class="footer-col-right">
                            <?php echo $footer_addr; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </footer><!--//end .footer-container-->

    </div><!--//end #wrapper-->

    <?php wp_footer(); ?>
</body>
</html>