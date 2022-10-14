<?php

namespace VldmrK\MonoAcquiring\Model;

use VldmrK\MonoAcquiring\CancelListItem;

class Statement implements ModelInterface {

    /**
     * @var array<int, MerchantStatementItem>
     */
    public array $list = [];

    /**
     * Pubkey constructor.
     * @param string $key
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }


    public function toArray(): array
    {
        return [
            'list' => array_map(function (MerchantStatementItem $item): array {
                return $item->toArray();
            }, $this->list)
        ];
    }
}
