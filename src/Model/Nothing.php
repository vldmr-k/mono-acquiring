<?php

namespace VldmrK\MonoAcquiring\Model;

class Nothing implements ModelInterface {

    public function toArray(): array
    {
        return [];
    }
}
