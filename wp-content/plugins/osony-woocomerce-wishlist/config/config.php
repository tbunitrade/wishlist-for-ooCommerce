<?php


////enable style and scripts
//function plugins_scripts() {
//    wp_enqueue_style( 'wishlist-stylesheet', OSONY_WISHLIST_BASEURL . 'public/css/class-stylesheet-wishlist-public.css', array(), '1.0.0', 'all');
//    wp_enqueue_script( 'wishlist-scripts', OSONY_WISHLIST_BASEURL . 'public/js/class-js-wishlist-public.js', array(), '1.0.0', 'all');
//
//}
//add_action( 'wp_enqueue_scripts', 'plugins_scripts' );

//create simple btn for click
function whishlist_show_in_catalog_mode(){

    $url = OSONY_WISHLIST_BASEURL . 'public/images/heart.svg';
    echo '<img class="osony-wishlist-svg" src="'. $url.'">';
}
add_action( 'woocommerce_product_loop_title_classes', 'whishlist_show_in_catalog_mode', 2 );

function whishlist_show_on_product_page(){
    //echo 'TACOS!';
    $url = OSONY_WISHLIST_BASEURL . 'public/images/heart.svg';
    echo '<img class="osony-wishlist-svg" src="'. $url.'">';
}
add_action( 'woocommerce_single_product_summary', 'whishlist_show_on_product_page', 15 );


//Add my custom wishlist page

function add_my_custom_page() {
    // Create post object
    $my_post = array(
        'post_title'    => wp_strip_all_tags( 'My custom Wishlist' ),
        'post_content'  => '[mycustomwishlist]',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
    );

    // Insert the post into the database
    wp_insert_post( $my_post );
}

register_activation_hook(__FILE__, 'add_my_custom_page');

//delete a page wishlist
function on_deactivating_your_plugin() {

    $page = get_page_by_path( 'my-custom-wishlist' );
    wp_delete_post($page->ID);

}
register_deactivation_hook( __FILE__, 'on_deactivating_your_plugin' );

//create table for looping favorite products

// function that runs when shortcode is called
function mycustomwishlist_shortcode() {

// Things that you want to do.
    $message = 'Hello world!';

// Output needs to be return
    return $message;
}
// register shortcode
add_shortcode('mycustomwishlist', 'mycustomwishlist_shortcode');


