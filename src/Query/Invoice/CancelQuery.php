<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Mapper\Invoice\CancelMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class CancelQuery implements ResourceInterface
{
    /** @var string  */
    public string $invoiceId;
    /** @var string|null  */
    public ?string $extRef;
    /** @var int|null  */
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
     * @return array<string, string|null|int>
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
