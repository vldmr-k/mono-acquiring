<?php

namespace VldmrK\MonoAcquiring;

class Config {

    /** @var string  */
    public string $xToken;

    /** @var int  */
    public int $connectionTimeout;

    /** @var string  */
    public string $baseUri;

    /**
     * Config constructor.
     * @param string $token
     * @param int $connectionTimeout
     */
    public function __construct(string $xToken, int $connectionTimeout = 10, string $baseUri = 'https://api.monobank.ua/')
    {
        $this->xToken = $xToken;
        $this->connectionTimeout = $connectionTimeout;
        $this->baseUri = $baseUri;
    }
}
