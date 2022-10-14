<?php

namespace spec\VldmrK\MonoAcquiring\Model;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Model\Details;
use VldmrK\MonoAcquiring\Model\ModelInterface;

class DetailsSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith("test-merchant", "test-description");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Details::class);
        $this->shouldImplement(ModelInterface::class);
    }

    public function it_to_array() {
        $this->toArray()->shouldReturn([
            'merchantId' => "test-merchant",
            "merchantName" => "test-description"
        ]);
    }

}
