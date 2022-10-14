<?php

namespace spec\VldmrK\MonoAcquiring\Mapper;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\PubkeyMapper;
use VldmrK\MonoAcquiring\Model\Pubkey;

class PubkeyMapperSpec extends ObjectBehavior
{
    private $jsonString = '{
        "key": "supper-key"
    }';

    function it_is_initializable()
    {
        $this->shouldHaveType(PubkeyMapper::class);
    }

    function it_to_array() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(Pubkey::class);
        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn([
            'key' => 'supper-key'
        ]);
    }
}
