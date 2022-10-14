<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\CancelMapper;
use VldmrK\MonoAcquiring\Query\Invoice\CancelQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class CancelQuerySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-invoice-id", "test-ext-ref", 100);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CancelQuery::class);
        $this->shouldBeAnInstanceOf(ResourceInterface::class);
    }

    public function it_to_array() {
        $this->toArray()->shouldReturn([
            'invoiceId' => "test-invoice-id",
            "extRef" => "test-ext-ref",
            "amount" => 100
        ]);
    }

    public function it_url() {
        $this->url()->shouldReturn("/api/merchant/invoice/cancel");
    }

    public function it_http_method() {
        $this->httpMethod()->shouldReturn("POST");
    }

    public function it_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(CancelMapper::class);
    }
}
