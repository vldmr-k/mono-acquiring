<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\CreateMapper;
use VldmrK\MonoAcquiring\Query\Invoice\CreateQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class CreateQuerySpec extends ObjectBehavior
{

    function let() {
        $this->beConstructedWith(1600, null, 100, "http://example.com/success_redirect", "http://example.com/webhook", 3600, 'hold', 'test-qr-id');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateQuery::class);
        $this->beAnInstanceOf(ResourceInterface::class);
    }

    public function it_to_array() {
        $this->toArray()->shouldReturn([
           "amount" => 1600,
            "merchantPaymInfo" => [],
            "ccy" => 100,
            "redirectUrl" => "http://example.com/success_redirect",
            "webHookUrl" => "http://example.com/webhook",
            "validity" => 3600,
            "paymentType" => "hold",
            "qrId" => "test-qr-id"
        ]);
    }

    public function it_url() {
        $this->url()->shouldReturn("/api/merchant/invoice/create");
    }

    public function it_http_method() {
        $this->httpMethod()->shouldReturn("POST");
    }

    public function it_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(CreateMapper::class);
    }
}
