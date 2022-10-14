<?php

namespace VldmrK\MonoAcquiring;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ErrorResponseException extends \Exception {

    private ResponseInterface $response;
    private RequestInterface $request;

    public function __construct(ResponseInterface $response, RequestInterface $request)
    {
        parent::__construct($response->getBody()->getContents(), $response->getStatusCode());
    }

    /**
     * @return RequestInterface|null
     */
    public function getRequest(): ?RequestInterface {
        return $this->request;
    }

    /**
     * @return ResponseInterface|null
     */
    public function getResponse(): ?ResponseInterface {
        return $this->response;
    }

}
