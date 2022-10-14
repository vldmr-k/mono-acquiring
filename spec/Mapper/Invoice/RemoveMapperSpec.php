<?php

namespace spec\VldmrK\MonoAcquiring\Mapper\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\Invoice\RemoveMapper;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Nothing;

class RemoveMapperSpec extends ObjectBehavior
{
    private $jsonString = '{}';

    function it_is_initializable()
    {
        $this->shouldHaveType(RemoveMapper::class);
        $this->shouldImplement(MapperInterface::class);
    }

    function it_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(Nothing::class);
        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn([]);

    }
}
