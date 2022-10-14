<?php

namespace spec\VldmrK\MonoAcquiring\Model\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\Invoice\CancelListItem;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceStatus;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class InvoiceStatusSpec extends ObjectBehavior
{
    function let(CancelListItem $item) {
        $item->toArray()->will(function () {
            return [
                'status' => 'cancel-success',
                'createdDate' => '2020-01-01',
                'modifiedDate' => '2020-01-02'
            ];
        });

        $this->beConstructedWith(
            'test-invoice-id',
            'success',
            10020,
            980,
            10000,
            'test-reference',
            '2020-01-03',
            '2020-01-04',
            'bad-message',
            [$item],

        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(InvoiceStatus::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'invoiceId' => 'test-invoice-id',
            'status' => 'success',
            'amount' => 10020,
            'ccy' => 980,
            'finalAmount' => 10000,

            'reference' => 'test-reference',
            'createdDate' => '2020-01-03',
            'modifiedDate' => '2020-01-04',
            'failureReason' => 'bad-message',

            'cancelList' => [
                [
                    'status' => 'cancel-success',
                    'createdDate' => '2020-01-01',
                    'modifiedDate' => '2020-01-02'
                ]
            ],

        ]);
    }
}
