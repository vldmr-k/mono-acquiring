<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Query\Invoice\PaymentInfoQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class PaymentInfoQuerySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-invoice");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PaymentInfoQuery::class);
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'invoiceId' => "test-invoice"
        ]);
    }


}
