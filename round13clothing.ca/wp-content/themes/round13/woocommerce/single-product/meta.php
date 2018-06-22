<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof(get_the_terms($post->ID, 'product_cat'));
$tag_count = sizeof(get_the_terms($post->ID, 'product_tag'));
?>

<!--<div class="product_meta">

<?php //do_action( 'woocommerce_product_meta_start' );  ?>

<?php //if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

                <span class="sku_wrapper"><?php // _e( 'SKU:', 'woocommerce' );   ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __('N/A', 'woocommerce'); ?></span></span>

<?php //endif;  ?>

<?php // echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>

<?php // echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '</span>' ); ?>

<?php // do_action( 'woocommerce_product_meta_end' ); ?>

</div>-->

</div>

<div class="colors_thumb">
    <label>Available Colors</label>
    <div>
<?php
$terms = get_the_terms($post->ID, sanitize_title('pa_color'));
$name = 'pa_color';


foreach ($terms as $term) {
    $term_id = $term->term_id;

    $thumbnail_id = get_woocommerce_term_meta($term_id, '', 'phoen_color', true);

echo "<span id='".$term->slug."' class='phoen_swatches' style='display:none; height:32px; line-height:30px; width:32px; border:1px solid #ccc;  background-color:".$thumbnail_id['pa_color_swatches_id_phoen_color'][0]."'></span>";
}

?>
        </div>
</div>



<div class="sizecharts">




<?php
$image = get_field('size_chart');

if (!empty($image)):
    ?>
        <button id="myBtn">Size Chart</button>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p><img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" /></p>
            </div>

        </div>

<?php endif; ?>




</div>
<div class="product_idc">

<?php do_action('woocommerce_product_meta_start'); ?>

    <?php if (wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type('variable') )) : ?>

        <h4 class="title_h4"><?php _e('Product ID:', 'woocommerce'); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __('N/A', 'woocommerce'); ?></span></h4>

<?php endif; ?>

    <?php echo $product->get_categories(', ', '<h4 class="title_h4">' . _n('Category:', 'Categories:', $cat_count, 'woocommerce') . ' ', '</h4>'); ?>

    <?php echo $product->get_tags(', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', $tag_count, 'woocommerce') . ' ', '</span>'); ?>

    <?php do_action('woocommerce_product_meta_end'); ?>



</div>
<div class="share_contain">
<?php echo do_shortcode('[woocommerce_social_media_share_buttons]'); ?>
</div>



<script>
    
    
                        color_thumbs = [];
                        i = 0;
    jQuery('.variations_form select#pa_color ').each(function(index, element) {
			
			var curr_select = jQuery(this).attr('id');
			
			
			jQuery('#'+jQuery(this).attr('id')+' option').each(function(index, element) {
				if(jQuery(this).val()!=''){
					 color_thumbs[i++] = jQuery(this).val(); 
                                       
				}else{
					if(  jQuery('#'+curr_select+' option').length == 1 && jQuery('#'+curr_select+' option[value=""]').length){
						 jQuery( "#"+curr_select+'_buttons' ).append( 'Combination Not Avalable <a href="javascript:void(0);" class="variation_reset">Reset</a>' );
					}
				}
			});
		});
//                alert(color_thumbs);
                
                jQuery('.colors_thumb span').each(function(e){
                    var thumb_id = jQuery(this).attr('id');
//                    alert(color_thumbs.indexOf(thumb_id));
                    if(color_thumbs.indexOf(thumb_id) >= 0) {
                        jQuery(this).css('display', 'block');
                    }
                    
                });
                
    var modal = document.getElementById('myModal');


    var btn = document.getElementById("myBtn");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
