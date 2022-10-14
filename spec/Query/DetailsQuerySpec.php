<?php

namespace spec\VldmrK\MonoAcquiring\Query;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\DetailsMapper;
use VldmrK\MonoAcquiring\Query\DetailsQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class DetailsQuerySpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(DetailsQuery::class);
        $this->shouldBeAnInstanceOf(ResourceInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([]);
    }

    function it_url() {
        $this->url()->shouldReturn("/api/merchant/details");
    }

    function it_http_method() {
        $this->httpMethod()->shouldReturn("GET");
    }

    function it_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(DetailsMapper::class);
    }
}
