<?php

namespace spec\VldmrK\MonoAcquiring\Mapper;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\RawMapper;
use VldmrK\MonoAcquiring\Model\RawModel;

class RawMapperSpec extends ObjectBehavior
{

    private $jsonString = '{"invoice": "invoice-id"}';

    function it_is_initializable()
    {
        $this->shouldHaveType(RawMapper::class);
    }

    function it_json_to_object_instance_of() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(RawModel::class);
    }

    function it_json_to_object_content() {
        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn([
            'raw' => $this->jsonString
        ]);
    }
}
