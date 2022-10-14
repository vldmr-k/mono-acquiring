<?php

namespace VldmrK\MonoAcquiring\Model;

use VldmrK\MonoAcquiring\CancelListItem;

class MerchantStatementItem implements ModelInterface {

    /** @var string  */
    public string $invoiceId;
    /** @var string  */
    public string $status;
    /** @var string  */
    public string $maskedPan;
    /** @var string  */
    public string $date;
    /** @var string  */
    public string $paymentScheme;
    /** @var int  */
    public int $amount;
    /** @var int  */
    public int $profitAmount;
    /** @var int  */
    public int $ccy;
    /** @var string  */
    public ?string $approvalCode;
    /** @var string  */
    public ?string $rrn;
    /** @var string  */
    public ?string $reference;

    /** @var array<int, StatementCancelListItem> */
    public array $cancelList = [];

    public function __construct(
        string $invoiceId,
        string $status,
        string $maskedPan,
        string $date,
        string $paymentScheme,
        int $amount,
        int $profitAmount,
        int $ccy,
        ?string $approvalCode = null,
        ?string $rrn = null,
        ?string $reference = null
    )
    {
        $this->invoiceId = $invoiceId;
        $this->status = $status;
        $this->maskedPan = $maskedPan;
        $this->date = $date;
        $this->paymentScheme = $paymentScheme;
        $this->amount = $amount;
        $this->profitAmount = $profitAmount;
        $this->ccy = $ccy;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
        $this->reference = $reference;
    }

    /**
     * @param CancelListItem $item
     */
    public function addCancelItem(StatementCancelListItem $item): void {
        $this->cancelList[] = $item;
    }

    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId,
            'status' => $this->status,
            'maskedPen' => $this->maskedPan,
            'date' => $this->date,
            'paymentScheme' => $this->paymentScheme,
            'amount' => $this->amount,
            'profitAmount' => $this->profitAmount,
            'ccy' => $this->ccy,
            'approvalCode' => $this->approvalCode,
            'rrn' => $this->rrn,
            'reference' => $this->reference,
            'cancelList' => array_map(function (StatementCancelListItem $model) {
                return $model->toArray();
            }, $this->cancelList)
        ];
    }
}
