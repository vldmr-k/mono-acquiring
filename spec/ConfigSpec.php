<?php

namespace spec\VldmrK\MonoAcquiring;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Config;

class ConfigSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('xToken', 150, 'https://api.monobank.ua/dev');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Config::class);
    }

    public function it_correct_setters() {

        $this->xToken->shouldReturn("xToken");
        $this->connectionTimeout->shouldReturn(150);
        $this->baseUri->shouldReturn("https://api.monobank.ua/dev");
    }
}
