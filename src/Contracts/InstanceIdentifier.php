<?php

namespace Mugenzo\LaravelShoppingCart\Contracts;

interface InstanceIdentifier
{
    /**
     * Get the unique identifier to load the Cart from.
     *
     * @param  null  $options
     *
     * @return int|string
     */
    public function getInstanceIdentifier($options = null);

    /**
     * Get the unique identifier to load the Cart from.
     *
     * @param  null  $options
     *
     * @return int|string
     */
    public function getInstanceGlobalDiscountType($options = null);

    /**
     * Get the unique identifier to load the Cart from.
     *
     * @param  null  $options
     *
     * @return int|string
     */
    public function getInstanceGlobalDiscountValue($options = null);
}
