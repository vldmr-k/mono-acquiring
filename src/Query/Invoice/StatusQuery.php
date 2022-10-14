<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Mapper\Invoice\StatusMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Query\QueryInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class StatusQuery implements ResourceInterface
{
    /**
     * @var string
     */
    public string $invoiceId;

    /**
     * Status constructor.
     * @param string $invoiceId
     */
    public function __construct(string $invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * @return array|string[]
     */
    public function toArray(): array
    {
        return ['invoiceId' => $this->invoiceId];
    }

    public function url(): string
    {
        return "/api/merchant/invoice/status";
    }

    public function httpMethod(): string
    {
        return "GET";
    }

    public function mapper(): MapperInterface
    {
        return new StatusMapper();
    }
}
