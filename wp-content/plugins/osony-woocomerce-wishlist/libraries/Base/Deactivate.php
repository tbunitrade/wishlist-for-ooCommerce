<?php
/**
 * @package OsonyWishlist
 */

namespace Inc\Base;

class Deactivate {

    public static function deactivate() {

        // echo 'test';
        flush_rewrite_rules();
    }
}