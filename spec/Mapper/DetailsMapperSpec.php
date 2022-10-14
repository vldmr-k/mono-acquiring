<?php

namespace spec\VldmrK\MonoAcquiring\Mapper;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\DetailsMapper;
use VldmrK\MonoAcquiring\Model\Details;

class DetailsMapperSpec extends ObjectBehavior
{

    private $jsonString = '{
      "merchantId": "12o4Vv7EWy",
      "merchantName": "Your Favourite Company"
    }';


    function it_is_initializable()
    {
        $this->shouldHaveType(DetailsMapper::class);
    }

    function it_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(Details::class);

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn([
            'merchantId' => '12o4Vv7EWy',
            'merchantName' => 'Your Favourite Company'
        ]);
    }
}
