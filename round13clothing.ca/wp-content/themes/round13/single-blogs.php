<?php
  get_header();
?>

<section class="banner_bg blog_breadcrumb">
    <div class="container">
        <h1>Contrary to popular belief</h1>
        <?php custom_breadcrumbs(); ?>
    </div>
</section>


<section  class="main_section blog_detail_section blog_section" style="min-height: 216px;">
    <div class="container">
        <div class="row">

            <div class="col-sm-9">
                <div class="blog_detail_left">
                    <?php while (have_posts()) : the_post(); ?>
                          <?php echo the_post_thumbnail(); ?> 
                          <div class="blog_detail_content">
                              <span><?php echo get_the_date('M d, Y') ?></span>
                              <?php the_content(); ?>
                          </div>
                      <?php endwhile; ?><?php wp_reset_query(); ?>  
                </div>
            </div>
            <div class="col-sm-3">
                <div class="blog_detail_right">
                    <h4>Recent Posts</h4>

                    <?php
                      query_posts(array('post_type' => 'Blogs', 'posts_per_page' => 6, 'orderby' => 'title', 'order' => 'desc'));
                      if (have_posts()) : while (have_posts()) : the_post();
                              ?>

                              <div class="blog_detail_content side_detail">
          <?php echo the_post_thumbnail('thumbnail'); ?> 
                                  <div class="side_bar">
                                      <a href="<?php echo get_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                      <span><?php echo get_the_date('M d, Y') ?></span>
                                  </div>
                              </div>

                          <?php endwhile;
                      endif;
                    ?><?php wp_reset_query(); ?>  




                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<?php if (is_singular("blogs")): ?>
      <script>
          jQuery("#mega-menu-item-46").addClass("mega-current-menu-item mega-current_page_item");
      </script>
  <?php endif; ?>