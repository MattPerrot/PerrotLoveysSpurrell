<?php
  /**
   * Shop breadcrumb
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see 	    https://docs.woocommerce.com/document/template-structure/
   * @author 		WooThemes
   * @package 	WooCommerce/Templates
   * @version     2.3.0
   * @see         woocommerce_breadcrumb()
   */
  if (!defined('ABSPATH')) {
      exit;
  }
  global $product;

  if (!empty($breadcrumb)) {

//      echo $wrap_before;
      ?>
      <section class="banner_bg">
          <div class="container">
              <h1>
                  <?php
                  if (is_product()) {
                      $id = $product->ID;
                      echo $name = get_the_title($id); 
                  } else {
                      echo woocommerce_page_title();
                  }
                  ?>
              </h1>
              <ol class="breadcrumb">
                  <?php
                  foreach ($breadcrumb as $key => $crumb) {

                      echo $before;

                      if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
                          echo '<li class = "breadcrumb-item"><a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a></li>';
                      } else {
                          echo '<li class = "breadcrumb-item active">' . esc_html($crumb[0]) . '</li>';
                      }

//                      echo $after;
//
//                      if (sizeof($breadcrumb) !== $key + 1) {
//                          echo $delimiter;
//                      }
                  }

//                  echo $wrap_after;
              }
            ?>
        </ol>
    </div>
</section>
