<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Nothing;

class RemoveMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return Nothing
     */
    public function jsonToObject(string $jsonString): Nothing
    {
        return new Nothing();
    }
}
