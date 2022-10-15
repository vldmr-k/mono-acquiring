<?php

namespace spec\VldmrK\MonoAcquiring\Mapper\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\StatusMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceStatus;

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

    function it_is_initializable()
    {
        $this->shouldHaveType(StatusMapper::class);
        $this->shouldImplement(MapperInterface::class);
    }

    function it_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(InvoiceStatus::class);

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn(\json_decode($this->jsonString, true));
    }
}
