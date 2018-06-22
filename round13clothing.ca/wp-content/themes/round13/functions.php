<?php
//========= theme option start ==========//////
  define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
  require_once dirname(__FILE__) . '/inc/options-framework.php';
// Loads options.php from child or parent theme
  $optionsfile = locate_template('options.php');
  load_template($optionsfile);
  /*
   * This is an example of how to add custom scripts to the options panel.
   * This one shows/hides the an option when a checkbox is clicked.
   *
   * You can delete it if you not using that option
   */
  add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

  function optionsframework_custom_scripts() {
      ?>

      <script type="text/javascript">
          jQuery(document).ready(function () {
              jQuery('#example_showhidden').click(function () {
                  jQuery('#section-example_text_hidden').fadeToggle(400);
              });
              if (jQuery('#example_showhidden:checked').val() !== undefined) {
                  jQuery('#section-example_text_hidden').show();
              }
          });
      </script>

      <?php
  }

//====== theme option end =========///
  if (!function_exists('round13_setup')) :

      function round13_setup() {

          load_theme_textdomain('round13');


          add_theme_support('custom-logo');

          register_nav_menus(array(
              'header-menu' => __('header-menu', 'round13'),
          ));
          register_nav_menus(array(
              'footer-menu' => __('footer-menu', 'round13'),
          ));

          add_theme_support('html5', array('search-form'));
          //add_theme_support('post-thumbnails');
          add_theme_support('post-thumbnails');
          add_image_size('new-image-name', 263, 264, true);
           add_image_size('slider-name', 263, 313, true);
          //set_post_thumbnail_size( 263, 264, true );
          //add_image_size("small-thumbnails", 180, 120, TRUE);
          add_image_size("banner-image", 920, 210, ["left", "top"]);
          add_image_size( 'blog-thumnail_image', 263, 264,TRUE); 
          add_theme_support("html5", ["comment-list", 'form', "comment-form", "search-form"]);
      }

  endif; // twentysixteen_setup
  add_action('after_setup_theme', 'round13_setup');

  function mythemename_all_scriptsandstyles() {

      /* Link Style */
      wp_enqueue_style('round13-flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '1.0', 'all');
      wp_enqueue_style('round13-jqeury_ui', get_template_directory_uri() . '/css/jquery-ui.css', array(), '1.0', 'all');
      wp_enqueue_style('round13-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
      wp_enqueue_style('round13-isotop', get_template_directory_uri() . '/css/isotop.css', array(), '1.0', 'all');
      wp_enqueue_style('round13-style_b', get_template_directory_uri() . '/css/style_b.css', array(), '1.0', 'all');
      wp_enqueue_style('round13-style', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
      wp_enqueue_style('round13-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all');
      wp_enqueue_style('round13-customcss', get_template_directory_uri() . '/css/customcss.css', array(), '1.0', 'all');

      /*       * Link Script* */

      wp_enqueue_script('round13-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(''), '1.0', TRUE);
      wp_enqueue_script('round13-flexslider_js', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '', TRUE);
      wp_enqueue_script('round13-jquery_us_js', get_template_directory_uri() . '/js/jquery-ui.js', array(), '', TRUE);
      wp_enqueue_script('round13-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', TRUE);
      wp_enqueue_script('round13-isotop', get_template_directory_uri() . '/js/isotop.js', array(), '', TRUE);
      wp_enqueue_script('round13-custom', get_template_directory_uri() . '/js/custom.js', array(), '', TRUE);
      wp_enqueue_script('round13-mycust', get_template_directory_uri() . '/js/mycust.js', array(), '', TRUE);
  }

  add_action('wp_enqueue_scripts', 'mythemename_all_scriptsandstyles');





  /*   * * breadcrumbs stsarts  */

  function custom_breadcrumbs() {
      $home_title = 'Home';
      // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
      $custom_taxonomy = 'product_cat';
      // Get the query & post information
      global $post, $wp_query;
      // Do not display on the homepage
      if (!is_front_page()) {
          // Build the breadcrums
          echo '<ol class="breadcrumb">';
          // Home page
          echo ' <li class="breadcrumb-item"><a href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
          if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
              echo '<li class="">' . post_type_archive_title($prefix, false) . '</li>';
          } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {
              // If post is a custom post type
              $post_type = get_post_type();
              // If it is a custom post type display name and link
              if ($post_type != 'post') {
                  $post_type_object = get_post_type_object($post_type);
                  $post_type_archive = get_post_type_archive_link($post_type);
                  echo '<li class="aaazzz"><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              }
              $custom_tax_name = get_queried_object()->name;
              echo '<li>' . $custom_tax_name . '</li>';
          } else if (is_single()) {
              // If post is a custom post type
              $post_type = get_post_type();
              // If it is a custom post type display name and link
              if ($post_type != 'post') {
                  $post_type_object = get_post_type_object($post_type);
                  $post_type_archive = get_post_type_archive_link($post_type);
                  $ponm = $post_type_object->labels->name;
                  //echo '<li>' . $post_type_object->labels->name . '</li>';
                  echo '<li class="breadcrumb-item"><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              }
              // Get post category info
              $category = get_the_category();
              if (!empty($category)) {
                  // Get last category post is in
                  $last_category = end(array_values($category));
                  // Get parent any categories and create array
                  $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                  $cat_parents = explode(',', $get_cat_parents);

                  // Loop through parent categories and store in variable $cat_display
                  $cat_display = '';
                  foreach ($cat_parents as $parents) {
                      $cat_display .= '<li >' . $parents . '</li>';
                  }
              }
              // If it's a custom post type within a custom taxonomy
              $taxonomy_exists = taxonomy_exists($custom_taxonomy);
              if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                  $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
                  $cat_id = $taxonomy_terms[0]->term_id;
                  $cat_nicename = $taxonomy_terms[0]->slug;
                  $cat_link = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                  $cat_name = $taxonomy_terms[0]->name;
              }

              // Check if the post is in a category
              if (!empty($last_category)) {
                  echo $cat_display;
                  echo '<li >' . get_the_title() . '</li>';

                  // Else if post is in a custom taxonomy
              } else if (!empty($cat_id)) {

                  echo '<li class="a">' . get_the_title() . '</li>';
              } else {

                  echo '<li class="breadcrumb-item active blogitem">' . get_the_title() . '</strong></li>';
              }
          } else if (is_category()) {

              // Category page
              echo '<li class="ac">' . single_cat_title('', false) . '</li>';
          } else if (is_page()) {

              // Standard page
              if ($post->post_parent) {
                  // If child page, get parents 
                  $anc = get_post_ancestors($post->ID);
                  // Get parents in the right order
                  $anc = array_reverse($anc);
                  // Parent page loop
                  foreach ($anc as $ancestor) {
                      $parents .= '<li class="ad"><a  href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                  }
                  // Display parent pages
                  echo $parents;
                  // Current page
                  echo '<li class="aaa">' . get_the_title() . '</li>';
              } else {
                  // Just display current page if not parents
                  echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
              }
          } else if (is_tag()) {
              // Tag page
              // Get tag information
              $term_id = get_query_var('tag_id');
              $taxonomy = 'post_tag';
              $args = 'include=' . $term_id;
              $terms = get_terms($taxonomy, $args);
              $get_term_id = $terms[0]->term_id;
              $get_term_slug = $terms[0]->slug;
              $get_term_name = $terms[0]->name;
              // Display the tag name
              echo '<li class="as">' . $get_term_name . '</li>';
          } elseif (is_day()) {
              // Day archive
              // Year link
              echo '<li class="ea"><a href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
              // Month link
              echo '<li class="ay"><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
              // Day display
              echo '<li>' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';
          } else if (is_month()) {

              // Month Archive
              // Year link
              echo '<li ><a href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

              // Month display
              echo '<li><strong  title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
          } else if (is_year()) {

              // Display year archive
              echo '<li><strong  title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
          } else if (is_author()) {
              // Auhor archive
              // Get the author information
              global $author;
              $userdata = get_userdata($author);

              // Display author name
              echo '<li><strong title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
          } else if (get_query_var('paged')) {
              // Paginated archives
              echo '<li>' . __('Page') . ' ' . get_query_var('paged') . '</li>';
          } else if (is_search()) {
              // Search results page
              echo '<li>Search results for: ' . get_search_query() . '</li>';
          } elseif (is_404()) {
              // 404 page
              echo '<li>' . 'Error 404' . '</li>';
          }
          echo '</ol>
    ';
      }
  }

  /*   * * breadcrumbs ends  */




  add_filter('show_admin_bar', '__return_false');

  /*  pagination starts */

  function custom_pagination() {
      global $query;
      $big = 999999999;
      $pages = paginate_links(array(
          'base' => str_replace($big, '%#%', get_pagenum_link($big)),
          'format' => '?page=%#%',
          'current' => max(1, get_query_var('paged')),
          'total' => $query->max_num_pages,
          'prev_next' => TRUE,
          'type' => 'array',
          'prev_next' => TRUE,
          'prev_text' => '',
          'next_text' => '',
      ));
      if (is_array($pages)) {
          $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
          echo '<ul class="pagination blog_paginaction">';
          foreach ($pages as $i => $page) {
              if ($current_page == 1 && $i == 0) {
                  echo "<li class='active'><a>$page</a></li>";
              } else {
                  if ($current_page != 1 && $current_page == $i) {
                      echo "<li class='active'><a>$page</a></li>";
                  } else {
                      echo "<li>$page</li>";
                  }
              }
          }
          echo '</ul>';
      }
  }

  add_filter('custpage', 'custom_pagination');
  /*  pagination ends */





  /*   * * active class menu  */
  add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

  function special_nav_class($classes, $item) {
      if (in_array('current-menu-item', $classes)) {
          $classes[] = 'active ';
      }
      return $classes;
  }

  /*   * **  Blogs slider post    ====== * */

  function blog_slider() {

      $labels = array(
          'name' => _x('News / Blog ', 'Post Type General Name', 'round'),
          'singular_name' => _x('Blogs', 'Post Type Singular Name', 'round'),
          'menu_name' => __('Blogs', 'round'),
          'parent_item_colon' => __('Parent Blogs', 'round'),
          'all_items' => __('All ', 'round'),
          'view_item' => __('View ', 'round'),
          'add_new_item' => __('Add New ', 'round'),
          'add_new' => __('Add New ', 'round'),
          'edit_item' => __('Edit', 'round'),
          'update_item' => __('Update ', 'round'),
          'search_items' => __('Search ', 'round'),
          'not_found' => __('Not Found', 'round'),
          'not_found_in_trash' => __('Not found in Trash', 'round'),
      );
      $args = array(
          'label' => __('Blogs ', 'round'),
          'description' => __('Review ', 'round'),
          'labels' => $labels,
          'supports' => array('title', 'editor', 'excerpt', 'author', 'tags', 'thumbnail', 'comments', 'revisions',),
          'hierarchical' => false,
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'show_in_nav_menus' => true,
          'show_in_admin_bar' => true,
          'menu_position' => 5,
          'menu_icon' =>'dashicons-welcome-write-blog',
          'can_export' => true,
          'has_archive' => true,
          'exclude_from_search' => false,
          'publicly_queryable' => true,
          'capability_type' => 'page',
          'taxonomies' => array('post_tag', 'category'),
      );
      register_post_type('Blogs', $args);
  }

  add_action('init', 'blog_slider', 0);

  add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10, 3);

  function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
      global $woocommerce;
      extract($_POST);
      if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {

          return new WP_Error('registration-error', __('First name required.', 'woocommerce'));
      }
      if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {

          return new WP_Error('registration-error', __('Last name required.', 'woocommerce'));
      }

      if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {

          return new WP_Error('registration-error', __('Phone required.', 'woocommerce'));
      }

      if (strcmp($password, $password2) !== 0) {
          return new WP_Error('registration-error', __('Passwords do not match.', 'woocommerce'));
      }
      return $reg_errors;
  }

  add_action('woocommerce_register_form', 'wc_register_form_password_repeat');

  function wc_register_form_password_repeat() {
      ?>
      <p class="form-row form-row-wide">
          <label for="reg_password2"><?php _e('Confirm Password*', 'woocommerce'); ?> <span class="required"></span></label>
          <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password2" id="reg_password2" value="" />
      </p>
      <?php
  }

  function wooc_save_extra_register_fields($customer_id) {
      if (isset($_POST['billing_first_name'])) {
          // WordPress default first name field.
          update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
          // WooCommerce billing first name.
          update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
      }
      if (isset($_POST['billing_last_name'])) {
          // WordPress default last name field.
          update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
          // WooCommerce billing last name.
          update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
      }
      if (isset($_POST['billing_phone'])) {
          // WooCommerce billing phone
          update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
      }
  }

  add_action('woocommerce_created_customer', 'wooc_save_extra_register_fields');



  /*   * Theme option for home page* */

  require_once ( get_stylesheet_directory() . '/theme-options.php' );


  /*
   *  Add to cart ( Customer custom picture )
   */
  add_action('wp_ajax_add_to_cart_custom', 'add_to_cart_customer_custom');
  add_action('wp_ajax_nopriv_add_to_cart_custom', 'add_to_cart_customer_custom');

  function add_to_cart_customer_custom() {
      global $woocommerce;
      session_start();

      if ($_POST['product_id'] != '') {
          $product_id = $_POST['product_id'];

          $woocommerce->cart->add_to_cart($product_id);
          echo $product_id;
      } else {

          echo 0;
      }

      die(0);
  }

  /*
   * get_custom_product_cat
   */
  add_action('wp_ajax_get_custom_product_cat', 'get_custom_product_cat');
  add_action('wp_ajax_nopriv_get_custom_product_cat', 'get_custom_product_cat');

  function get_custom_product_cat() {
      global $woocommerce;
      session_start();

      if ($_POST['cat_name'] != '') {
          $shtml = '';
          $cate_name = $_POST['cat_name'];


          $taxonomy_id = get_queried_object()->term_id;


          $var = array(
              'hierarchical' => 1,
              'show_option_none' => '',
              'hide_empty' => 0,
              'parent' => 0,
              'taxonomy' => 'product_cat'
          );
          $categories = get_categories($var);
          $select_cat_id = get_option($cate_name);
          $scat_id = explode(',', $select_cat_id);

          foreach ($categories as $cat):
              $var = array(
                  'hierarchical' => 1,
                  'show_option_none' => '',
                  'hide_empty' => 0,
                  'parent' => $cat->term_id,
                  'taxonomy' => 'product_cat'
              );
              $subcategories = get_categories($var);

              $shtml .='<tr><th>' . $cat->cat_name . '</th></tr>';

              $shtml .='<tr>';
              foreach ($subcategories as $subcat):
                  $shtml .= '<td>';
                  if (in_array($subcat->cat_ID, $scat_id)) {
                      $shtml .='<input type="checkbox" checked name="mcat[]" value="' . $subcat->cat_ID . '">' . $subcat->cat_name;
                  } else {
                      $shtml .='<input type="checkbox" name="mcat[]" value="' . $subcat->cat_ID . '">' . $subcat->cat_name;
                  }
                  $shtml .='</td>';
              endforeach;

              $shtml .='</tr>';
          endforeach;
          echo $shtml;
      } else {

          echo 0;
      }

      die(0);
  }

  add_filter('woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs');

  function jk_woocommerce_breadcrumbs() {
      return array(
          'delimiter' => ' &#47; ',
          'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
          'wrap_after' => '</nav>',
          'before' => '',
          'after' => '',
          'home' => _x('Home', 'breadcrumb', 'woocommerce'),
      );
  }




  add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

// Our hooked in function - $fields is passed via the filter!
  function custom_override_checkout_fields($fields) {

      $fields['billing']['billing_first_name'] = array(
          'label' => __('First Name', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
              //'clear' => true
      );
      $fields['billing']['billing_last_name'] = array(
          'label' => __('Last Name', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
              //'clear' => true
      );
      $fields['billing']['billing_company'] = array(
          'label' => __('Company Name', 'woocommerce'),
          'required' => false,
          'class' => array('col-sm-12 check_form'),
//          'clear' => true
      );
      $fields['billing']['billing_email'] = array(
          'label' => __('Email Address ', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
              // 'clear' => true
      );
      $fields['billing']['billing_phone'] = array(
          'label' => __('Phone No. ', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
              //'clear' => true
      );
      $fields['billing']['billing_address_1'] = array(
          'label' => __('Address ', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-12 check_form'),
              //'clear' => true
      );
      $fields['billing']['billing_address_2'] = array(
          'class' => array('col-sm-12 check_form'),
              //'clear' => true
      );
      $fields['billing']['billing_city'] = array(
          'label' => __('Town / City* ', 'woocommerce'),
          'class' => array('col-sm-12 check_form'),
              // 'clear' => true
      );
      $fields['billing']['billing_state'] = array(
          'label' => __('State ', 'woocommerce'),
          'class' => array('col-sm-6 check_form select'),
              //'clear' => true
      );
      $fields['billing']['billing_postcode'] = array(
          'label' => __('Post Code ', 'woocommerce'),
          'class' => array('col-sm-6 check_form right_name'),
              //'clear' => true
      );


      return $fields;
  }

// shipping address class
  add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields_shp');

// Our hooked in function - $fields is passed via the filter!
  function custom_override_checkout_fields_shp($fields) {

      $fields['shipping']['shipping_first_name'] = array(
          'label' => __('First Name', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
              //'clear' => true
      );
      $fields['shipping']['shipping_last_name'] = array(
          'label' => __('Last Name', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
      );
      $fields['shipping']['shipping_company'] = array(
          'label' => __('Company Name', 'woocommerce'),
          'required' => false,
          'class' => array('col-sm-12 check_form'),
          'clear' => true
      );
      $fields['shipping']['shipping_email'] = array(
          'label' => __('Email Address ', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
      );
      $fields['shipping']['shipping_phone'] = array(
          'label' => __('Phone No. ', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-6 check_form'),
      );
      $fields['shipping']['shipping_address_1'] = array(
          'label' => __('Address ', 'woocommerce'),
          'required' => true,
          'class' => array('col-sm-12 check_form'),
      );
      $fields['shipping']['shipping_address_2'] = array(
          'class' => array('col-sm-12 check_form'),
      );
      $fields['shipping']['shipping_city'] = array(
          'label' => __('Town / City* ', 'woocommerce'),
          'class' => array('col-sm-12 check_form'),
      );
      $fields['shipping']['shipping_state'] = array(
          'label' => __('State ', 'woocommerce'),
          'class' => array('col-sm-6 check_form select'),
      );
      $fields['shipping']['shipping_postcode'] = array(
          'label' => __('Post Code ', 'woocommerce'),
          'class' => array('col-sm-6 check_form right_name'),
      );

      return $fields;
  }

// checkout payment method

  add_filter('gettext', 'ld_custom_paypal_button_text', 20, 3);

  function ld_custom_paypal_button_text($translated_text, $text, $domain) {
      switch ($translated_text) {
          case 'Proceed to PayPal' :
              $translated_text = __('place order', 'woocommerce');
              break;
      }
      return $translated_text;
  }

  function replacePayPalIcon($iconUrl) {
      return get_bloginfo('stylesheet_directory') . '/images/payment_img.png';
  }

  add_filter('woocommerce_paypal_icon', 'replacePayPalIcon');


  add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

  function woo_remove_product_tabs($tabs) {

      unset($tabs['additional_information']);
      unset($tabs['reviews']);    // Remove the additional information tab
      unset($tabs['description']);

      return $tabs;
  }

  function theme_widgets_init() {

      register_sidebar(array(
          'name' => __('Shop Page custom filter', 'round13'),
          'id' => 'shop_custom',
          'description' => __('Add widgets here to appear in your sidebar.', 'ppv'),
          'before_widget' => '<section id="%1$s" class="widget %2$s">',
          'after_widget' => '</section>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
      ));
  }

  add_action('widgets_init', 'theme_widgets_init');


  remove_action('woocommerce_single_product_summary', 'toastie_wc_smsb_form_code', 31);


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
  add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

  function woocommerce_header_add_to_cart_fragment($fragments) {
      ob_start();
      ?>
      <span id="cart_pop">
          <?php
          $count = WC()->cart->get_cart_contents_count();
          if (!empty($count)) {
              echo $count;
          } else {
              echo "0";
          }
          ?>
      </span>
      <?php
      $fragments['#cart_pop'] = ob_get_clean();

      return $fragments;
  }

 
  
  /*********subtitle********/
   function add_subtitle_meta_boxes() {
      add_meta_box("subtitle_meta", "Page Subtitle", "add_subtitle_id_meta_box", "page", "normal", "low");
  }

  function add_subtitle_id_meta_box() {
      global $post;
      $custom = get_post_custom($post->ID);
      ?>
      <style>.width99 {width:30%;}</style>

      <p>
          <label>Enter Subtitle:</label><br />
          <input type="text" name="subtitle_id" value="<?= @$custom["subtitle_id"][0] ?>" class="width99" />
      </p>

      <?php
  }

  /**
   * Save custom field data when creating/updating posts
   */
  function save_subtitle_custom_fields() {
      global $post;

      if ($post) {
          update_post_meta($post->ID, "subtitle_id", @$_POST["subtitle_id"]);
      }
  }

  add_action('admin_init', 'add_subtitle_meta_boxes');
  add_action('save_post', 'save_subtitle_custom_fields');
/**

 *
 * Change number of related products on product page
 *
 */

function tm_related_products_limit() {
    global $product;
    $orderby = '';
    $related = $product->get_related(4);
    $args = array(
        'post_type'           => 'product',
        'posts_per_page'      => 4,
        
    );
    return $args;
}
add_filter( 'woocommerce_related_products_args', 'tm_related_products_limit' );