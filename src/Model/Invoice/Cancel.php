<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class Cancel implements ModelInterface {

    /** @var string  */
    public string $status;
    /** @var string  */
    public string $createdDate;
    /** @var string  */
    public string $modifiedDate;

    /**
     * Cancel constructor.
     * @param string $invoiceId
     * @param string $extRef
     * @param int $amount
     */
    public function __construct(string $status, string $createdDate, string $modifiedDate)
    {
        $this->status = $status;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'createdDate' => $this->createdDate,
            'modifiedDate' => $this->modifiedDate
        ];
    }

}
