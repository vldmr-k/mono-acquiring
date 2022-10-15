<?php

namespace VldmrK\MonoAcquiring\Model;

class RawModel implements ModelInterface
{
    /** @var string|null  */
    public ?string $raw;

    /**
     * RawModel constructor.
     * @param string|null $raw
     */
    public function __construct(?string $raw)
    {
        $this->raw = $raw;
    }

    /**
     * @return array|null[]|string[]
     */
    public function toArray(): array
    {
        return [
            'raw' => $this->raw
        ];
    }
}
