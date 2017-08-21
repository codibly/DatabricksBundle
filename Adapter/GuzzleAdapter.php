<?php

namespace Codibly\DatabricksBundle\Adapter;

use GuzzleHttp\Client;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuzzleAdapter implements AdapterInterface
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $host;

    /**
     * @var array
     */
    private $guzzleOptions = [
        'timeout' => 60,
    ];

    /**
     * @var Client
     */
    private $client;

    /**
     * GuzzleAdapter constructor.
     * @param string $username
     * @param string $password
     * @param string $host
     */
    public function __construct(string $username, string $password, string $host)
    {
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;

        $this->initializeClient();
    }

    private function initializeClient()
    {
        $this->client = new Client(
            array_merge(
                [
                    'base_uri' => $this->host,
                    'auth' => [
                        $this->username,
                        $this->password,
                    ],
                    'headers'  => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ],
                ],
                $this->guzzleOptions
            )
        );

    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function makeRequest(string $method, string $endpoint, array $params = [])
    {
        return $this->client->request($method, $endpoint, $params);
    }
}
