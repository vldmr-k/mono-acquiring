<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Mapper\Invoice\CancelMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Query\QueryInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class CancelQuery implements ResourceInterface {

    public string $invoiceId;
    public ?string $extRef;
    public ?int $amount;

    /**
     * CancelQuery constructor.
     * @param string $invoiceId
     * @param string|null $extRef
     * @param int|null $amount
     */
    public function __construct(string $invoiceId, ?string $extRef = null, ?int $amount = null)
    {
        $this->invoiceId = $invoiceId;
        $this->extRef = $extRef;
        $this->amount = $amount;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "invoiceId" => $this->invoiceId,
            "extRef" => $this->extRef,
            "amount" => $this->amount,
        ];
    }

    public function url(): string
    {
        return "/api/merchant/invoice/cancel";
    }

    public function httpMethod(): string
    {
        return "POST";
    }

    public function mapper(): MapperInterface
    {
        return new CancelMapper();
    }
}
