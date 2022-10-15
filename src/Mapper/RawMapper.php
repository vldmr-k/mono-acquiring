<?php

namespace VldmrK\MonoAcquiring\Mapper;

use VldmrK\MonoAcquiring\Model\ModelInterface;
use VldmrK\MonoAcquiring\Model\RawModel;

class RawMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return ModelInterface
     */
    public function jsonToObject(string $jsonString): ModelInterface
    {
        return new RawModel($jsonString);
    }
}
