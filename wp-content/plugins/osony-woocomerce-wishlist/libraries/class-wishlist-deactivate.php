<?php
/**
 * @package OsonyWishlist
 */

class WishlistDeactivate {

    public static function deactivate() {

        // echo 'test';
        flush_rewrite_rules();
    }
}