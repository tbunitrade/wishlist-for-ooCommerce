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

// defined Conctant only for require_once functions
define('DIR_NAME' , dirname(__FILE__));
define('PLUGIN_PATH', plugin_dir_path(__FILE__));

// defined for style the url
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if ( file_exists( DIR_NAME. '/vendor/autoload.php' )) {
    require_once DIR_NAME . '/vendor/autoload.php' ;
}

if (  class_exists('Inc\\Init')) {
    //Inc\Init::class and method
    Inc\Init::register_services();
}