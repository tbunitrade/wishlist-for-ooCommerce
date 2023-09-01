<?php
/**
 * @package OsonyWishlist
 */

namespace Inc\Base;

class Enqueue {

    public function register() {
        // register styles and scripts for Plugin

        add_action('wp_enqueue_scripts', array($this, 'public_enqueue'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
    }

    public function public_enqueue() {
        // enqueue all our scripts
        wp_enqueue_style('wishlist-stylesheet', PLUGIN_URL .  '/public/css/class-stylesheet-wishlist-public.css');
        wp_enqueue_script('wishlist-script', PLUGIN_URL .  'public/js/class-js-wishlist-public.js');
    }

    public function admin_enqueue() {
        // enqueue all our scripts
        wp_enqueue_style('stylesheet', PLUGIN_URL. 'public/css/class-stylesheet-wishlist-admin.css'  );
    }
}