<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class CancelListItem implements ModelInterface  {

    public string $status;
    public string $createdDate;
    public string $modifiedDate;

    public int $amount;
    public int $ccy;
    public string $approvalCode;
    public string $rrn;
    public string $extRef;

    public function __construct(string $status, string $createdDate, string $modifiedDate, int  $amount = 0, int $ccy = 0, string $approvalCode = '', string $rrn = '', string $extRef = '')
    {
        //required
        $this->status = $status;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;

        //optional
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
        $this->extRef = $extRef;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'createdDate' => $this->createdDate,
            'modifiedDate' => $this->modifiedDate,
            'amount' => $this->amount,
            'ccy' => $this->ccy,
            'approvalCode' => $this->approvalCode,
            'rrn' => $this->rrn,
            'extRef' => $this->extRef
        ];
    }
}
