<?php

/**
 *
 * @package OsonyWishlist
 */

namespace  Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController{

    public function register() {
        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link ($links) {
        // Add more custom links
        // $settings_link = '<a href="https://github.com/tbunitrade">More plugins</a>';
        $settings_link = '<a href="options-general.php?page=wishlist_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}