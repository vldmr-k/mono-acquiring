<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Mapper\Invoice\RemoveMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class RemoveQuery implements ResourceInterface
{
    /**
     * @var string
     */
    public string $invoiceId;

    /**
     * RemoveQuery constructor.
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
        return [
            "invoiceId" => $this->invoiceId
        ];
    }

    public function url(): string
    {
        return "/api/merchant/invoice/remove";
    }

    public function httpMethod(): string
    {
        return "POST";
    }

    public function mapper(): MapperInterface
    {
        return new RemoveMapper();
    }
}
