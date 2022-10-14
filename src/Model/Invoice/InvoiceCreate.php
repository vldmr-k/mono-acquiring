<?php

namespace VldmrK\MonoAcquiring\Model\Invoice;

use VldmrK\MonoAcquiring\Model\MapperInterface;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceCreate implements ModelInterface {

    /** @var string  */
    public string $invoiceId;

    /** @var string  */
    public string $pageUrl;

    public function __construct(string $invoiceId, string $pageUrl)
    {
        $this->invoiceId = $invoiceId;
        $this->pageUrl = $pageUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId,
            'pageUrl' => $this->pageUrl,
        ];
    }
}
