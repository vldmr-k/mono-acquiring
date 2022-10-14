<?php

namespace VldmrK\MonoAcquiring\Model;

class Pubkey implements ModelInterface
{
    /**
     * @var string
     */
    public string $key;

    /**
     * Pubkey constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return array|string[]
     */
    public function toArray(): array
    {
        return [
            'key' => $this->key,
        ];
    }
}
