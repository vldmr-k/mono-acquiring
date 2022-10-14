<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\RemoveMapper;
use VldmrK\MonoAcquiring\Model\Nothing;
use VldmrK\MonoAcquiring\Query\Invoice\RemoveQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class RemoveQuerySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-invoice-id");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RemoveQuery::class);
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn(['invoiceId' => "test-invoice-id"]);
    }

    function it_is_url() {
        $this->url()->shouldReturn("/api/merchant/invoice/remove");
    }

    function it_is_http_method_post() {
        $this->httpMethod()->shouldReturn("POST");
    }

    function it_is_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(RemoveMapper::class);
    }
}
