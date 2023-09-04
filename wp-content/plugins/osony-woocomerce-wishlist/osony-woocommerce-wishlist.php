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
// If this file is called directly, abort rquest.
defined( 'ABSPATH' ) or die('No cheating');

// Require one the Composer Autoload
if ( file_exists( dirname(__FILE__). '/vendor/autoload.php' )) {
    require_once dirname(__FILE__) . '/vendor/autoload.php' ;
}

/**
 * WP required activation and deactivation hook be registered outside any class.
 * The code that run during plugin activation
 *
 */

function activate_wishlist_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__ , 'activate_wishlist_plugin');

/**
 * WP required activation and deactivation hook be registered outside any class.
 * The code that runs during plugin deactivation
 */
function deactivate_wishlist_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_wishlist_plugin');

/**
 * Init the core main Class of the plugin
 */
if (  class_exists('Inc\\Init')) {
    //Inc\Init::class and method
    Inc\Init::register_services();
}