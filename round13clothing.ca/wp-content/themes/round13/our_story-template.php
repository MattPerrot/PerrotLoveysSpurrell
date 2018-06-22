<?php 
/*
 * Template Name:our_story-template
 */

 get_header(); ?>
<section class="banner_bg">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <?php custom_breadcrumbs(); ?>
            </div>
        </section>

<section class="story_section ourstory_section main_section">
    <div class="container">
        <div class="ourstory_contain gray_bg">
            
             <?php while (have_posts()) : the_post(); ?>
            <div class="row">        
                <div class="col-sm-4">
                   <?php echo the_post_thumbnail(); ?> 
<!--                            <img src="images/ourstory_img.jpg" alt="ourstory_img">-->
                </div>
                <div class="col-sm-8">
                    <div class="white_space"></div>
                  
                        <?php the_content(); ?>
                  
                </div>
            </div>
              <?php endwhile; ?><?php wp_reset_query(); ?>
        </div>
    </div>
 </section>

<!--<section class="story_section ourstory_section main_section">
            <div class="container">
                <div class="ourstory_contain gray_bg">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="images/ourstory_img.jpg" alt="ourstory_img">
                        </div>
                        <div class="col-sm-8">
                            <div class="white_space"></div>
                            <div class="story_contain">
                                <p>Round13 Clothing Co. brand is inspired by my Fathers long battle with cancer and his love for the sport of boxing. He was a boxing fanatic, he truly loved it.</p>
                                <p>Diagnosed with brain cancer at the age of 39, my Father had many bouts with cancer over the course of 11 years. He battled a disease that undeniably has no boundaries.</p>
                                <p>Living with cancer and going through every available option for treatment, every day was a Round 13 for my Father. The courage he exuded to keep moving forward, to keep fighting, and to keep such a positive attitude, truly extended his life.</p>
                                <p>Round13 Clothing Co. is dedicated to my Father who lost his battle with cancer at the age of 50.</p>
                                <p>Round13 Clothing Co. has a vision - when you see the brand, may it be a reminder to keep fighting and stay positive. No matter what, know that there is always someone in your corner.</p>
                                <p>Round13 Clothing Co. will be supporting families who are facing their Round 13, through donating a portion of its profits to chosen foundations and other support funds.</p>
                                <div class="story_logo">
                                    <a href="index.html"><img src="images/story_logo.png" alt="log"/></a>
                                </div>
                                <h5>Inspired by</h5>
                                <h5>Donald mccarthy, November 20th, 1955 - January 22nd, 2006</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

<?php get_footer(); ?>

                            