<?php

namespace spec\VldmrK\MonoAcquiring\Model;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\ModelInterface;
use VldmrK\MonoAcquiring\Model\RawModel;

class RawModelSpec extends ObjectBehavior
{

    function let() {
        $this->beConstructedWith('{"result": "test-result"}');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RawModel::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'raw' => '{"result": "test-result"}'
        ]);
    }
}
