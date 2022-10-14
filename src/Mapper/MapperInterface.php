<?php

namespace VldmrK\MonoAcquiring\Mapper;

use VldmrK\MonoAcquiring\Model\ModelInterface;

interface MapperInterface {
    /**
     * @return $this
     */
    public function jsonToObject(string $jsonString): ModelInterface;
}
