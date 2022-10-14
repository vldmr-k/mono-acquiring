<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Query\QueryInterface;

class MerchantPaymInfo implements QueryInterface
{
    /**
     * @var string
     */
    private string $reference;

    /**
     * @var string
     */
    private string $destination;

    /**
     * @var array<int, BasketOrder>
     */
    private array $basketOrder = [];

    public function __construct(string $reference = '', string $destination = '')
    {
        $this->reference = $reference;
        $this->destination = $destination;
    }

    /**
     * @return array<string, string|null|array>
     */
    public function toArray(): array
    {
        return [
            'reference' => $this->reference,
            'destination' => $this->destination,
            'basketOrder' => array_map(function (BasketOrder $basketOrder): array {
                return $basketOrder->toArray();
            }, $this->basketOrder)
        ];
    }
}
