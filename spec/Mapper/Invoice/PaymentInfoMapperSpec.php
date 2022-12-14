<?php

namespace spec\VldmrK\MonoAcquiring\Mapper\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\PaymentInfoMapper;
use VldmrK\MonoAcquiring\Model\Invoice\CancelListItem;
use VldmrK\MonoAcquiring\Model\Invoice\InvoicePaymentInfo;

class PaymentInfoMapperSpec extends ObjectBehavior
{

    private $jsonString = '{
      "maskedPan": "444403******1902",
      "approvalCode": "662476",
      "rrn": "060189181768",
      "amount": 4200,
      "ccy": 980,
      "finalAmount": 4200,
      "createdDate": "2019-08-24T14:15:22Z",
      "terminal": "MI001088",
      "paymentScheme": "full",
      "paymentMethod": "pan",
      "fee": 420,
      "domesticCard": true,
      "country": "804",
      "cancelList": [
        {
          "status": "processing",
          "createdDate": "2019-08-24T14:15:22Z",
          "modifiedDate": "2019-08-24T14:15:22Z",
          "amount": 4200,
          "ccy": 980,
          "approvalCode": "662476",
          "rrn": "060189181768",
          "extRef": "635ace02599849e981b2cd7a65f417fe"
        }
      ]
    }';

    private $jsonStringUnsetCancelList = '{
      "maskedPan": "444403******1902",
      "approvalCode": "662476",
      "rrn": "060189181768",
      "amount": 4200,
      "ccy": 980,
      "finalAmount": 4200,
      "createdDate": "2019-08-24T14:15:22Z",
      "terminal": "MI001088",
      "paymentScheme": "full",
      "paymentMethod": "pan",
      "fee": 420,
      "domesticCard": true,
      "country": "804"
    }';

    function it_is_initializable()
    {
        $this->shouldHaveType(PaymentInfoMapper::class);
    }

    function it_json_to_object_unset_cancel_list() {
        $this->jsonToObject($this->jsonStringUnsetCancelList)->shouldBeAnInstanceOf(InvoicePaymentInfo::class);

        $paymentInfo = new InvoicePaymentInfo(
            '444403******1902',
            '662476',
            '060189181768',
            4200,
            980,
            4200,
            '2019-08-24T14:15:22Z',
            'MI001088',
            'full',
            'pan',
            true,
            "804",
            420
        );
        $this->jsonToObject($this->jsonStringUnsetCancelList)->toArray()->shouldReturn($paymentInfo->toArray());
    }

    function it_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(InvoicePaymentInfo::class);

        $paymentInfo = new InvoicePaymentInfo(
            '444403******1902',
            '662476',
            '060189181768',
            4200,
            980,
            4200,
            '2019-08-24T14:15:22Z',
            'MI001088',
            'full',
            'pan',
            true,
            "804",
            420,
            [
                new CancelListItem(
                    'processing',
                    '2019-08-24T14:15:22Z',
                    '2019-08-24T14:15:22Z',
                    4200,
                    980,
                    '662476',
                    '060189181768',
                    '635ace02599849e981b2cd7a65f417fe'
                )
            ]
        );

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn($paymentInfo->toArray());
    }
}
