<?php

namespace spec\VldmrK\MonoAcquiring\Model;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\StatementItem;
use VldmrK\MonoAcquiring\Model\ModelInterface;
use VldmrK\MonoAcquiring\Model\Statement;

class StatementSpec extends ObjectBehavior
{

    function let(StatementItem $item) {
        $item->toArray()->will(function ($args) {
            return [
                'invoiceId' => "test-invoice-id",
                'status' => "success",
                'maskedPan' => '5555****5555',
                'date' => '2020-01-01',
                'paymentScheme' => 'full',
                'amount' => 1000,
                'profitAmount' => 960,
                'ccy' => 980,
            ];
        });
        $this->beConstructedWith([$item]);

    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Statement::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->list->shouldHaveCount(1);
        $this->toArray()->shouldReturn([
            'list' => [
                [
                    'invoiceId' => "test-invoice-id",
                    'status' => "success",
                    'maskedPan' => '5555****5555',
                    'date' => '2020-01-01',
                    'paymentScheme' => 'full',
                    'amount' => 1000,
                    'profitAmount' => 960,
                    'ccy' => 980,
                ]
            ]
        ]);
    }
}
