<?php

namespace VldmrK\MonoAcquiring\Query\Invoice;

use VldmrK\MonoAcquiring\Mapper\Invoice\CreateMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class CreateQuery implements ResourceInterface
{
    public const PAYMENT_TYPE_DEBIT = 'debit';
    public const PAYMENT_TYPE_HOLD = 'hold';

    private int $amount;
    private ?MerchantPaymInfo $merchantPaymInfo;
    private ?int $ccy;
    private ?string $redirectUrl;
    private ?string $webHookUrl;
    private ?int $validity;
    private ?string $paymentType = self::PAYMENT_TYPE_DEBIT;
    private ?string $qrId = "";

    /**
     * Create constructor.
     * @param int $amount
     * @param MerchantPaymInfo|null $merchantPaymInfo
     * @param int|null $ccy
     * @param string|null $redirectUrl
     * @param string|null $webHookUrl
     * @param int|null $validity
     * @param string|null $paymentType
     * @param string|null $qrId
     */
    public function __construct(
        int $amount,
        ?MerchantPaymInfo $merchantPaymInfo = null,
        ?int $ccy = null,
        ?string $redirectUrl = null,
        ?string $webHookUrl = null,
        ?int $validity = null,
        ?string $paymentType = null,
        ?string $qrId = null
    ) {
        $this->amount = $amount;
        $this->merchantPaymInfo = $merchantPaymInfo;
        $this->ccy = $ccy;
        $this->redirectUrl = $redirectUrl;
        $this->webHookUrl = $webHookUrl;
        $this->validity = $validity;
        $this->paymentType = $paymentType;
        $this->qrId = $qrId;
    }

    /**
     * @return array<string, array<string, array<int, array<string,int|string|null>>|string>|int|string|null>
     */
    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'merchantPaymInfo' => $this->merchantPaymInfo ? $this->merchantPaymInfo->toArray() : [],
            'ccy' => $this->ccy,
            'redirectUrl' => $this->redirectUrl,
            'webHookUrl' => $this->webHookUrl,
            'validity' => $this->validity,
            'paymentType' => $this->paymentType,
            'qrId' => $this->qrId,
        ];
    }

    public function url(): string
    {
        return "/api/merchant/invoice/create";
    }

    public function httpMethod(): string
    {
        return "POST";
    }

    public function mapper(): MapperInterface
    {
        return new CreateMapper();
    }
}
