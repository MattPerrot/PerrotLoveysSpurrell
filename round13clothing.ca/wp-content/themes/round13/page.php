<?php get_header(); ?>
<section class="banner_bg">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php custom_breadcrumbs(); ?>
    </div>
</section>


<section class="main_section shipping_section">
     <div class="container">
         <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
    <?php endwhile; ?>
     </div>
</section> 
<?php get_footer(); ?>