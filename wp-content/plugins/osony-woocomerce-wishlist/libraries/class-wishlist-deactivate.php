<?php
/**
 * @package OsonyWishlist
 */

class WishlistDeactivate {

    public static function deactivate() {
        flush_rewrite_rules();
    }
}