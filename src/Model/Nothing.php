<?php

namespace VldmrK\MonoAcquiring\Model;

/**
 * Class Nothing
 * @package VldmrK\MonoAcquiring\Model
 */
class Nothing implements ModelInterface
{
    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [];
    }
}
