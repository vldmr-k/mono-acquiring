<?php

namespace spec\VldmrK\MonoAcquiring\Model\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCancel;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceCancelSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith('test-status', '2020-01-01', '2020-01-02');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(InvoiceCancel::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'status' => 'test-status',
            'createdDate' => '2020-01-01',
            'modifiedDate' => '2020-01-02'
        ]);
    }
}
