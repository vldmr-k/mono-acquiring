<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceStatus implements ModelInterface {

    /** @var string  */
    public string $invoiceId;
    /** @var string  */
    public string $status;
    /** @var int  */
    public int $amount;
    /** @var int  */
    public int $ccy;
    /** @var int  */
    public int $finalAmount;

    /** @var string|null  */
    public ?string $reference;
    /** @var string|null  */
    public ?string $createdDate;
    /** @var string|null  */
    public ?string $modifiedDate;
    /** @var string|null  */
    public ?string $failureReason;
    /** @var array <int, StatusCancelListItem> */
    public array $cancelList = [];


    /**
     * Status constructor.
     * @param string $invoiceId
     * @param string $status
     * @param int $amount
     * @param int $ccy
     * @param int $finalAmount
     * @param CancelListItem[] $cancelList
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
        ?string $failureReason = null,
        array $cancelList = []
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
        $this->modifiedDate = $modifiedDate;
        $this->failureReason = $failureReason;

        $this->cancelList = $cancelList;

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

            'reference' => $this->reference,
            'createdDate' => $this->createdDate,
            'modifiedDate' => $this->modifiedDate,
            'failureReason' => $this->failureReason,

            'cancelList' => array_map(function (CancelListItem $item): array {
                return $item->toArray();
            }, $this->cancelList),

        ];
    }

}
