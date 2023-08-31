<?php
if (!defined('WPINC')) {
    die('No cheating');
}
if (!class_exists('WishlistActivate')) {

    class Wishlist {

        public function __construct()
        {
        }

        protected function create_post_type() {
            add_action('init', array($this, 'custom_post_type'));
        }

        public function register()
        {
            add_action('wp_enqueue_scripts', array($this, 'public_enqueue'));
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));


            add_action( 'woocommerce_product_loop_title_classes', array($this, 'whishlist_show_in_catalog_mode'), 2 );
            add_action( 'woocommerce_single_product_summary', array($this, 'whishlist_show_on_product_page'), 115 );

        }

        public function custom_post_type() {
            // register  CPT or page with specific params
            register_post_type('Whishlist', ['public' => true, 'label' => 'Whishlist']);
        }

        public function public_enqueue() {
            // enqueue all our scripts
            wp_enqueue_style('wishlist-stylesheet', OSONY_WISHLIST_BASEURL .  'public/css/class-stylesheet-wishlist-public.css');
            wp_enqueue_script('wishlist-script', OSONY_WISHLIST_BASEURL .  'public/js/class-js-wishlist-public.js');
        }

        public function admin_enqueue() {
            // enqueue all our scripts
            wp_enqueue_style('stylesheet', OSONY_WISHLIST_BASEURL . 'public/css/class-stylesheet-wishlist-admin.css'  );
        }

        public function whishlist_show_in_catalog_mode(){
            $url = OSONY_WISHLIST_BASEURL . 'public/images/heart.svg';
            echo '<img class="osony-wishlist-svg" src="'. $url.'">';
            return 'woocommerce-loop-product__title';
        }

        public function whishlist_show_on_product_page(){
            $url = OSONY_WISHLIST_BASEURL . 'public/images/heart.svg';
            echo '<img class="osony-wishlist-svg" src="'. $url.'">';
        }

        function activate() {
            require_once plugin_dir_path (__DIR__) . 'libraries/class-wishlist-activate.php';
            //require_once  OSONY_WISHLIST_BASEURL . 'libraries/class-wishlist-activate.php';
            WishlistActivate::activate();
        }
    }

    //if (class_exists('Wishlist')) {
        $WishListPlugin = new Wishlist();
        $WishListPlugin->register();
        //Wishlist::register();
    //}

    //if ( class_exists('WishlistAjax')) {
        $WishListPluginAjax = new WishlistAjax();
        $WishListPluginAjax->register_post_type();
    //}


// activation
    register_activation_hook( __FILE__, array($WishListPlugin, 'activate'));

// deactivation
    require_once plugin_dir_path (__FILE__) . 'libraries/class-wishlist-deactivate.php';
    register_deactivation_hook(__FILE__, array('WishlistDeactivate', 'deactivate'));
}