<?php

namespace spec\VldmrK\MonoAcquiring\Mapper\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\FinalizeMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceFinalize;

class FinalizeMapperSpec extends ObjectBehavior
{
    private $jsonString = '{
      "status": "success"
    }';

    function it_is_initializable()
    {
        $this->shouldHaveType(FinalizeMapper::class);
        $this->shouldImplement(MapperInterface::class);
    }

    function it_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(InvoiceFinalize::class);

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn(\json_decode($this->jsonString, true));

    }
}
