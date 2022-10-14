<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoicePaymentInfo implements ModelInterface {

    /** @var string  */
    public string $maskedPan;
    /** @var string  */
    public string $approvalCode;
    /** @var string  */
    public string $rrn;
    /** @var int  */
    public int $amount;
    /** @var int  */
    public int $ccy;
    /** @var int  */
    public int $finalAmount;
    /** @var string  */
    public string $createdDate;
    /** @var string  */
    public string $terminal;
    /** @var string  */
    public string $paymentScheme;
    /** @var string  */
    public string $paymentMethod;
    /** @var int|null  */
    public ?int $fee;
    /** @var bool  */
    public bool $domesticCard;
    /** @var string  */
    public string $country;
    /** @var array<int, CancelListItem> */
    public array $cancelList = [];

    public function __construct(
        string $maskedPan,
        string $approvalCode,
        string $rrn,
        int $amount,
        int $ccy,
        int $finalAmount,
        string $createdDate,
        string $terminal,
        string $paymentScheme,
        string $paymentMethod,
        bool $domesticCard,
        string $country,
        ?int $fee = null,
        array $cancelList = []
    )
    {
        $this->maskedPan = $maskedPan;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->finalAmount = $finalAmount;
        $this->createdDate = $createdDate;
        $this->terminal = $terminal;
        $this->paymentScheme = $paymentScheme;
        $this->paymentMethod = $paymentMethod;
        $this->fee = $fee;
        $this->domesticCard = $domesticCard;
        $this->country = $country;
        $this->cancelList = $cancelList;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'maskedPan' => $this->maskedPan,
            'approvalCode' => $this->approvalCode,
            'rrn' => $this->rrn,
            'amount' => $this->amount,
            'ccy' => $this->ccy,
            'finalAmount' => $this->finalAmount,
            'createdDate' => $this->createdDate,
            'terminal' => $this->terminal,
            'paymentScheme' => $this->paymentScheme,
            'paymentMethod' => $this->paymentMethod,
            'fee' => $this->fee,
            'domesticCard' => $this->domesticCard,
            'country' => $this->country,
            'cancelList' => array_map(function (CancelListItem $item): array {
                return $item->toArray();
            }, $this->cancelList)
        ];
    }
}
