<?php

namespace spec\VldmrK\MonoAcquiring\Query\Invoice;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Query\Invoice\BasketOrder;
use VldmrK\MonoAcquiring\Query\QueryInterface;

class BasketOrderSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith('Product #1', 10, 1000, "http://example.com/product-1.jpg", "г.");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BasketOrder::class);
        $this->shouldBeAnInstanceOf(QueryInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([
            'name' => "Product #1",
            'qty' => 10,
            'sum' => 1000,
            'icon' => 'http://example.com/product-1.jpg',
            'unit' => 'г.'
        ]);
    }
}
