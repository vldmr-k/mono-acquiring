<?php

namespace spec\VldmrK\MonoAcquiring\Mapper\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\CreateMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCreate;

class CreateMapperSpec extends ObjectBehavior
{
    private $jsonString = '{
      "invoiceId": "p2_9ZgpZVsl3",
      "pageUrl": "https://pay.mbnk.biz/p2_9ZgpZVsl3"
    }';

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateMapper::class);
        $this->shouldImplement(MapperInterface::class);
    }

    function it_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(InvoiceCreate::class);

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn(json_decode($this->jsonString, true));
    }
}
