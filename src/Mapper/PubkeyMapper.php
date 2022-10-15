<?php

namespace VldmrK\MonoAcquiring\Mapper;

use VldmrK\MonoAcquiring\Model\Pubkey;

class PubkeyMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return Pubkey
     */
    public function jsonToObject(string $jsonString): Pubkey
    {
        $data = \json_decode($jsonString, true);
        return new Pubkey($data['key']);
    }
}
