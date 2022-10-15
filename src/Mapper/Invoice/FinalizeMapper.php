<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceFinalize;

class FinalizeMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return InvoiceFinalize
     */
    public function jsonToObject(string $jsonString): InvoiceFinalize
    {
        $data = \json_decode($jsonString, true);

        return new InvoiceFinalize($data['status']);
    }
}
