<?php 
/*
 * Template Name:partnership-template
 */

 get_header(); ?>
<section class="banner_bg">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php custom_breadcrumbs(); ?>
    </div>
</section>

<section class="main_section">
            <div class="container">
<!--                <div class="row">-->
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    
                    
<!--                    <div class="col-sm-6">
                        <div class="partnership_left">
                            <img src="<?php //echo get_template_directory_uri(); ?>/images/partnership_img.png" alt="partnership" class="img-responsive"/>
                        </div>
                    </div>-->
<!--                    <div class="col-sm-6">
                        <div class="partnership_right shipping_content">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
                                ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt 
                                explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
                                odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
                                voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum 
                                quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam 
                                eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat 
                                voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
                                quam nihil molestiae consequatur,
                                vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                            </p>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit
                                esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>-->
<!--                </div>-->
            </div>
        </section>

<?php get_footer(); ?>