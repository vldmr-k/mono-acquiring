<?php

namespace spec\VldmrK\MonoAcquiring\Model\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\Invoice\CancelListItem;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class CancelListItemSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(
            'success',
            '2020-02-02',
            '2020-02-03',
            1070,
            980,
            'approval-code',
            'test-rrn',
            'test-ext-ref'
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CancelListItem::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'status' => 'success',
            'createdDate' => '2020-02-02',
            'modifiedDate' => '2020-02-03',

            'amount' => 1070,
            'ccy' => 980,
            'approvalCode' => 'approval-code',
            'rrn' => 'test-rrn',
            'extRef' => 'test-ext-ref'
        ]);
    }
}
