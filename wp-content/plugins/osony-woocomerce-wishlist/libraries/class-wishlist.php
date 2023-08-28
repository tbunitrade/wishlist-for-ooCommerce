<?php
if (!defined('WPINC')) {
    die('No cheating');
}

class Wishlist {

    public function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    public function register()
    {
        add_action('wp_enqueue_scripts', array($this, 'public_enqueue'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
    }

    public function activate()
    {
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    public function deactivate() {
        flush_rewrite_rules();
    }

    public function custom_post_type() {
        // register_post_type('wishlist', ['public' => true, 'label' => 'Wishlist']);
        // register page with specific params
        register_post_type('Whishlist', ['public' => true, 'label' => 'whishlist']);
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

}