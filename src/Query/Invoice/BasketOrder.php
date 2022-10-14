<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;


use VldmrK\MonoAcquiring\Query\QueryInterface;

class BasketOrder implements QueryInterface {

    public string $name;
    public int $qty;
    public int $sum;
    public ?string $icon;
    public ?string $unit;

    /**
     * BasketOrder constructor.
     * @param string $name
     * @param int $qty
     * @param int $sum
     * @param string $icon
     * @param string $units
     */
    public function __construct(string $name, int $qty, int $sum, ?string $icon = null, ?string  $unit = null)
    {
        $this->name = $name;
        $this->qty = $qty;
        $this->sum = $sum;
        $this->icon = $icon;
        $this->unit = $unit;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'qty' => $this->qty,
            'sum' => $this->sum,
            'icon' => $this->icon,
            'unit' => $this->unit
        ];
    }

}
