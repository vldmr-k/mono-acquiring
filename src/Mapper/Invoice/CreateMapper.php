<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\Create;

class CreateMapper implements MapperInterface {

    public function jsonToObject(string $jsonString): Create
    {
        $data = \json_decode($jsonString, true);

        return new Create($data['invoiceId'], $data['pageUrl']);
    }
}
