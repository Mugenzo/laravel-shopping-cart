<?php

namespace Mugenzo\LaravelShoppingCart;

trait CanBeBought {
    /**
     * Get the identifier of the Buyable item.
     *
     * @param null $options
     *
     * @return int|string
     */
    public function getBuyableIdentifier( $options = null ) {
        return method_exists( $this, 'getKey' ) ? $this->getKey() : $this->id;
    }

    /**
     * Get the name, title or description of the Buyable item.
     *
     * @param null $options
     *
     * @return string
     */
    public function getBuyableDescription( $options = null ) {
        if ( property_exists( $this, 'name' ) ) {
            return $this->name;
        }

        if ( property_exists( $this, 'title' ) ) {
            return $this->title;
        }

        if ( property_exists( $this, 'description' ) ) {
            return $this->description;
        }

        return '';
    }

    /**
     * Get the price of the Buyable item.
     *
     * @param null $options
     *
     * @return float
     */
    public function getBuyablePrice( $options = null ) {
        if ( property_exists( $this, 'price' ) ) {
            return $this->price;
        }

        return 0;
    }
}