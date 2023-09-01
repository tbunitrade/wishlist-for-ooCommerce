<?php
/**
 * @package OsonyWishlist
 */


namespace Inc\Pages;

class Admin {

    public function register() {
        // register main page for Plugin
        add_action('admin_menu', array($this, 'add_admin_pages' ));
    }

    public function add_admin_pages() {
        add_menu_page('Wishlist Plugin', 'Wishlist', 'manage_options','wishlist_plugin', array($this,'admin_index'),'dashicons-store', 110);
    }

    public function admin_index() {
        //this is template
        require_once PLUGIN_PATH . 'templates/admin.php';
    }

}