<footer>
    <div class="footer_top">
        <div class="container">
            <div class="logo">
                <a href="<?php echo site_url(); ?>"><img src="<?php echo of_get_option('footer_logo'); ?>" alt="logo"/></a>
            </div>
            <div class="footer_ul">
                <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'items_wrap' => '<ul class="">%3$s</ul>', 'container' => '', 'container_class' => '')); ?>
            </div>
        </div>
    </div>
    <div class="footer_bottom"><?php echo of_get_option('copyright_text_ftr'); ?></div>
</footer>
<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<script>
    jQuery(document).on('click', ".cart_product", function () {

        var product_id = jQuery(this).data('product_id');
        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'add_to_cart_custom',
                product_id: product_id,
            },
            beforeSend: function (xhr, opt) {
            },
            success: function (response) {
                //console.log(response)
                if (response != '0') {
                    window.location.href = "<?php echo wc_get_cart_url(); ?>";
                } else {
                    alert("Something goes wrong,Please try again later");
                }

            },
            error: function (response) {
                alert("Something goes wrong,Please try again later");
            }
        });
    });</script>
<script>

    var $loader = jQuery('#load_more');
    $loader.on('click', load_ajax_posts);
    function load_ajax_posts() {
        var $content = jQuery(".responsive_filter .filter");
        var ppp = jQuery("#ppp").val();
        var offset = jQuery('#load_more_offset').val();
//        if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
        jQuery.ajax({
            type: 'POST',
            dataType: 'html',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'ppp': ppp,
                'offset': offset,
                'action': 'mytheme_more_post_ajax'
            },
            beforeSend: function () {
                $loader.addClass('post_loading_loader').html('');
            },
            success: function (data) {
                var $data = jQuery(data);
                alert(data);
                $content.append($data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log(jqXHR);
            },
        });
//        }

        jQuery('#load_more_offset').val(offset);
        return false;
    }

</script>

<script>
    jQuery(function () {

        /**************************Start Checkout Form Validation**********************/
        jQuery.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Only alphabetical characters");
        jQuery("form[name='checkout']").validate({
            rules: {
                shipping_first_name: {
                    required: true,
                    lettersonly: true,
                },
                shipping_last_name: {
                    required: true,
                    lettersonly: true,
                },
                shipping_country: {
                    required: true,
                },
                shipping_address_1: {
                    required: true,
                },
                shipping_email: {
                    required: true,
                    email: true
                },
                shipping_city: {
                    required: true,
                },
                shipping_state: {
                    required: true,
                },
                shipping_postcode: {
                    required: true,
                    number: true,
                    maxlength: 6
                },
                shipping_phone: {
                    required: true,
                    number: true,
                    maxlength: 10
                },
                billing_first_name: {
                    required: true,
                    lettersonly:true,
                },
                billing_last_name: {
                    required: true,
                    lettersonly: true,
                },
                billing_email: {
                    required: true,
                    email: true,
                    lettersonly: true,
                },
                billing_phone: {
                    required: true,
                    number: true,
                    maxlength: 10
                },
                billing_country: {
                    required: true,
                },
                billing_address_1: {
                    required: true,
                },
                billing_city: {
                    required: true,
                },
                billing_state: {
                    required: true,
                },
                billing_postcode: {
                    required: true,
                    number: true,
                    maxlength: 6
                }
            },
            // Specify the validation error messages
            messages: {
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        /**************************End Checkout Form Validation**********************/

        /**************************Register Validation**********************/
        jQuery.validator.addMethod("loginRegex", function (value, element) {
            return this.optional(element) || /^[a-z0-9\\-]+$/i.test(value);
        }, "Password must contain letters, numbers and special character.");
        jQuery("#register_frm").validate({
            rules: {
                billing_first_name: {
                    required: true,
                },
                billing_last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                billing_phone: {
                    required: true,
                    number: true
                },
                password: {
                    required: true,
                    pwcheck: true,
                    minlength: 8
                },
                password2: {
                    required: true,
                    equalTo: "#reg_password"
                }

            },
            messages: {
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 8 characters long.",
                    pwcheck: "Must contain at least one number and one uppercase and lowercase letter.",
                },
                password2: {
                    required: "Please provide a confirm password.",
                    equalTo: "Your Password do not match.Please try again."
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        jQuery.validator.addMethod("pwcheck",
                function (value, element) {
                    return /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(value);
                });
        jQuery(document).on("submit", "#register_frm", function () {
            e.preventDefault();
            jQuery("#register_frm").validate();
        });
        /**************************End Register Validation**********************/

        /**************************Login Validation**********************/


        jQuery("#login_frm").validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                username: {
                    required: "Please enter email or username"
                },
                password: {
                    required: "Please provide a password",
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        jQuery(document).on("submit", "#login_frm", function () {
            e.preventDefault();
            jQuery("#login_frm").validate();
        });
    });
</script>

</body>
</html>
