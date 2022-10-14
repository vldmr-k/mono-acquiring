<?php

namespace VldmrK\MonoAcquiring\Query;


use VldmrK\MonoAcquiring\Mapper\MapperInterface;

interface ResourceInterface extends QueryInterface {

    /** @return string */
    public function url(): string ;

    /** @return string */
    public function httpMethod(): string ;

    /** @return MapperInterface */
    public function mapper(): MapperInterface ;
}
