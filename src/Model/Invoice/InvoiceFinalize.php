<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceFinalize implements ModelInterface
{
    /**
     * @var string
     */
    public string $status;

    /**
     * Finalize constructor.
     * @param string $status
     */
    public function __construct(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return array|string[]
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status
        ];
    }
}
