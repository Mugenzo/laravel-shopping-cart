<?php

namespace Mugenzo\LaravelShoppingCart;

use Illuminate\Support\ServiceProvider;

class ShoppingCartServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind( 'cart', 'Mugenzo\LaravelShoppingCart\Cart' );

        $config = __DIR__ . '/Config/shopping_cart_config.php';
        $this->mergeConfigFrom( $config, 'shopping_cart_config' );

        $this->publishes( [ __DIR__ . '/Config/shopping_cart_config.php' => config_path( 'shopping_cart_config.php' ) ], 'config' );

        $this->publishes( [
            realpath( __DIR__ . '/Database/migrations' ) => $this->app->databasePath() . '/migrations',
        ],
            'migrations' );
    }
}
