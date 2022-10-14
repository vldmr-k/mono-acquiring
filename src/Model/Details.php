<?php

namespace VldmrK\MonoAcquiring\Model;

class Details implements ModelInterface
{
    /** @var string  */
    public string $merchantId;

    /** @var string  */
    public string $merchantName;

    /**
     * Details constructor.
     * @param string $merchantId
     * @param string $merchantName
     */
    public function __construct(string $merchantId, string $merchantName)
    {
        $this->merchantId = $merchantId;
        $this->merchantName = $merchantName;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'merchantId' => $this->merchantId,
            'merchantName' => $this->merchantName
        ];
    }
}
