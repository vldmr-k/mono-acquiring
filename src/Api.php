<?php

namespace VldmrK\MonoAcquiring;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceCreate;
use VldmrK\MonoAcquiring\Model\ModelInterface;
use VldmrK\MonoAcquiring\Query\Invoice\CreateQuery;
use VldmrK\MonoAcquiring\Query\QueryInterface;
use VldmrK\MonoAcquiring\Query\ResourceInterface;

/**
 * Class Api
 * @package VldmrK\MonoAcquiring
 *
 * @method InvoiceCreate invoiceCreate(CreateQuery $query)
 */
class Api {

    /**
     * Request options.
     * @var Config
     */
    private $config;

    /** @var Client */
    private $client;


    /**
     * MonoAcquiring constructor.
     * @param string $xToken
     * @param string $publicKey
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param QueryInterface $query
     * @throws ErrorResponseException|\Exception
     */
    public function execute(string $url, string $method, array $query, MapperInterface $mapper, array $options = []) : ModelInterface {
        $defaultOptions = [];

        if($method === 'GET') {
            $defaultOptions['query'] = $query;
        } else {
            $defaultOptions['json'] = $query;
        }

        try {

            $response = $this->getClient()->request($method, $url, array_merge($defaultOptions, $options));
            return $mapper->jsonToObject($response->getBody()->getContents());

        } catch (BadResponseException $e) {
            throw new ErrorResponseException($e->getResponse(), $e->getRequest());
        }
    }


    /**
     * @param string $name
     * @param QueryInterface $query
     * @param array $options
     * @return ModelInterface
     * @throws ErrorResponseException|\Exception
     */
    public function call(ResourceInterface $query, array $options = []): ModelInterface {

        return $this->execute(
            $query->url(),
            $query->httpMethod(),
            $query->toArray(),
            $query->mapper(),
            $options);
    }


    /**
     * @param Client $client
     */
    public function setClient(Client $client): void  {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client {
        if($this->client) {
            return $this->client;
        }

        if(strlen($this->config->xToken) <= 0) {
            throw new \Exception("Please set X-Token");
        }

        return $this->client = new Client([
            'base_uri' => $this->config->baseUri,
            'connect_timeout' => $this->config->connectionTimeout,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Token' => $this->config->xToken
            ]
        ]);
    }

}
