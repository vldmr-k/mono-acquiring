<?php

namespace VldmrK\MonoAcquiring\Mapper;

use VldmrK\MonoAcquiring\Model\Details;

class DetailsMapper implements MapperInterface {

    /**
     * @param string $jsonString
     * @return self
     */
    public function jsonToObject(string $jsonString): Details
    {
        $data = \json_decode($jsonString, true);
        return new Details($data['merchantId'], $data['merchantName']);
    }

}
