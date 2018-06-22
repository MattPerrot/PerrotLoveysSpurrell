<?php

  /*

   * Template Name:home-template

   */



  get_header();

?>



<section class="banner_section">

    <?php echo do_shortcode('[rev_slider alias="Homeslider"]'); ?> 

</section>



<section class="catagorie_section">

    <div class="container">

        <div class="row">

            <div class="col-sm-6">

                <div class="catagorie_contain">

                    <img src="<?php echo of_get_option('himage1') ?>" alt="womenhoodie"/>

                    <div class="catagorie_text">

                        <h2 class="title_h2"><span><?php echo of_get_option('himg1_pro_cat') ?></span><?php echo of_get_option('himage1_type') ?></h2>

                        <a href="<?php echo of_get_option('himage_url_1'); ?>" class="white_btn">Shop Now</a>

                    </div>

                </div>

            </div>

            <div class="col-sm-6">

                <div class="row">

                    <div class="col-sm-6">

                        <div class="catagorie_contain">

                            <img src="<?php echo of_get_option('himage2') ?>" alt="kidshoodie"/>

                            <div class="catagorie_text">

                                <h2 class="title_h2"><span><?php echo of_get_option('himg2_pro_cat') ?></span> <?php echo of_get_option('himage2_type') ?></h2>

                                <a href="<?php echo of_get_option('himage_url_2'); ?>" class="white_btn">Shop Now</a>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="catagorie_contain">

                            <img src="<?php echo of_get_option('himage3') ?>" alt="menhoodie"/>

                            <div class="catagorie_text">

                                <h2 class="title_h2"><span><?php echo of_get_option('himg3_pro_cat') ?></span> <?php echo of_get_option('himage3_type') ?></h2>

                                <a href="<?php echo of_get_option('himage_url_3'); ?>" class="white_btn">Shop Now</a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="catagorie_contain">

                    <img src="<?php echo of_get_option('himage4') ?>" alt="alternatelogoshirt"/>

                    <div class="catagorie_text">

                        <h2 class="title_h2"><span><?php echo of_get_option('himg4_pro_cat') ?></span><?php echo of_get_option('himage4_type') ?></h2>

                        <a href="<?php echo of_get_option('himage_url_4'); ?>" class="white_btn">Shop Now</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="product_section">

    <div class="container">

        <div id="filters" class="portfolio_btnmain button-group">

            <ul>

                <li><a href="javascript:void(0);" data-filter="*" class="is-checked">All</a></li>

                <?php

                  $frontend = get_option("froend_cat");

                  $cname = explode(',', $frontend);

                  foreach ($cname as $cat_name):

                ?>

                <li><a href="javascript:void(0);" data-filter=".<?php echo strtolower($cat_name); ?>"><?php echo strtoupper($cat_name); ?></a></li>

                <?php endforeach; ?>

            </ul>

        </div>

        <div class="row">

            <div class="responsive_filter">

                <div class="filter isotope">





                    <?php

                      $frontend1 = get_option("froend_cat");

                      $cname1 = explode(',', $frontend1);

                      $ppp = get_option("theme_name_num_elements");

                      foreach ($cname1 as $item):



                      $cat = get_option($item);

                      $cat_id = explode(',', $cat);

                    ?>



                    <?php

                      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                      $args = array(

                      'post_type' => 'product',

                      'posts_per_page' => $ppp,

                      'orderby' => 'ASC',

                      'paged' => $paged,

                      'page' => $paged,

                      'post_status' => 'publish',

                      'ignore_sticky_posts' => 1,

                      'meta_query' => array(

                      array(

                      'key' => '_visibility',

                      'value' => array('catalog', 'visible'),

                      'compare' => 'IN'

                      )

                      ),

                      'tax_query' => array(

                      array(

                      'taxonomy' => 'product_cat',

                      'field' => 'term_id', //This is optional, as it defaults to 'term_id'

                      'terms' => $cat_id,

                      'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.

                      )

                      )

                      );



                      $query = new wp_query($args);



                      while ($query->have_posts()):

                      global $product;



                      $query->the_post();

                    ?>



                    <div class="element-item <?php echo $item; ?> col-sm-3 isotope-item ">



                        <div class="shop_img">

                          <?php// the_post_thumbnail( 'medium' ); ?>

                              <?php  the_post_thumbnail('slider-name'); ?>

                          <?php// echo get_the_post_thumbnail( $post_id, array( 263, 313) ); ?>

                            <?php //echo get_the_post_thumbnail($query->post->ID); ?>

                            <!--<img class="img-responsive" src="<?php // echo get_template_directory_uri();                ?>/images/isotopimg1.jpg" alt="img"/>-->



                            <div class="img_overlay">

                                <?php if ( $product->is_type( 'variable' ) ): ?>

                                <a href="<?php the_permalink();?>" >View More</a>

                                <?php else: ?>

                                <a href="javascript:void(0);" data-product_id="<?php echo $query->post->ID; ?>" class="cart_product">Add to cart</a>

                                <?php endif;?>

                            </div>

                        </div>

                        <div class="product_name">

                            <a href="<?php echo get_permalink($query->post->ID) ?>"> <h5><?php echo get_the_title(); ?></h5></a>

                            <p><?php echo $product->get_price_html(); ?></p>

                        </div>

                    </div>

                    <?php

                      endwhile;

                      wp_reset_query();

                      endforeach;

                    ?>



                </div>



            </div>



        </div>

    </div>

