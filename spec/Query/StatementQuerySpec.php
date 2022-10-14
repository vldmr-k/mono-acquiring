<?php

namespace spec\VldmrK\MonoAcquiring\Query;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\StatementMapper;
use VldmrK\MonoAcquiring\Query\StatementQuery;

class StatementQuerySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(time(), time()+1000);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StatementQuery::class);
    }

    function it_is_to_array() {
        $this->toArray()->shouldReturn([
            'from' => time(),
            'to' => time()+1000
        ]);
    }

    function it_is_url() {
        $this->url()->shouldReturn("/api/merchant/statement");
    }

    function it_is_http_method_get() {
        $this->httpMethod()->shouldReturn("GET");
    }

    function it_is_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(StatementMapper::class);
    }
}
