<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default discount type
    |--------------------------------------------------------------------------
    |
    | This default tax rate will be used when you make a class implement the
    | Taxable interface and use the HasTax trait.
    |
    */

    'discountType' => 'percent',

    /*
    |--------------------------------------------------------------------------
    | Default number format
    |--------------------------------------------------------------------------
    |
    | This defaults will be used for the formatted numbers if you don't
    | set them in the method call.
    |
    */

    'format' => [
        'decimals'           => 2,
        'decimal_point'      => '.',
        'thousand_separator' => ',',
    ],

];
