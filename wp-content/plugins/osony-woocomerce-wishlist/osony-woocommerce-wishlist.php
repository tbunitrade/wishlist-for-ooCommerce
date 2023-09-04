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
if ( file_exists( DIR_NAME. '/vendor/autoload.php' )) {
    require_once DIR_NAME . '/vendor/autoload.php' ;
}

// defined CONSTANTS
define('DIR_NAME' , dirname(__FILE__));
define('PLUGIN_PATH', plugin_dir_path(__FILE__));

// defined for style the url
define('PLUGIN_URL', plugin_dir_url(__FILE__));

// this is for activation and deactivation hooks
define('PLUGIN', plugin_basename(__FILE__) );


/**
 * The code that run during plugin activation
 * WP required activation and deactivation hook be registered outside any class.
 */


use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_wishlist_plugin() {
    Activate::activate();
}

function deactivate_wishlist_plugin() {
    Deactivate::deactivate();
}
register_activation_hook( __FILE__ , 'activate_wishlist_plugin');
register_deactivation_hook(__FILE__, 'deactivate_wishlist_plugin');
//end of activation hook

/**
 * Init the core main Class of the plugin
 */
if (  class_exists('Inc\\Init')) {
    //Inc\Init::class and method
    Inc\Init::register_services();
}