<?php


namespace Mugenzo\LaravelShoppingCart;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

class Discount
{
    const DEFAULT_INSTANCE = 'discount';

    /**
     * @var SessionManager
     */
    private $session;

    /**
     * Holds the current discount instance.
     *
     * @var string
     */
    private $instance;
    /**
     * Defines discount type
     *
     * @var string
     */
    private $type = 'percent';

    /**
     * Defines the discount percentage.
     *
     * @var float
     */
    private $value = 0;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;

        $this->instance()->retrieveDiscount();
    }

    /**
     * @param  null  $instance
     *
     * @return $this
     */
    public function instance($instance = null)
    {
        $instance = $instance ?: self::DEFAULT_INSTANCE;

        $this->instance = sprintf('%s.%s', 'cart', $instance);

        return $this;
    }

    /**
     * @param $type
     * @param $value
     *
     * @return Discount
     */
    public function setDiscount($type, $value)
    {
        $type  = ($type) ?: $this->type;
        $value = ($value) ?: $this->value;

        $this->session->put($this->instance,
            [
                'type'  => $type,
                'value' => $value,
            ]);

        return $this;
    }

    /**
     * @return Collection
     */
    public function retrieveDiscount()
    {
        if ($this->session->has($this->instance)) {
            return $this->session->get($this->instance);
        }

        return $this->session->put($this->instance, new Collection([
            'type'  => $this->type,
            'value' => $this->value,
        ]));
    }

    /**
     * @return mixed
     */
    public function destroy()
    {
        return $this->session->remove($this->instance);
    }

    /**
     * @param $attribute
     *
     * @return float|int|string|null
     */
    public function __get($attribute)
    {
        switch ($attribute) {
            case 'type':
                return $this->type;
            case 'value':
                return $this->value;
            default:
                return null;
        }
    }
}
