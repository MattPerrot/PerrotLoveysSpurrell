<?php if ( 'blogs' == get_post_type() ){
   wp_redirect( get_permalink(10), 301 );
    exit;   
}
?>