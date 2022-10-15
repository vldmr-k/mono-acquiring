<?php

namespace VldmrK\MonoAcquiring\Query;

use VldmrK\MonoAcquiring\Mapper\PubkeyMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;

class PubkeyQuery implements QueryInterface, ResourceInterface
{
    /**
     * @phpstan-ignore-next-line
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }

    public function url(): string
    {
        return "/api/merchant/pubkey";
    }

    public function httpMethod(): string
    {
        return "GET";
    }

    public function mapper(): MapperInterface
    {
        return new PubkeyMapper();
    }
}
