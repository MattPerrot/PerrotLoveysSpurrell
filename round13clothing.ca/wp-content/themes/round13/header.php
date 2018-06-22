<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php bloginfo('title') ?></title>
        <meta charset="<?php bloginfo('charset') ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="<?php echo of_get_option("favicon_icon");?>" type="image/x-icon">
        <link rel="icon" href="<?php echo of_get_option("favicon_icon");?>" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <div class="header_top">
                <div class="container">
                    <div class="call_contain">
                        <span><?php echo of_get_option('call_ustext'); ?></span><a href="tel:<?php echo of_get_option('call_usnum'); ?>"> <?php echo of_get_option('call_usnum'); ?></a>
                    </div>
                    <div class="sociyal_contain">
                        <ul>
                            <?php if (is_user_logged_in()): ?>
                                  <li><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('My Account', ''); ?>"><?php _e('My Account', ''); ?></a></li>
                                  <li><a href="<?php echo wp_logout_url(site_url()); ?>" title="<?php _e('Logout', ''); ?>"><?php _e('Logout', ''); ?></a></li>
                              <?php else: ?>
                                  <li><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">Login</a></li>
                                  <li><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">Register</a></li>
                            <?php endif; ?>

                        </ul>
                        <ul>
                            <li class="fb_icon"><a href="<?php echo of_get_option('fb_libk_header'); ?>"></a></li>
                            <li class="twr_icon"><a href="<?php echo of_get_option('twr_libk_header'); ?>"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="serch_icon">
                                <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
<!--                                    <label class="screen-reader-text" for="woocommerce-product-search-field"><?php //_e( 'Search for:', 'woocommerce' );      ?></label>-->
                                    <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr_x('Search here', 'placeholder', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label', 'woocommerce'); ?>" />
                                    <input type="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?>" />
                                    <input type="hidden" name="post_type" value="product" />
                                </form>
<!--                                <input type="text" placeholder="Search here"/>
                                <input type="submit"/>-->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="logo">
                                <a href="<?php echo site_url(); ?>"><img src="<?php echo of_get_option('header_logo'); ?>" alt="logo"/></a>
                            </div>
                            <nav class="navbar navbar-default">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                                        <span class="sr-only">Toggle navigation</span> 
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>  
                            </nav>
                        </div>
                        <div class="col-sm-3 cart_content">
                            <div class="cart_contain">

                                <a href="<?php echo wc_get_cart_url(); ?>"><span class="cart_img"></span></a>
                                <span id="cart_pop">
                                    <?php
                                      $count = WC()->cart->get_cart_contents_count();
                                      if (!empty($count)) {
                                          echo $count;
                                      } else {
                                          echo "0";
                                      }
//                                    
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <nav class="navbar navbar-default">
                                <div id="navbar" class="navbar-collapse collapse">

                                    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'nav navbar-nav header_nav', 'container' => '', 'container_class' => '', 'echo' => true,)); ?>


                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
       