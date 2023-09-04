<?php

/**
 *
 * @package OsonyWishlist
 */

namespace  Inc\Base;



class SettingsLinks {

    protected $plugin;

    public function __construct() {
        $this->plugin = PLUGIN;
    }

    public function register() {
        // constatn usage
        // add_filter("plugin_action_links_" . PLUGIN, array($this, 'settings_link') , 1);

        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link ($links) {

        //$settings_link = '<a href="https://github.com/tbunitrade">More plugins</a>';
        $settings_link = '<a href="options-general.php?page=wishlist_plugin">Settings</a>';

        array_push($links, $settings_link);
        return $links;
    }
}