</section>

<section class="story_section">

    <div class="container">

        <?php $the_query = new WP_Query('page_id=6'); ?>



        <?php

          while ($the_query->have_posts()) : $the_query->the_post(); ?>







        <div class="ourstory_contain gray_bg">

            <div class="row">

                <div class="col-sm-4">

                    <?php echo get_the_post_thumbnail(); ?>

                </div>

                <div class="col-sm-8">

                    <h2 class="title_h2"><span><?php the_title(); ?></span>

                      <?php echo get_post_meta(get_the_ID(),"subtitle_id",TRUE); ?>

                    </h2>

                    <div class="story_contain">

                        <p><?php the_excerpt(); ?></p>

                        <a href="<?php echo get_the_permalink(); ?>" class="white_btn">Read more</a>

                    </div>

                </div>

            </div>







            <?php endwhile; ?>

        </div>

    </div>

</section>

<!--<section class="blog_section">

    <div class="container">

        <h2 class="title_h2">Latest from the Blog</h2>

        <div class="row hblog_contain">

            <?php

              //query_posts(array('post_type' => 'Blogs', 'posts_per_page' => 2, 'orderby' => 'title', 'order' => 'desc'));

              //if (have_posts()) : while (have_posts()) : the_post();

            ?>

            <div class="col-md-6">

                <div class="gray_bg">

                    <div class="row">

                        <div class="col-md-6 col-sm-5">

                            <?php

                              //if (has_post_thumbnail()) {

                             // $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');

//                                          echo '<img src="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '"  >';

                             // }

                            ?>

                            <?php // the_post_thumbnail('blog-thumnail_image'); ?>

                            <?php // the_post_thumbnail( 'medium' ); ?>

                            <?php //the_post_thumbnail(array(263, 264)); ?>

                                    <img src="<?php //echo get_template_directory_uri();                           ?>/images/blogimg1.jpg" alt="blogimg"/>

                        </div> 

                        <div class="col-md-6 col-sm-7">

                            <div class="blog_text_gray">

                                <h4 class="title_h4"><?php //echo wp_trim_words(get_the_title(), 10, '...'); ?><span><?php //echo get_the_date('M d, Y') ?></span></h4>



                                <p><?php //echo wp_trim_words(get_the_content(), 13, '...'); ?> </p>

                                <a href="<?php //echo get_permalink(); ?>" class="arrow_a"></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div> 

            <?php //endwhile; ?>

            <?php //endif; ?><?php wp_reset_query(); ?>

        </div>

        <a href="<?php //echo get_the_permalink(10); ?>" class="white_btn border_btn">View More</a>

    </div>

</section>-->

<?php get_footer(); ?>        





