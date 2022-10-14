<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\Finalize;

class FinalizeMapper implements MapperInterface {

    /**
     * @param string $jsonString
     * @return Finalize
     */
    public function jsonToObject(string $jsonString): Finalize
    {
        $data = \json_decode($jsonString, true);

        return new Finalize($data['status']);
    }
}
