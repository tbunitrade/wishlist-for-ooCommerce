<?php
if (!defined('WPINC')) {
    die('No cheating');
}

if ( file_exists( DIR_NAME. '/vendor/autoload.php' )) {
    require_once DIR_NAME . '/vendor/autoload.php' ;
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

//require_once DIR_NAME . '/libraries/Admin/AdminPages.php';

if (!class_exists('WishlistActivate')) {

    class Wishlist {

        public $plugin_name;

        public function __construct()
        {
            //$this->plugin_name = plugin_basename(__DIR__);
            //$this->plugin_name = plugin_basename(__FILE__);

            //$this->plugin_name = OSONY_WISHLIST_BASEPATH;
            //$this->plugin_name = OSONY_WISHLIST_BASEURL;
            //$this->plugin_name = OSONY_WISHLIST_PLUGIN_NAME;
            $this->plugin_name = OSONY_WISHLIST_PLUGIN_NAME_2;
            //echo $this->plugin_name;
        }

        protected function create_post_type() {
            add_action('init', array($this, 'custom_post_type'));
        }

        public function register()
        {
            // register the styles and scripts
            add_action('wp_enqueue_scripts', array($this, 'public_enqueue'));
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));

            // register main page for Plugin
            add_action('admin_menu', array($this, 'add_admin_pages' ));

            // Plugin Action Links
            //add_filter( 'plugin_action_link_' . $this->plugin_name , array($this, 'settings_link') );
            add_filter( "plugin_action_links_$this->plugin_name" , array($this, 'settings_link') );

            add_action( 'woocommerce_product_loop_title_classes', array($this, 'whishlist_show_in_catalog_mode'), 2 );
            add_action( 'woocommerce_single_product_summary', array($this, 'whishlist_show_on_product_page'), 115 );

        }

        public function settings_link($links) {
            // add custom settings link for current plugin

            //$settings_link  = '<a href="options-general.php?page=wishlist_plugin">Settings</a>';
            $settings_link  = '<a href="admin.php?page=wishlist_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages() {
            add_menu_page('Wishlist Plugin', 'Wishlist', 'manage_options','wishlist_plugin', array($this,'admin_index'),'dashicons-store', 110);
        }

        public function admin_index() {
            //this is template
            require_once plugin_dir_path(__DIR__). 'templates/admin.php';
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
            //require_once plugin_dir_path (__DIR__) . 'libraries/class-wishlist-activate.php';
            //require_once  OSONY_WISHLIST_BASEURL . 'libraries/class-wishlist-activate.php';
            //WishlistActivate::activate();
            Activate::activate();
        }

    }

    //if (class_exists('Wishlist')) {
        $WishListPlugin = new Wishlist();
        $WishListPlugin->register();
        //Wishlist::register();
    //}

    if ( class_exists('WishlistAjax')) {
        $WishListPluginAjax = new WishlistAjax();
        $WishListPluginAjax->register_post_type();
    }


// activation
    register_activation_hook( __FILE__, array($WishListPlugin, 'activate'));

// deactivation
    register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
}