<?php
/**
 * @package OsonyWishlist
 */

namespace  Inc\Base;

class Activate {

    public static function activate() {

        echo 'test!';
        flush_rewrite_rules();
    }
}