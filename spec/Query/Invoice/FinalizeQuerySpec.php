<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\FinalizeMapper;
use VldmrK\MonoAcquiring\Query\Invoice\FinalizeQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class FinalizeQuerySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-invoice-id", 150);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FinalizeQuery::class);
        $this->shouldBeAnInstanceOf(ResourceInterface::class);
    }

    public function it_to_array() {
        $this->toArray()->shouldReturn([
            "invoiceId" => "test-invoice-id",
            "amount" => 150
        ]);
    }

    public function it_url() {
        $this->url()->shouldReturn("/api/merchant/invoice/finalize");
    }

    public function it_http_method() {
        $this->httpMethod()->shouldReturn("POST");
    }

    public function it_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(FinalizeMapper::class);
    }
}
