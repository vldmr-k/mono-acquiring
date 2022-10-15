<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCreate;

class CreateMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return InvoiceCreate
     */
    public function jsonToObject(string $jsonString): InvoiceCreate
    {
        $data = \json_decode($jsonString, true);

        return new InvoiceCreate($data['invoiceId'], $data['pageUrl']);
    }
}
