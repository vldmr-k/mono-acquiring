<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\CancelListItem;
use VldmrK\MonoAcquiring\Model\MapperInterface;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class PaymentInfo implements ModelInterface {

    public string $maskedPan;
    public string $approvalCode;
    public string $rrn;
    public int $amount;
    public int $ccy;
    public int $finalAmount;
    public string $createdDate;
    public string $terminal;
    public string $paymentScheme;
    public string $paymentMethod;
    public int $fee;
    public bool $domesticCard;
    public string $country;
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
        int $fee,
        bool $domesticCard,
        string $country)
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
    }

    /**
     * @param CancelListItem $item
     */
    public function addCancelList(CancelListItem $item): void {
        $this->cancelList[] = $item;
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
