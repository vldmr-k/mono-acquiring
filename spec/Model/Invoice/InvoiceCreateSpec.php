<?php

namespace spec\VldmrK\MonoAcquiring\Model\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCreate;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceCreateSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-invoice", 'http://example.com/payment_url');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(InvoiceCreate::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'invoiceId' => 'test-invoice',
            'pageUrl' => 'http://example.com/payment_url',
        ]);
    }

}
