## LaravelShoppingCart
## Installation

Run the Composer require command from the Terminal:

    composer require mugenzo/laravel-shopping-cart

Now you're ready to start using the shoppingcart in your application.

## Table of Contents
Look at one of the following topics to learn more about LaravelShoppingCart

* [Usage](#usage)
* [Collections](#collections)
* [Instances](#instances)
* [Models](#models)

## Usage

The shoppingcart gives you the following methods to use:

### Cart::add()

Adding an item to the cart is really simple, you just use the `add()` method, which accepts a variety of parameters.

In its most basic form you can specify the id, name, quantity, price and weight of the product you'd like to add to the cart.

```php
Cart::add('293ad', 'Product 1', 1, 9.99, 550);
```

As an optional fifth parameter you can pass it options, so you can add multiple items with the same id, but with (for instance) a different size.

```php
Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
```

**The `add()` method will return an CartItem instance of the item you just added to the cart.**

Maybe you prefer to add the item using an array? As long as the array contains the required keys, you can pass it to the method. The options key is optional.

```php
Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550, 'options' => ['size' => 'large']]);
```

### Cart::update()

To update an item in the cart, you'll first need the rowId of the item.
Next you can use the `update()` method to update it.

If you simply want to update the quantity, you'll pass the update method the rowId and the new quantity:

```php
$rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

Cart::update($rowId, 2);
```

If you would like to update options of an item inside the cart, 

```php
$rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

Cart::update($rowId, ['options'  => ['size' => 'small']]); // Will update the size option with new value
```

### Cart::remove()

To remove an item for the cart, you'll again need the rowId. This rowId you simply pass to the `remove()` method and it will remove the item from the cart.

```php
$rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

Cart::remove($rowId);
```

### Cart::get()

If you want to get an item from the cart using its rowId, you can simply call the `get()` method on the cart and pass it the rowId.

```php
$rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

Cart::get($rowId);
```

### Cart::content()

Of course you also want to get the carts content. This is where you'll use the `content` method. This method will return a Collection of CartItems which you can iterate over and show the content to your customers.

```php
Cart::content();
```

### Cart::destroy()

```php
Cart::destroy();
```

### Cart::total()

The `total()` method can be used to get the calculated total of all items in the cart, given there price and quantity.

```php
Cart::total();
```

### Cart::discount()

The `discount()` method can be used to get the total discount of all items in the cart. 

```php
Cart::discount();
```

### Cart::initial()

The `initial()` method can be used to get the total price of all items in the cart before applying discount. 

```php
Cart::initial();
```

### Cart::count()

If you want to know how many items there are in your cart, you can use the `count()` method. This method will return the total number of items in the cart. So if you've added 2 books and 1 shirt, it will return 3 items.

```php
Cart::count();
$cart->count();
```

### Cart::search()

To find an item in the cart, you can use the `search()` method.

```php
$cart->search(function ($cartItem, $rowId) {
	return $cartItem->id === 1;
});
```

### Cart::setDiscount($type, $value)

You can use the `setDiscount()` method to change the discount type and value that applies to Cart.

```php
Cart::setDiscount('percent', 10);
$cart->setDiscount('percent', 10);
```

```php
Cart::setDiscount('flat', 100);
$cart->setDiscount('flat', 100);
```

### Configuration
If you want to change Cart options, you'll have to publish the `config` file.

    php artisan vendor:publish --provider="Mugenzo\LaravelShoppingCart\ShoppingCartServiceProvider" --tag="config"

This will give you a `shopping_cart_config.php` config file in which you can make the changes.