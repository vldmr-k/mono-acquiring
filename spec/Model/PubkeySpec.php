<?php

namespace spec\VldmrK\MonoAcquiring\Model;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\ModelInterface;
use VldmrK\MonoAcquiring\Model\Pubkey;

class PubkeySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-key");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Pubkey::class);
        $this->shouldImplement(ModelInterface::class);
    }

    function it_is_to_array() {
        $this->toArray()->shouldReturn([
            'key' => 'test-key'
        ]);
    }


}
