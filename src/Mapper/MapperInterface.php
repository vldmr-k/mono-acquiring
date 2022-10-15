<?php

namespace VldmrK\MonoAcquiring\Mapper;

use VldmrK\MonoAcquiring\Model\ModelInterface;

interface MapperInterface
{
    /**
     * @param string $jsonString
     * @return ModelInterface $self
     */
    public function jsonToObject(string $jsonString): ModelInterface;
}
