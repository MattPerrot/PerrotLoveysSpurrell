<?php

  /**

   * A unique identifier is defined to store the options in the database and reference them from the theme.

   * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.

   * If the identifier changes, it'll appear as if the options have been reset.

   */
  function optionsframework_option_name() {


      // This gets the theme name from the stylesheet

      $themename = wp_get_theme();

      $themename = preg_replace("/\W/", "_", strtolower($themename));



      $optionsframework_settings = get_option('optionsframework');

      $optionsframework_settings['id'] = $themename;

      update_option('optionsframework', $optionsframework_settings);
  }

  /**

   * Defines an array of options that will be used to generate the settings page and be saved in the database.

   * When creating the 'id' fields, make sure to use all lowercase and no spaces.

   *

   * If you are making your theme translatable, you should replace 'options_framework_theme'

   * with the actual text domain for your theme.  Read more:

   * http://codex.wordpress.org/Function_Reference/load_theme_textdomain

   */
  function optionsframework_options() {



      $options = array();


      
      

      $options[] = array(
          'name' => __('Header Settings', 'options_framework'),
          'type' => 'heading');


//header Logo 
       $options[] = array(
          'name' => __('Favicon', 'options_framework'),
          'desc' => __('Upload Favicon icon', 'options_framework'),
          'id' => 'favicon_icon',
          
          'type' => 'upload'); 
      
      $options[] = array(
          'name' => __('Call us', 'options_framework'),
          'desc' => __('Call text', 'options_framework'),
          'id' => 'call_ustext',
          'placeholder' => 'Call us:',
          'type' => 'text');
       
       
        $options[] = array(
          'name' => __('Call Number', 'options_framework'),
          'desc' => __('Call Number', 'options_framework'),
          'id' => 'call_usnum',
          'placeholder' => 'Enter Number',
          'type' => 'text');
      $options[] = array(
          'name' => __('Header Logo', 'options_framework_theme'),
          'desc' => __('Upload Header Logo.', 'options_framework'),
          'id' => 'header_logo',
          'type' => 'upload');

        $options[] = array(
                  'name' => __('Facebook Link', 'options_framework'),
                  //'desc' => __('Call text', 'options_framework'),
                  'id' => 'fb_libk_header',
                  'placeholder' => 'Enter Facebook link',
                  'type' => 'text');
        $options[] = array(
                  'name' => __('Twitter', 'options_framework'),
                  //'desc' => __('Call text', 'options_framework'),
                  'id' => 'twr_libk_header',
                  'placeholder' => 'Enter Twitter Link',
                  'type' => 'text');


    
      /* ----------------footer setting------------------- */
      $options[] = array(
          'name' => __('Footer Settings', 'options_framework'),
          'type' => 'heading');


      //foooter Logo 

      $options[] = array(
          'name' => __('Footer Logo', 'options_framework_theme'),
          'desc' => __('Upload Footer Logo.', 'options_framework'),
          'id' => 'footer_logo',
          'type' => 'upload');



         $options[] = array(
          'name' => __('Copy Right Text', 'options_framework'),
         // 'desc' => __('Copy_Right_Text', 'options_framework'),
          'id' => 'copyright_text_ftr',
          'placeholder' => '© 2016 Ropund 13 Clothing Co. All rights reserved.',
          'type' => 'text');
         
         $options[] = array(
          'name' => __('Homepage Settings', 'options_framework'),
          'type' => 'heading');
         
          $options[] = array(
          'name' => __('Part1 Image', 'options_framework_theme'),
          'desc' => __('Upload Image for Homepage Image1 Which Display Large', 'options_framework'),
          'id' => 'himage1',
          'type' => 'upload');
          
          $options[] = array(
          'name' => __('Image 1 Url', 'options_framework_theme'),
          'desc' => __('Enter url for image1', 'options_framework'),
          'id' => 'himage_url_1',
          'type' => 'text');
          
          $options[] = array(
          'name' => __('Image1 product category', 'options_framework_theme'),
          'desc' => __('Product Category Name', 'options_framework'),
          'id' => 'himg1_pro_cat',
          'type' => 'text');
          
           $options[] = array(
          'name' => __('Image 1 product type', 'options_framework_theme'),
          'desc' => __('Image1 product type', 'options_framework'),
          'id' => 'himage1_type',
          'type' => 'text');
           
           $options[] = array(
          'name' => __('Part2 Image', 'options_framework_theme'),
          'desc' => __('Upload Image for Homepage Image2', 'options_framework'),
          'id' => 'himage2',
          'type' => 'upload');
           
            $options[] = array(
          'name' => __('Image 2 Url', 'options_framework_theme'),
          'desc' => __('Enter url for image2', 'options_framework'),
          'id' => 'himage_url_2',
          'type' => 'text');
          
          $options[] = array(
          'name' => __('Image2 product category', 'options_framework_theme'),
          'desc' => __('Product Category Name', 'options_framework'),
          'id' => 'himg2_pro_cat',
          'type' => 'text');
          
           $options[] = array(
          'name' => __('Image 2 product type', 'options_framework_theme'),
          'desc' => __('Image2 product type', 'options_framework'),
          'id' => 'himage2_type',
          'type' => 'text');
           
           
           
           $options[] = array(
          'name' => __('Part3 Image', 'options_framework_theme'),
          'desc' => __('Upload Image for Homepage Image3', 'options_framework'),
          'id' => 'himage3',
          'type' => 'upload');
           
           
            $options[] = array(
          'name' => __('Image 3 Url', 'options_framework_theme'),
          'desc' => __('Enter url for image3', 'options_framework'),
          'id' => 'himage_url_3',
          'type' => 'text');
          
          $options[] = array(
          'name' => __('Image3 product category', 'options_framework_theme'),
          'desc' => __('Product Category Name', 'options_framework'),
          'id' => 'himg3_pro_cat',
          'type' => 'text');
          
           $options[] = array(
          'name' => __('Image 3 product type', 'options_framework_theme'),
          'desc' => __('Image3 product type', 'options_framework'),
          'id' => 'himage3_type',
          'type' => 'text');
           
           
            $options[] = array(
          'name' => __('Part4 Image', 'options_framework_theme'),
          'desc' => __('Upload Image for Homepage Image3', 'options_framework'),
          'id' => 'himage4',
          'type' => 'upload');
            
              $options[] = array(
          'name' => __('Image 4 Url', 'options_framework_theme'),
          'desc' => __('Enter url for image4', 'options_framework'),
          'id' => 'himage_url_4',
          'type' => 'text');
          
          $options[] = array(
          'name' => __('Image4 product category', 'options_framework_theme'),
          'desc' => __('Product Category Name', 'options_framework'),
          'id' => 'himg4_pro_cat',
          'type' => 'text');
          
           $options[] = array(
          'name' => __('Image 4 product type', 'options_framework_theme'),
          'desc' => __('Image4 product type', 'options_framework'),
          'id' => 'himage4_type',
          'type' => 'text');
           
           
         
      
//          $options[] = array(
//          'name' => __('Reserved Text', 'options_framework'),
//         // 'desc' => __('Copy_Right_Text', 'options_framework'),
//          'id' => 'reserved_text_ftr',
//          'type' => 'text');
       
          
  

//      $options[] = array(
//          'name' => __('Payment Image', 'options_framework_theme'),
//          'desc' => __('supported payment logo', 'options_framework'),
//          'id' => 'payment1',
//          'type' => 'upload');
    

//      $options[] = array(
//          'name' => __('error', 'options_framework_theme'),
//          'desc' => __('error', 'options_framework'),
//          'id' => 'error',
//          'type' => 'upload');



      
      
      /* ----------------OTHER setting------------------- */
//      $options[] = array(
//          'name' => __('other Settings', 'options_framework'),
//          'type' => 'heading');
//
//      $options[] = array(
//          'name' => __('Head office Address', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'headofficeaddress',
//          'std' => '',
//          'type' => 'text');
//       $options[] = array(
//          'name' => __('Head office Mail', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'headofficemail',
//          'std' => '',
//          'type' => 'text');
//
//       $options[] = array(
//          'name' => __('Head office Contact', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'headofficecontact',
//          'std' => '',
//          'type' => 'text');
//       
//       $options[] = array(
//          'name' => __('Head office Fax', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'headofficefax',
//          'std' => '',
//          'type' => 'text');
//       
//       
//       $options[] = array(
//          'name' => __('Office Address', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'officeaddress',
//          'std' => '',
//          'type' => 'text');
//       $options[] = array(
//          'name' => __('Office Mail', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'officemail',
//          'std' => '',
//          'type' => 'text');

//       $options[] = array(
//          'name' => __('Office Contact', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'officecontact',
//          'std' => '',
//          'type' => 'text');
//       
//       
//        $options[] = array(
//          'name' => __('Office Fax', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'officefax',
//          'std' => '',
//          'type' => 'text');
//       
//       
//         $options[] = array(
//          'name' => __('donation query mail', 'options_framework'),
//         // 'desc' => __('Address1', 'options_framework'),
//          'id' => 'donationqmail',
//          'std' => '',
//          'type' => 'text');
//         
          
      //foooter Logo 

//      $options[] = array(
//          'name' => __('Footer Logo', 'options_framework_theme'),
//          'desc' => __('Upload Footer Logo.', 'options_framework'),
//          'id' => 'footer_logo',
//          'type' => 'upload');



//      $options[] = array(
//          'name' => __('Head Address', 'options_framework'),
//          'desc' => __('Address1', 'options_framework'),
//          'id' => 'Address1',
//          'std' => '',
//          'type' => 'text');
//      
//       $options[] = array(
//          'name' => __('Head Address', 'options_framework'),
//          'desc' => __('Address1', 'options_framework'),
//          'id' => 'Address1',
//          'std' => '',
//          'type' => 'text');
//       
//        $options[] = array(
//          'name' => __('Head Address', 'options_framework'),
//          'desc' => __('Address1', 'options_framework'),
//          'id' => 'Address1',
//          'std' => '',
//          'type' => 'text');
//      
//       $options[] = array(
//          'name' => __('Address2', 'options_framework'),
//          'desc' => __('Address2', 'options_framework'),
//          'id' => 'Address2',
//          'std' => '',
//          'type' => 'text');
//       
//        $options[] = array(
//          'name' => __('Donation_Query', 'options_framework'),
//          'desc' => __('Donation_Query', 'options_framework'),
//          'id' => 'query',
//          'std' => '',
//          'type' => 'text');

      return $options;
  }
  