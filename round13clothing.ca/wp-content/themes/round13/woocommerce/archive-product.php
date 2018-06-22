<?php
  /**
   * The Template for displaying product archives, including the main shop page which is a post type archive
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
   * @version     2.0.0
   */
  if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly
  }

  get_header('shop');
?>

<?php
  /**
   * woocommerce_before_main_content hook.
   *
   * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
   * @hooked woocommerce_breadcrumb - 20
   */
  do_action('woocommerce_before_main_content');
?>
<section class="shop_section main_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
<!--                <div class="shop_slidebar">
                    <div class="shop_categorie">
                        <h4>CATEGORIES</h4>
                        <ul>
                            <li><a href="javascript:void(0);">Hoodies</a></li>
                            <li><a href="javascript:void(0);">T-shirt</a></li>
                            <li><a href="javascript:void(0);">Hat</a></li>
                            <li><a href="javascript:void(0);">Touque</a></li>
                        </ul>
                    </div>
                    <div class="shop_size">
                        <h4>Choose a size</h4>
                        <div class="shop_sizecheck">
                            <div class="size_check">
                                <span>xs</span>
                            </div>
                            <div class="size_check">
                                <span>s</span>
                            </div>
                            <div class="size_check">
                                <span>m</span>
                            </div>
                            <div class="size_check">
                                <span>l</span>

                            </div>
                            <div class="size_check">
                                <span>xl</span>
                            </div>
                        </div>
                    </div>
                    <div class="shop_price">
                        <h4>REFINE A PRICE</h4>
                        <div id="slider-range"></div>
                        <a href="javascript:void(0);">Filter</a>
                        <label for="amount">Price:</label>
                        <input type="text" id="amount" readonly>


                    </div>
                    <div class="shop_color">
                        <h4>SORT BY COLOUR</h4>
                        <div class="shop_colorcheck">
                            <div class="checkbox blk_color">
                                <input type="checkbox"  id="checkbox1"/>
                                <label for="checkbox1"></label>
                            </div>
                            <div class="checkbox red_color">
                                <input type="checkbox"  id="checkbox2"/>
                                <label for="checkbox2"></label>
                            </div>
                            <div class="checkbox blk_color1">
                                <input type="checkbox"  id="checkbox3"/>
                                <label for="checkbox3"></label>
                            </div>
                            <div class="checkbox pink_color">
                                <input type="checkbox" id="checkbox4"/>
                                <label for="checkbox4"></label>
                            </div>
                            <div class="checkbox blk_color2">
                                <input type="checkbox"  id="checkbox5"/>
                                <label for="checkbox5"></label>
                            </div>
                            <div class="checkbox blue_color">
                                <input type="checkbox"  id="checkbox6"/>
                                <label for="checkbox6"></label>
                            </div>
                            <div class="checkbox pur_color">
                                <input type="checkbox" id="checkbox7"/>
                                <label for="checkbox7"></label>
                            </div>
                        </div>
                    </div>
                </div>-->
                
                <?php dynamic_sidebar('shop_custom'); ?>
            </div>
            <div class="col-sm-9">
                <!--                        <div class="show_product_text">-->
                <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>

            <!--			<h1 class="page-title "><?php // woocommerce_page_title();   ?></h1>-->

                  <?php endif; ?>

                <?php
                  /**
                   * woocommerce_archive_description hook.
                   *
                   * @hooked woocommerce_taxonomy_archive_description - 10
                   * @hooked woocommerce_product_archive_description - 10
                   */
                  do_action('woocommerce_archive_description');
                ?>

                <?php if (have_posts()) : ?>

                      <?php
                      /**
                       * woocommerce_before_shop_loop hook.
                       *
                       * @hooked woocommerce_result_count - 20
                       * @hooked woocommerce_catalog_ordering - 30
                       */
                      do_action('woocommerce_before_shop_loop');
                      ?>

                      <?php woocommerce_product_loop_start(); ?>

                      <?php woocommerce_product_subcategories(); ?>

                      <?php while (have_posts()) : the_post(); ?>

                          <?php wc_get_template_part('content', 'product'); ?>

                      <?php endwhile; // end of the loop. ?>

                      <?php woocommerce_product_loop_end(); ?>

                      <?php
                      /**
                       * woocommerce_after_shop_loop hook.
                       *
                       * @hooked woocommerce_pagination - 10
                       */
                      do_action('woocommerce_after_shop_loop');
                      ?>

                  <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

                      <?php wc_get_template('loop/no-products-found.php'); ?>

                  <?php endif; ?>

                <?php
                  /**
                   * woocommerce_after_main_content hook.
                   *
                   * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                   */
                  do_action('woocommerce_after_main_content');
                ?>

                <?php
                  /**
                   * woocommerce_sidebar hook.
                   *
                   * @hooked woocommerce_get_sidebar - 10
                   */
		//do_action( 'woocommerce_sidebar' );
                ?>

                <?php get_footer('shop'); ?>
