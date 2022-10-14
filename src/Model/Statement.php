<?php

namespace VldmrK\MonoAcquiring\Model;

class Statement implements ModelInterface
{
    /**
     * @var array<int, StatementItem>
     */
    public array $list = [];

    /**
     * Pubkey constructor.
     * @param StatementItem[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    /**
     * @return array<string, array<int, array<string, array<int, array>|int|string|null>>>
     */
    public function toArray(): array
    {
        return [
            'list' => array_map(function (StatementItem $item): array {
                return $item->toArray();
            }, $this->list)
        ];
    }
}
