<?php

/**
 * @package OsonyWishlist
 */

namespace Inc;

//protected to inherit from Init class
final class Init {
    /**
     * Store all the classes inside the array
     * @return array Full list of classes
     */
    public static function get_services() {
        // get all list classes that I declared
        return [
            // we need to add class here
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }

    /**
     * Loop through the classes,
     * initialize them and call the register() method,
     * if it exists.
     * @return
     */

    public static function register_services() {
        // method that automaticly automate all for us
        foreach ( self::get_services() as $class  ) {
            $service = self::instantiate($class);
            // we checl does any class has the register method
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class class from the services array
     * @return class instance new instance of the class
     *
     */

    private static function  instantiate($class) {
        return new $class();
    }
}
