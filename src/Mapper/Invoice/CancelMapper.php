<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\Cancel;

class CancelMapper implements MapperInterface {

    /**
     * @param string $jsonString
     * @return Cancel
     */
    public function jsonToObject(string $jsonString): Cancel
    {
        $data = \json_decode($jsonString, true);
        return new Cancel($data['status'], $data['createdDate'], $data['modifiedDate']);
    }
}
