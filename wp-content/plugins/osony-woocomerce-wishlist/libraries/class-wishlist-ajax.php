<?php
if (!defined('WPINC')) {
    die('No cheating');
}

class WishlistAjax extends Wishlist {

    public function __construct()
    {
        //$this->speak();
        //$this->print_stuff();
    }

    function register_post_type () {
        $this->create_post_type();
    }

    function speak () {
        echo 'sonich2';
    }
}