
// Mobile Menu Start
(function() { jQuery.fatNav(); }());
jQuery(document).ready(function() {
    var fatContent = jQuery( '.main-menu ul').html();
    var loginMenu = jQuery( '.login-area').html();
    var fatNav = '<div class="fat-nav__wrapper" id="fatmenu"><ul>' + fatContent + '<div class="login-area">' + loginMenu + '</div></ul></div>';
    jQuery( '.fat-nav' ).html( fatNav );
    jQuery('#fatmenu ul li.menu-item-has-children').append("<span class='toggle_button'><small></small></span>");
    jQuery('#fatmenu ul ul').hide();
    jQuery('ul li.menu-item-has-children > .toggle_button').click(function() {
        if(jQuery(this).parent().children('ul').hasClass('submenu') ) {
            jQuery(this).parent().children('ul').removeClass("submenu").slideUp(400);
            jQuery(this).removeClass( 'active_item' );
        }
        else{
            jQuery(this).parent().children('ul').addClass("submenu").slideDown(400);
            jQuery(this).addClass( 'active_item' );
        }
    });

});

// Mobile Menu resize js
jQuery(window).resize(function() {
    var win_width = jQuery(window).width();
    if (win_width > 1024) {
        jQuery('.fat-nav').removeClass('active').css("display", "none");
        jQuery('.hamburger').removeClass('active');
    }
});

jQuery(document).ready(function() {

    // owl carousel js
    if (jQuery('.testimonials-slider .owl-carousel').length > 0) {
        jQuery('.testimonials-slider .owl-carousel').owlCarousel({
            items:1,
            margin: 0,
            loop: false,
            nav: true,
            pagination: true,
            autoplay: false,
            dots: false,
            slideBy: 1,
        });
    }

    // banner-side-panel
    jQuery('.panel-btn').click(function(){
        jQuery(this).parents('.banner-side-panel').addClass('banner-panel-active');
    });

    jQuery('.panel-close-btn').click(function(){
        jQuery(this).parents('.banner-side-panel').removeClass('banner-panel-active');
    });

});


