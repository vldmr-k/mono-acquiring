<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class CancelListItem implements ModelInterface
{
    /** @var string  */
    public string $status;
    /** @var string  */
    public string $createdDate;
    /** @var string  */
    public string $modifiedDate;

    /** @var int|null  */
    public ?int $amount;
    /** @var int|null  */
    public ?int $ccy;
    /** @var string|null  */
    public ?string $approvalCode;
    /** @var string|null  */
    public ?string $rrn;
    /** @var string|null  */
    public ?string $extRef;

    /**
     * StatusCancelListItem constructor.
     * @param string $status
     * @param string $createdDate
     * @param string $modifiedDate
     * @param int|null $amount
     * @param int|null $ccy
     * @param string|null $approvalCode
     * @param string|null $rrn
     * @param string|null $extRef
     */
    public function __construct(
        string $status,
        string $createdDate,
        string $modifiedDate,
        ?int $amount = null,
        ?int $ccy = null,
        ?string $approvalCode = null,
        ?string $rrn = null,
        ?string $extRef = null
    ) {
        $this->status = $status;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;

        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
        $this->extRef = $extRef;
    }

    /**
     * @return array<string, string|int|null>
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
