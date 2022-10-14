<?php

namespace VldmrK\MonoAcquiring\Query;


use VldmrK\MonoAcquiring\Mapper\DetailsMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;

class DetailsQuery implements ResourceInterface {


    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/details";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return MapperInterface
     */
    public function mapper(): MapperInterface
    {
        return new DetailsMapper();
    }
}
