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
 * @package OsonyWishlist
 *
 */


defined( 'ABSPATH' ) or die('No cheating');

// defined zone for mail rules, path, versions
//define('OSONY_WISHLIST_VERSION', '1.0.0');
define('OSONY_WISHLIST_BASEPATH', plugin_dir_path(__FILE__));
define('OSONY_WISHLIST_BASEURL', plugin_dir_url(__FILE__));


////Load old Config
//require_once 'config/config.php';

// Autoload Core Libraries
spl_autoload_register( function($cLassName) {
    //require_once plugin_dir_path (__FILE__).'libraries/class-wishlist.php';
    //require_once plugin_dir_path (__FILE__).'public/class-wishlist-osony-public.php';
});

require_once plugin_dir_path (__FILE__) . 'libraries/class-wishlist.php';
require_once plugin_dir_path (__FILE__) . 'libraries/class-wishlist-ajax.php';
