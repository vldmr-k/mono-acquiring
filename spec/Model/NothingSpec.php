<?php

namespace spec\VldmrK\MonoAcquiring\Model;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\ModelInterface;
use VldmrK\MonoAcquiring\Model\Nothing;

class NothingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Nothing::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([]);
    }
}
