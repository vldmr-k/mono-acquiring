<?php

namespace VldmrK\MonoAcquiring\Model;

class Pubkey implements ModelInterface {

    public string $key;

    /**
     * Pubkey constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function toArray(): array  {
        return [
            'key' => $this->key,
        ];
    }
}
