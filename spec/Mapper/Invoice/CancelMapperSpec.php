<?php

namespace spec\VldmrK\MonoAcquiring\Mapper\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\CancelMapper;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCancel;

class CancelMapperSpec extends ObjectBehavior
{

    private $jsonString = '{
      "status": "processing",
      "createdDate": "2019-08-24T14:15:22Z",
      "modifiedDate": "2019-08-24T14:15:22Z"
    }';


    function it_is_initializable()
    {
        $this->shouldHaveType(CancelMapper::class);
    }

    function it_json_to_string() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(InvoiceCancel::class);

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn(json_decode($this->jsonString, true));
    }
}
