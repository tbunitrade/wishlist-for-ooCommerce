<?php
/**
 *
 * This is bootstrap file, mvc model.
 * Info about current plugin.
 *
 * @wordpress-plugin
 * Plugin Name:          Wishlist for WooCommerce
 * Plugin URI:           https://github.com/tbunitrade/wishlist-for-woocommerce
 * Description:          Simple WooCommerce Wishlist
 * Version:              1.0.0
 * Author:               Oleksandr Sonich
 * Author URI:           https://www.sierra-group.in.ua/
 * License:              GPLv3
 * License URI:          https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:          osony-wishlist
 * Domain Path:          /languages
 * WC requires at least: 8.0.2
 *
 */


defined( 'ABSPATH' ) or die('No cheating');

// defined zone for mail rules, path, versions
//define('OSONY_WISHLIST_VERSION', '1.0.0');
define('OSONY_WISHLIST_BASEURL', plugin_dir_url(__FILE__));


////Load old Config
//require_once 'config/config.php';

// Autoload Core Libraries
spl_autoload_register( function($cLassName) {
    //require_once plugin_dir_path (__FILE__).'libraries/class-wishlist.php';
    //require_once plugin_dir_path (__FILE__).'public/class-wishlist-osony-public.php';
});

require_once plugin_dir_path (__FILE__).'libraries/class-wishlist.php';

//class Wishlist {
//
//    public function __construct()
//    {
//        add_action('init', array($this, 'custom_post_type'));
//    }
//
//    public function register()
//    {
//        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
//        //add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
//    }
//
//    public function activate()
//    {
//        $this->custom_post_type();
//        // flush rewrite rules
//        flush_rewrite_rules();
//    }
//
//    public function deactivate() {
//        flush_rewrite_rules();
//    }
//
//    public function custom_post_type() {
//        register_post_type('book', ['public' => true, 'label' => 'Books']);
//    }
//
//    public function admin_enqueue() {
//        // enqueue all our scripts
//        wp_enqueue_style('stylesheet', plugins_url('public/css/class-stylesheet-wishlist-admin.css',  __FILE__));
//    }
//
//}

if (class_exists('Wishlist')) {
    $WishListPlugin = new Wishlist();
    $WishListPlugin->register();
    //$WishListPlugin::register();
}
