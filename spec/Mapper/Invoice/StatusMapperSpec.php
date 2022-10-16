<?php

namespace spec\VldmrK\MonoAcquiring\Mapper\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\StatusMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\CancelListItem;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCancel;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceStatus;
use VldmrK\MonoAcquiring\Model\Statement;
use VldmrK\MonoAcquiring\Model\StatementCancelListItem;
use VldmrK\MonoAcquiring\Model\StatementItem;

class StatusMapperSpec extends ObjectBehavior
{
    private $jsonString = '{
      "invoiceId": "p2_9ZgpZVsl3",
      "status": "created",
      "amount": 4200,
      "ccy": 980,
      "finalAmount": 4200,
      "reference": "84d0070ee4e44667b31371d8f8813947",
      "createdDate": "2019-08-24T14:15:22Z",
      "modifiedDate": "2019-08-24T14:15:22Z",
      "failureReason": "Неправильний CVV код",
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
      "invoiceId": "p2_9ZgpZVsl3",
      "status": "created",
      "amount": 4200,
      "ccy": 980,
      "finalAmount": 4200,
      "reference": "84d0070ee4e44667b31371d8f8813947",
      "createdDate": "2019-08-24T14:15:22Z",
      "modifiedDate": "2019-08-24T14:15:22Z",
      "failureReason": "Неправильний CVV код"
    }';

    function it_is_initializable()
    {
        $this->shouldHaveType(StatusMapper::class);
        $this->shouldImplement(MapperInterface::class);
    }

    function it_to_json_object_not_set_cancel_list() {

        $status = new InvoiceStatus(
            'p2_9ZgpZVsl3',
            'created',
            4200,
            980,
            4200,
            '84d0070ee4e44667b31371d8f8813947',
            '2019-08-24T14:15:22Z',
            '2019-08-24T14:15:22Z',
            'Неправильний CVV код'
        );

        $this->jsonToObject($this->jsonStringUnsetCancelList)->toArray()->shouldReturn($status->toArray());
    }

    function it_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(InvoiceStatus::class);

        $status = new InvoiceStatus(
            'p2_9ZgpZVsl3',
            'created',
            4200,
            980,
            4200,
            '84d0070ee4e44667b31371d8f8813947',
            '2019-08-24T14:15:22Z',
            '2019-08-24T14:15:22Z',
            'Неправильний CVV код',
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

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn($status->toArray());
    }
}
