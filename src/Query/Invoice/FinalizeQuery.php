<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Mapper\Invoice\FinalizeMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Query\QueryInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class FinalizeQuery implements ResourceInterface {

    /** @var string  */
    private string $invoiceId;
    /** @var int|null  */
    private ?int $amount;

    /**
     * Finalize constructor.
     * @param string $invoiceId
     * @param int|null $amount
     */
    public function __construct(string $invoiceId, ?int $amount = null)
    {
        $this->invoiceId = $invoiceId;
        $this->amount = $amount;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId,
            'amount' => $this->amount
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/invoice/finalize";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return MapperInterface
     */
    public function mapper(): MapperInterface
    {
        return new FinalizeMapper();
    }
}
