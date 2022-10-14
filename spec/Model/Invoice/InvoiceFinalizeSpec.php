<?php

namespace spec\VldmrK\MonoAcquiring\Model\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceFinalize;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceFinalizeSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith('success');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(InvoiceFinalize::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'status' => 'success'
        ]);
    }
}
