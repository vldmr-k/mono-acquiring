<?php

namespace spec\VldmrK\MonoAcquiring\Query;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\PubkeyMapper;
use VldmrK\MonoAcquiring\Query\PubkeyQuery;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

class PubkeyQuerySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PubkeyQuery::class);
        $this->shouldBeAnInstanceOf(ResourceInterface::class);
    }

    function it_to_array() {
        $this->toArray()->shouldReturn([]);
    }

    public function it_url() {
        $this->url()->shouldReturn("/api/merchant/pubkey");
    }

    public function it_http_method() {
        $this->httpMethod()->shouldReturn("GET");
    }

    public function it_mapper() {
        $this->mapper()->shouldBeAnInstanceOf(PubkeyMapper::class);
    }
}
