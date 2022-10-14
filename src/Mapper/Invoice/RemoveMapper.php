<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Nothing;

class RemoveMapper implements MapperInterface {

    public function jsonToObject(string $jsonString): Nothing
    {
        return new Nothing();
    }

}
