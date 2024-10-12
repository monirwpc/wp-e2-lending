<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    
    <div id="wrapper"><!--start wrapper-->

        <div class="fat-nav"></div>

        <header class="container header-container"><!--start header-container-->
            <div class="header-content">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php if ( has_custom_logo() ) {
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            echo wp_get_attachment_image( $custom_logo_id, 'full', "", ["alt"=>"Site Logo"]);
                        } else { ?>
                            <img src="<?php echo esc_url( assetsPath() ); ?>/images/logo.png" alt="Site Logo" />
                        <?php } ?>
                    </a>
                </div>
                <div class="header-right">
                    <div class="main-menu">
                        <?php 
                            wp_nav_menu(array(
                                'theme_location'  => 'main-menu',
                                'depth'           => '3',
                                'menu_class'      => '',
                                'menu_id'         => '',
                            ));
                        ?>
                    </div>

                    <?php 
                        $phone         = get_field('phone_no', 'option');

                        $login_btn     = get_field('login_button', 'option');
                        if( $login_btn ) {
                            $login_url     = $login_btn['url'];
                            $login_title   = $login_btn['title'];
                            $login_target  = $login_btn['target'] ? $login_btn['target'] : '_self';
                        }
                        $login_title   = $login_title ? $login_title : 'Login';

                        $partner_btn   = get_field('partner_button', 'option');
                        if( $partner_btn ) {
                            $partner_url   = $partner_btn['url'];
                            $partner_title = $partner_btn['title'];
                            $partner_target  = $partner_btn['target'] ? $partner_btn['target'] : '_self';
                        }
                        $partner_title = $partner_title ? $partner_title : 'Become a partner';

                        if( $phone || $login_url || $partner_url ) {
                    ?>
                    <div class="login-area">
                        <ul>
                            <?php if( $phone ) { ?>
                                <li class="phone-num"><a href="#"><small><?php echo $phone; ?></small></a></li>
                            <?php } if( $login_url ) { ?>
                                <li class="login">
                                    <a href="<?php echo esc_url( $login_url ); ?>" target="<?php echo esc_attr( $login_target ); ?>"><small><?php echo esc_html( $login_title ); ?></small></a>
                                </li>
                            <?php } if( $partner_url ) { ?>
                                <li>
                                    <a href="<?php echo esc_url( $partner_url ); ?>" target="<?php echo esc_attr( $partner_target ); ?>"><?php echo esc_html( $partner_title ); ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </header><!-- //end .header-container-->