<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class Status implements ModelInterface {

    public string $invoiceId;
    public string $status;
    public int $amount;
    public int $ccy;
    public int $finalAmount;

    public ?string $reference;
    public ?string $createdDate;
    public ?string $modifierDate;
    public ?string $failureReason;
    public array $cancelList = [];


    /**
     * Status constructor.
     * @param string $invoiceId
     * @param string $status
     * @param int $amount
     * @param int $ccy
     * @param int $finalAmount
     * @param string|null $reference
     * @param string|null $createdDate
     * @param string|null $modifiedDate
     * @param string|null $failureReason
     */
    public function __construct(
        string $invoiceId,
        string $status,
        int $amount,
        int $ccy,
        int $finalAmount,

        ?string $reference = null,
        ?string $createdDate = null,
        ?string $modifiedDate = null,
        ?string $failureReason = null
    )
    {
        //required
        $this->invoiceId = $invoiceId;
        $this->status = $status;
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->finalAmount = $finalAmount;

        //optional
        $this->reference = $reference;
        $this->createdDate = $createdDate;
        $this->modifierDate = $modifiedDate;
        $this->failureReason = $failureReason;
    }

    /**
     * @param CancelListItem $item
     */
    public function addCancelList(CancelListItem $item): void
    {
        $this->cancelList[] = $item;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId,
            'status' => $this->status,
            'amount' => $this->amount,
            'ccy' => $this->ccy,
            'finalAmount' => $this->finalAmount,

            'cancelList' => array_map(function (CancelListItem $item): array {
                return $item->toArray();
            }, $this->cancelList),

            'reference' => $this->reference,
            'createdDate' => $this->createdDate,
            'modifierDate' => $this->modifierDate,
            'failureReason' => $this->failureReason
        ];
    }

}
