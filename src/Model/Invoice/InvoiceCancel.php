<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceCancel implements ModelInterface
{
    /** @var string  */
    public string $status;
    /** @var string  */
    public string $createdDate;
    /** @var string  */
    public string $modifiedDate;

    /**
     * InvoiceCancel constructor.
     * @param string $status
     * @param string $createdDate
     * @param string $modifiedDate
     */
    public function __construct(string $status, string $createdDate, string $modifiedDate)
    {
        $this->status = $status;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @return array<string, string>
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
