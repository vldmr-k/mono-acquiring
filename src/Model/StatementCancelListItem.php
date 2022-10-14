<?php

namespace VldmrK\MonoAcquiring\Model;

class StatementCancelListItem implements ModelInterface {

    /** @var int  */
    public int $amount;
    /** @var int  */
    public int $ccy;
    /** @var string  */
    public string $date;
    /** @var string  */
    public string $maskedPan;

    /** @var string|null  */
    public ?string $approvalCode;
    /** @var string|null  */
    public ?string $rrn;

    /**
     * CancelListItem constructor.
     * @param int $amount
     * @param int $ccy
     * @param string $date
     * @param string $maskedPan
     * @param string|null $approvalCode
     * @param string|null $rrn
     */
    public function __construct(int $amount, int $ccy, string $date, string $maskedPan, ?string $approvalCode = null, ?string $rrn = null)
    {
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->date = $date;
        $this->maskedPan = $maskedPan;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'ccy' => $this->ccy,
            'date' => $this->date,
            'maskedPan' => $this->maskedPan,
            'approvalCode' => $this->approvalCode,
            'rrn' => $this->rrn
        ];
    }
}
