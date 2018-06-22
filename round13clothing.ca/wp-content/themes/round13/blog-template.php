<?php
/*

 * Template Name:blog-template

 */



get_header();
?>

<section class="banner_bg">

    <div class="container">

        <h1><?php the_title(); ?></h1>

        <?php custom_breadcrumbs(); ?>

    </div>

</section>
<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="news_img">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>
            <div class="col-sm-8">
                <h4 class="tp-mask-wrap"><?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        }
                    }
                    ?>
                </h4>
            </div>
        </div>  
    </div>
</section>



<!--<section class="main_section blog_detail_section blog_psection">

            <div class="container">

                <div class="row">



                    <div class="col-sm-9">

                        

                        

<?php
//                                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;                              
//
//                              $args = array(
//
//                                  'post_type' => 'Blogs',
//
//                                  'posts_per_page' => 5,
//
//                                  'orderby' => 'ASC',
//
//                                  'paged' => $paged,
//
//                                  'page' => $paged
//
//                              );
//
//                              $query = new WP_Query($args);
//
//                                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
?> 

                        <div class="blog_detail_left">

<?php //echo the_post_thumbnail('full'); ?>      

                            <div class="blog_detail_content">

                               <h3><?php //the_title();   ?></h3>

                                <span><?php //echo get_the_date('M d, Y')   ?></span>

<?php //the_content();  ?>

<?php
//                                $str = wpautop( get_the_content() );
//
//                                $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
//
//                                $str = strip_tags($str, '<a><strong><em>');
?>

                                 <p><?php //echo $str; //echo wp_trim_words( get_the_content(), 50, '' ); ?> </p>

                                 <a href="<?php //echo get_permalink();  ?>">Continue Reading</a>



                            </div>

                        </div>

<?php //endwhile;  endif;  ?><?php //wp_reset_query(); ?>

                        

                        

                        <div class="col-sm-12">

<?php //custom_pagination();  ?>

                            <ul class="pagination blog_paginaction">

                                <li><a href="javascript:void(0);" class="left_arrow"></a></li>

                                <li class="active"><a href="javascript:void(0);">1</a></li>

                                <li><a href="javascript:void(0);">2</a></li>

                                <li><a href="javascript:void(0);">3</a></li>

                                <li><a href="javascript:void(0);" class="right_arrow"></a></li>

                            </ul>

                        </div>

                    </div>





                    <div class="col-sm-3">

                        <div class="blog_detail_right">

                            <h4>Recent Posts</h4>

<?php
//query_posts(array('post_type' => 'Blogs', 'posts_per_page' => 6,'orderby'=> 'title', 'order' => 'desc' ));
//if (have_posts()) : while (have_posts()) : the_post();  
?>

                            <div class="blog_detail_content side_detail">

<?php //echo the_post_thumbnail('thumbnail');  ?> 

                                <div class="side_bar">

                                    <a href="<?php //echo get_permalink();   ?>"><h4><?php //the_title();   ?></h4></a>

                                    <span><?php //echo get_the_date('M d, Y')  ?></span>

                                </div>

                            </div>

<?php //endwhile;  endif;   ?><?php // wp_reset_query();  ?>                                                                                              

                        </div>

                    </div>

                </div>

            </div>



        </section>
-->




<?php get_footer(); ?>