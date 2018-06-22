<?php

  function setup_theme_admin_menus() {

      add_submenu_page('themes.php', 'Front Page Elements', 'Front Page', 'manage_options', 'front-page-elements', 'theme_front_page_settings');
      /*
       *   add_submenu_page('themes.php', 'Frooter', 'Frooter', 'manage_options', 'footer-elements', 'theme_footer_settings');
       */
  }

  /*
    function theme_footer_settings(){
    echo "hello world";
    }

   */

  function theme_front_page_settings() {

      /* get all value 
       */

      $num_elements = get_option("theme_name_num_elements");
      ?>
      <div class="row"> 
          <div class="container">

              <?php screen_icon('themes'); ?> <h2>Front page elements</h2>
              <?php if (isset($_POST)): ?>
                  <div id="message" class="updated">Settings saved</div>
              <?php endif; ?>

              <form method="POST" name="frm_pro" action="">
                  <table class="form-table">
                      <tr valign="top">
                          <th scope="row">
                              <label for="num_elements">
                                  Number of Product Per Category:
                              </label> 
                          </th>
                          <td>

                              <input type="text" name="num_elements" size="25" value="<?php echo $num_elements; ?>" />
                              <input type="submit" class="button-primary" name="pro_submit" value="Set" />
                          </td>
                          
                      </tr>

                  </table>
              </form>
              <form method="POST" action="">
                  <h3>Get product category</h3>
                  <h4>Display Category On Gallery Section.</h4>

                  <?php
//                      $posts = get_posts();
                  $taxonomy_id = get_queried_object()->term_id;

                  $var = array(
                      'hierarchical' => 1,
                      'show_option_none' => '',
                      'hide_empty' => 0,
                      'parent' => 0,
                      'taxonomy' => 'product_cat'
                  );
                  $categories = get_categories($var);



                  foreach ($categories as $cat):
                      $var = array(
                          'hierarchical' => 1,
                          'show_option_none' => '',
                          'hide_empty' => 0,
                          'parent' => $cat->term_id,
                          'taxonomy' => 'product_cat'
                      );
                      ?>
                      <div class="row">
                          <?php
                          $subcategories = get_categories($var);
                          echo "<h4>$cat->cat_name</h4>";
                          ?>

                          <div class="col-sm-4" id="featured-posts-list">
                              <?php foreach ($subcategories as $subcat): ?>
                                  <label for="element-page-id"><?php echo $subcat->cat_name; ?></label>
                                  <input type="checkbox" id="element-page-id" name ="show_cat[]" value="<?php echo $subcat->cat_ID; ?>">
                              <?php endforeach; ?>

                          </div>
                      </div>

                      <?php
                  endforeach;
                  ?>
                  <input type="hidden" name="element-max-id" />
                  <input type="hidden" name="update_settings" value="Y" />
                  <label for="cat_name">
                      Enter Category Name:
                  </label>
                  <input type="text" id="cat_name" required autocomplete="off" name="cat_name" value="" />


                  <p>
                      <input type="submit" value="Save settings" class="button-primary"/>
                  </p>
              </form>
          </div>
          <!-----------Display custom category and update/delete ------->

          <div class="advanced-label"><h4>Display custom category and update/delete</h4></div>
          <div class="container">
              <form name="modify_cat" method="POST">
                  <select name="cat_select" id="cat_select" required>
                      <option value="">Select Custom Category</option>
                      <?php
                      $all_cat = get_option("froend_cat");
                      $acat_name = explode(',', $all_cat);
                      $c = 1;
                      foreach ($acat_name as $item) {


                          echo "<option value='$item'>" . strtoupper($item) . "</option>";
                      }
                      ?>
                  </select>
                  <select name="cat_action" required>
                      <option value="">Select Action</option>
                      <option value="delete">Delete</option>
                      <option value="update">Update</option>
                  </select>
                  <input type="submit" name='cat_setting' class="button-primary" value="Apply Action" />
                  <input type="hidden" name="category_update" value="yes" />


                  <table id="display_cat">

                  </table>
              </form>
          </div>
      </div>
      <!--------------------------Footer JAVASCRIPT CODE------------------------------------->
      <script type="text/javascript">
          var elementCounter = 0;
          jQuery(document).ready(function () {
              jQuery("#featured-posts-list").sortable({
                  stop: function (event, ui) {
                      var i = 0;

                      jQuery("li", this).each(function () {
                          setElementId(this, i);
                          i++;
                      });

                      elementCounter = i;
                      jQuery("input[name=element-max-id]").val(elementCounter);
                  }
              });
              jQuery("#add-featured-post").click(function () {
                  var elementRow = jQuery("#front-page-element-placeholder").clone();
                  var newId = "front-page-element-" + elementCounter;

                  elementRow.attr("id", newId);
                  elementRow.show();

                  var inputField = jQuery("select", elementRow);
                  inputField.attr("name", "element-page-id-" + elementCounter);

                  var labelField = jQuery("label", elementRow);
                  labelField.attr("for", "element-page-id-" + elementCounter);

                  elementCounter++;
                  var removeLink = jQuery("a", elementRow).click(function () {
                      removeElement(elementRow);
                      return false;
                  })
                  jQuery("input[name=element-max-id]").val(elementCounter);

                  jQuery("#featured-posts-list").append(elementRow);

                  return false;
              });
          });

          function setElementId(element, id) {
              var newId = "front-page-element-" + id;

              jQuery(element).attr("id", newId);

              var inputField = jQuery("select", element);
              inputField.attr("name", "element-page-id-" + id);

              var labelField = jQuery("label", element);
              labelField.attr("for", "element-page-id-" + id);
          }

          function removeElement(element) {
              jQuery(element).remove();
          }


          jQuery(document).on("change", "#cat_select", function () {
              var cname = jQuery(this).val();

              jQuery.ajax({
                  url: '<?php echo admin_url('admin-ajax.php'); ?>',
                  type: 'POST',
                  dataType: "html",
                  data: {
                      action: 'get_custom_product_cat',
                      cat_name: cname,
                  },
                  beforeSend: function (xhr, opt) {
                  },
                  success: function (response) {
                      if (response != '0') {
                          jQuery('#display_cat').html(response);
                      } else {
                          jQuery('#display_cat').html('');
                      }

                  },
                  error: function (response) {
                      alert("Something goes wrong,Please try again later");
                  }
              });



          });



      </script>

      <?php
  }

  add_action("admin_menu", "setup_theme_admin_menus");
  /*
    if (is_admin()) {
    wp_enqueue_script('jquery-ui-sortable');
    }
   */
  /*   * *Insert New Custom category code ************************* */
  if (isset($_POST['pro_submit'])) {
      $num_elements = esc_attr($_POST["num_elements"]);
      update_option("theme_name_num_elements", $num_elements);
  }
  if (isset($_POST["update_settings"])) {
      $catgory_name = esc_attr($_POST['cat_name']);
      $catgory_id = $_POST['show_cat'];
      if (!empty($catgory_name) && count($catgory_id) > 0):
          $cat_name = get_option("froend_cat");




          $catgory_name = esc_attr($_POST['cat_name']);



          /* check duplicate category name */
          $cat_name_tmp = explode(',', $cat_name);
          if (!in_array($catgory_name, $cat_name_tmp)) {
              $cat_name .=',' . $catgory_name;
              $cat_name = trim($cat_name, ',');
          }
          $get_cat_name = get_option($catgory_name);
          $ct_id = $get_cat_name;

          if (!empty($get_cat_name)) {

              $cat_id_tmp = explode(',', $get_cat_name);

              foreach ($catgory_id as $cat) {
                  if (!in_array($cat, $cat_id_tmp)) {
                      $ct_id .=',' . $cat;
                  }
              }
          } else {
              $ct_id = '';
              foreach ($catgory_id as $cat) {
                  $ct_id .=',' . $cat;
              }
          }


          $cat_id = $ct_id;

          $cat_id = trim($cat_id, ',');


          update_option("froend_cat", $cat_name);
          update_option("$catgory_name", $cat_id);


      endif;
  }

  /*   * ******************Update/Delete Exisiting Custom category code ************************* */

  if (isset($_POST['cat_setting'])):
      $action = $_POST['cat_action'];
      $select_cat = $_POST['cat_select'];
      $select_cat = strtolower($select_cat);
      $modify_cat = $_POST['mcat'];
      if (!empty($action) && !empty($select_cat)):

          $db_cat_name = get_option("froend_cat");
          $ct_name = explode(',', $db_cat_name);
          $new_cat_db = '';

          switch ($action) {
              case "delete":
                  foreach ($ct_name as $item) {
                      if (strtolower($item) !== $select_cat) {
                          $new_cat_db .= ',' . $item;
                      }
                  }
                  $new_cat_db = trim($new_cat_db, ',');
                  update_option("froend_cat", $new_cat_db);
                  delete_option($select_cat);
                  break;
              case "update":
                  $ct_id = '';
                  foreach ($modify_cat as $item_id) {
                      $ct_id .=',' . $item_id;
                  }
                  $ct_id = trim($ct_id, ',');
                  update_option("$select_cat", $ct_id);
                  break;
          }


      endif;
      
  endif;