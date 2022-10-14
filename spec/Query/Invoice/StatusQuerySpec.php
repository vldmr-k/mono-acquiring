<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\StatusMapper;
use VldmrK\MonoAcquiring\Query\Invoice\StatusQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class StatusQuerySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-invoice-id");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StatusQuery::class);
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_is_to_array() {
        $this->toArray()->shouldReturn(['invoiceId' => "test-invoice-id"]);
    }

    function it_is_url() {
        $this->url()->shouldReturn("/api/merchant/invoice/status");
    }

    function it_is_http_method_get() {
        $this->httpMethod()->shouldReturn("GET");
    }

    function it_is_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(StatusMapper::class);
    }
}
