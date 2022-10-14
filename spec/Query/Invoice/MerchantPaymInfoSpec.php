<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Query\Invoice\BasketOrder;
use VldmrK\MonoAcquiring\Query\Invoice\MerchantPaymInfo;
use VldmrK\MonoAcquiring\Query\QueryInterface;

class MerchantPaymInfoSpec extends ObjectBehavior
{

    function let() {
        $this->beConstructedWith("SO-125", "Payment for order SO-125");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(MerchantPaymInfo::class);
        $this->shouldBeAnInstanceOf(QueryInterface::class);
    }

    public function it_to_array(BasketOrder $basketOrder) {
        $basketOrder->beConstructedWith(["test-product", 100, 1000]);
        $basketOrder->implement(QueryInterface::class);
        $basketOrder->toArray()->shouldBeCalled();

        $this->addBasketOrder($basketOrder);

        $this->toArray()->shouldBeArray();
        $this->toArray()->shouldReturn([
            'reference' => "SO-125",
            'destination' => "Payment for order SO-125",
            'basketOrder' => [
                []
            ]
        ]);

    }
}
