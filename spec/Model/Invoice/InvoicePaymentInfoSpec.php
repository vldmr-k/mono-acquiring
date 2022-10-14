<?php

namespace spec\VldmrK\MonoAcquiring\Model\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\Invoice\CancelListItem;
use VldmrK\MonoAcquiring\Model\Invoice\InvoicePaymentInfo;

class InvoicePaymentInfoSpec extends ObjectBehavior
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
            '4444****4444',
            'approval-code',
            'test-rrn',
            1020,
            980,
            1000,
            '2020-01-02',
            'test-terminal',
            'full',
            'mono',
            false,
            'UA',
            20,
            [$item]
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(InvoicePaymentInfo::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'maskedPan' => '4444****4444',
            'approvalCode' => 'approval-code',
            'rrn' => 'test-rrn',
            'amount' => 1020,
            'ccy' => 980,
            'finalAmount' => 1000,
            'createdDate' => '2020-01-02',
            'terminal' => 'test-terminal',
            'paymentScheme' => 'full',
            'paymentMethod' => 'mono',
            'fee' => 20,
            'domesticCard' => false,
            'country' => 'UA',
            'cancelList' => [
                [
                    'status' => 'cancel-success',
                    'createdDate' => '2020-01-01',
                    'modifiedDate' => '2020-01-02'
                ],
            ]
        ]);
    }
}
