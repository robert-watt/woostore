<?php
function storefront_child_init() {

    // remove the meta.php file from the single products page
    // remove_action(
    //     'woocommerce_single_product_summary', // hook name
    //     'woocommerce_template_single_meta', // function name
    //     40 // priority 
    // );

    // add action
    function fwd_custom_function() {
        echo 'hello world!';
    }

    add_action(
        'woocommerce_single_product_summary',
        'fwd_custom_function',
        31
    );

    // move the price on single products page
    remove_action(
       'woocommerce_single_product_summary',
       'woocommerce_template_single_price',
       10
    );

    // re-add 
    add_action(
       'woocommerce_single_product_summary',
       'woocommerce_template_single_price',
        25
    );

    // add this to my account dashboard
    function storefront_child_account_dashboard() {
        echo '<p>Please contact us at <a href="mailto:info@example.com">info@example.com</a> with any issues </p>';
    }

    add_action(
        'woocommerce_account_dashboard',
        'storefront_child_account_dashboard',
    );

    // remove action
    remove_action(
        'woocommerce_after_shop_loop_item_title',
        'woocommerce_template_loop_rating',
        5
     );

     // add action back in
     add_action(
        'woocommerce_after_shop_loop_item_title',
        'woocommerce_template_loop_rating',
        10
     );

}
add_action( 'init', 'storefront_child_init' );
