<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Query\QueryInterface;

class BasketOrder implements QueryInterface
{
    /** @var string  */
    public string $name;
    /** @var int  */
    public int $qty;
    /** @var int  */
    public int $sum;
    /** @var string|null  */
    public ?string $icon;
    /** @var string|null  */
    public ?string $unit;

    /**
     * BasketOrder constructor.
     * @param string $name
     * @param int $qty
     * @param int $sum
     * @param string|null $icon
     * @param string|null $unit
     */
    public function __construct(string $name, int $qty, int $sum, ?string $icon = null, ?string $unit = null)
    {
        $this->name = $name;
        $this->qty = $qty;
        $this->sum = $sum;
        $this->icon = $icon;
        $this->unit = $unit;
    }

    /**
     * @return array<string, string|null|int>
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
