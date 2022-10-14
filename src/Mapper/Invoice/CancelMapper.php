<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCancel;

class CancelMapper implements MapperInterface {

    /**
     * @param string $jsonString
     * @return InvoiceCancel
     */
    public function jsonToObject(string $jsonString): InvoiceCancel
    {
        $data = \json_decode($jsonString, true);
        return new InvoiceCancel($data['status'], $data['createdDate'], $data['modifiedDate']);
    }
}
