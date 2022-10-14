<?php

namespace spec\VldmrK\MonoAcquiring\Model;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\StatementCancelListItem;

class StatementCancelListItemSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(10050, 980, date('Y-m-d'), '5555****1111', "approval-code", "rrn-code");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StatementCancelListItem::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'amount' => 10050,
            'ccy' => 980,
            'date' => date('Y-m-d'),
            'maskedPan' => '5555****1111',
            'approvalCode' => 'approval-code',
            'rrn' => 'rrn-code'
        ]);
    }
}
