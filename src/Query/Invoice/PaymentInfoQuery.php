<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Mapper\Invoice\PaymentInfoMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class PaymentInfoQuery implements ResourceInterface
{
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
        $this->invoiceId = $invoiceId;
    }


    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId
        ];
    }

    public function url(): string
    {
        return "/api/merchant/invoice/payment-info";
    }

    public function httpMethod(): string
    {
        return "GET";
    }

    public function mapper(): MapperInterface
    {
        return new PaymentInfoMapper();
    }
}
