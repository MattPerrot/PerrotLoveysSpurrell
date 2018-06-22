<?php get_header(); ?>
        <section class="banner_section">
            <div id="banner_slider" class="flexslider">
                <ul class="slides">
                    <?php   query_posts(array('post_type' => 'Slider','orderby'=> 'title', 'order' => 'ASC' ));
                             if (have_posts()) : while (have_posts()) : the_post();  ?>
                    <li>
                        <div class="text_contain">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span><?php the_title(); ?></span>
                                        <?php the_content(); ?>
                                        <a href="shop.html" class="white_btn">Shop Now</a>
                                    </div>
                                    <div class="img_section">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/shirt_imgb.png" alt="banner_img" />
                                        <?php the_post_thumbnail('full', array('class' => 'second_img')); ?>
<!--                                        <img src="<?php //echo get_template_directory_uri(); ?>/images/shirt_imgb1.png" alt="banner_img" class="second_img"/>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                       <?php endwhile; ?>
                    <?php endif; ?><?php  wp_reset_query();?>
                   
                </ul>
            </div>
        </section>
        <section class="catagorie_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="catagorie_contain">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/womenhoodie.jpg" alt="womenhoodie"/>
                            <div class="catagorie_text">
                                <h2 class="title_h2"><span>Women</span> Hoodies</h2>
                                <a href="shop.html" class="white_btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="catagorie_contain">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/kidshoodie.jpg" alt="kidshoodie"/>
                                    <div class="catagorie_text">
                                        <h2 class="title_h2"><span>Kids</span> Hoodies</h2>
                                        <a href="shop.html" class="white_btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="catagorie_contain">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/menhoodie.jpg" alt="menhoodie"/>
                                    <div class="catagorie_text">
                                        <h2 class="title_h2"><span>Men</span> Hoodies</h2>
                                        <a href="shop.html" class="white_btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="catagorie_contain">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/alternatelogoshirt.jpg" alt="alternatelogoshirt"/>
                            <div class="catagorie_text">
                                <h2 class="title_h2"><span>alternate</span>logo shirt</h2>
                                <a href="shop.html" class="white_btn">Shop Now</a>
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
                        <li><a href="javascript:void(0);" data-filter=".tshirt">Tshirt</a></li>
                        <li><a href="javascript:void(0);" data-filter=".hoodie">Hoodie</a></li>
                        <li><a href="javascript:void(0);" data-filter=".hat">hat</a></li>
                        <li><a href="javascript:void(0);" data-filter=".touque">Touque</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="responsive_filter">
                        <div class="filter isotope">
                            <div class="element-item tshirt col-sm-3 isotope-item ">
                                <div class="shop_img">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/isotopimg1.jpg" alt="img"/>
                                    <div class="img_overlay">
                                        <a href="cart.html">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product_name">
                                    <a href="shop_detail.html"> <h5>Men's Tee</h5></a>
                                    <p>$59.99</p>
                                </div>
                            </div>
                            <div class="element-item hoodie col-sm-3 isotope-item">
                                <div class="shop_img">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/isotopimg2.jpg" alt="img"/>
                                    <div class="img_overlay">
                                        <a href="cart.html">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product_name">
                                    <a href="shop_detail.html"> <h5>Men's Hoodie</h5></a>
                                    <p>$59.99</p>
                                </div>
                            </div>
                            <div class="element-item hoodie col-sm-3 isotope-item">
                                <div class="shop_img">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/isotopimg3.jpg" alt="img"/>
                                    <div class="img_overlay">
                                        <a href="cart.html">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product_name">
                                    <a href="shop_detail.html"> <h5>Ladies Hoodie</h5></a>
                                    <p>$59.99</p>
                                </div>
                            </div>
                            <div class="element-item hoodie col-sm-3 isotope-item">
                                <div class="shop_img">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/isotopimg4.jpg"  alt="img" />
                                    <div class="img_overlay">
                                        <a href="cart.html">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product_name">
                                    <a href="shop_detail.html"> <h5>Ladies Hoodie</h5></a>
                                    <p>$59.99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="story_section">
            <div class="container">
                <div class="ourstory_contain gray_bg">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ourstory_img.jpg" alt="ourstory_img"/>
                        </div>
                        <div class="col-sm-8">
                            <h2 class="title_h2"><span>OUR STORY</span>ONE MORE ROUND</h2>
                            <div class="story_contain">
                                <p>Round13 Clothing Co. brand is inspired by my Fathers long battle with cancer and his love for the sport of boxing. He was a boxing fanatic, he truly loved it. Diagnosed with brain cancer at the age of 39, my Father had many bouts with cancer over the course of 11 years. He battled a disease that undeniably has no boundaries.</p>
                                <a href="our_story.html" class="white_btn">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog_section">
            <div class="container">
                <h2 class="title_h2">Latest from the Blog</h2>
                <div class="row hblog_contain">
                     <?php   query_posts(array('post_type' => 'Blogs', 'posts_per_page' => 2,'orderby'=> 'title', 'order' => 'desc' ));
                             if (have_posts()) : while (have_posts()) : the_post();  ?>
                    <div class="col-md-6">
                        <div class="gray_bg">
                            <div class="row">
                                <div class="col-md-6 col-sm-5">
                                     <?php //echo the_post_thumbnail('medium');   ?>
                                    <?php echo the_post_thumbnail(array(263,264));   ?>
<!--                                    <img src="<?php //echo get_template_directory_uri(); ?>/images/blogimg1.jpg" alt="blogimg"/>-->
                                </div> 
                                <div class="col-md-6 col-sm-7">
                                    <div class="blog_text_gray">
                                        <h4 class="title_h4"><?php the_title(); ?><span><?php echo get_the_date('M d, Y') ?></span></h4>
                                       <?php the_content(); ?>
                                       
                                        <a href="<?php echo get_permalink(); ?>" class="arrow_a"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                     <?php endwhile; ?>
                    <?php endif; ?><?php  wp_reset_query();?>
                </div>
                <a href="blog.html" class="white_btn border_btn">View More</a>
            </div>
        </section>
<?php get_footer(); ?>        