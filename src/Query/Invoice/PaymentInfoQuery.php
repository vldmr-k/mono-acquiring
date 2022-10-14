<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\Query\QueryInterface;

class PaymentInfoQuery implements QueryInterface {

    /**
     * @var string
     */
    private string $invoiceId;

    /**
     * PaymentInfo constructor.
     * @param string $invoiceId
     */
    public function __construct(string $invoiceId)
    {
        $this->invoiceId;
    }


    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId
        ];
    }
}
