<?php
/**
 * @package OsonyWishlist
 */

namespace Inc;

class Deactivate {

    public static function deactivate() {

        // echo 'test';
        flush_rewrite_rules();
    }
}