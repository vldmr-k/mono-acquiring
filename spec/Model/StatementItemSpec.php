<?php

namespace spec\VldmrK\MonoAcquiring\Model;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\StatementItem;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class StatementItemSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(
            "test-invoice-id",
            "status-ok",
            "00**0013",
            date("Y-m-d"),
            "full",
            1050,
            1000,
            980,
            "662476",
            "060189181768",
            "84d0070ee4e44667b31371d8f8813947"
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StatementItem::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'invoiceId' => "test-invoice-id",
            'status' => "status-ok",
            'maskedPen' => "00**0013",
            'date' => date("Y-m-d"),
            'paymentScheme' => "full",
            'amount' => 1050,
            'profitAmount' => 1000,
            'ccy' => 980,
            'approvalCode' => "662476",
            'rrn' => "060189181768",
            'reference' => "84d0070ee4e44667b31371d8f8813947",
            "cancelList" => []
        ]);
    }
}
