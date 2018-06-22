<?php
  /*
 * Template Name:my_account-template
 */
  get_header(); ?>

<section class="banner_bg">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <?php custom_breadcrumbs(); ?>
            </div>
        </section>

 <section class="main_section myaccount_section">
            <div class="container">
                <div class="row">
                <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
    <?php endwhile; ?>
            </div> </div>

</section>




<?php get_footer();?>