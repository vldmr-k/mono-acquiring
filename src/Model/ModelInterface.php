<?php

namespace VldmrK\MonoAcquiring\Model;

interface ModelInterface
{
    /**
     * @return array<string, string|null|int|array>
     */
    public function toArray(): array;
}
