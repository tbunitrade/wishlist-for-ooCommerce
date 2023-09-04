<?php
/**
 * @package OsonyWishlist
 */

namespace  Inc\Base;

class Activate {

    public static function activate() {

        // We need this to work with CPT etc
        flush_rewrite_rules();
    }
}