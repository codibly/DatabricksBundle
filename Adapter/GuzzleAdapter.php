<?php

namespace Codibly\DatabricksBundle\Adapter;

use Codibly\DatabricksBundle\Client\Exception\BadResponseException;
use Codibly\DatabricksBundle\Client\Traits\Loggable;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuzzleAdapter implements AdapterInterface
{
    use Loggable;

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
     * @var LoggerInterface
     */
    private $logger;

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

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
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
     * @return array
     * @throws BadResponseException
     */
    public function makeRequest(string $method, string $endpoint, array $params = []): array
    {
        try {
            $this->info(
                sprintf(
                    'Sending request %s to endpoint %s with params %s',
                    $method,
                    $endpoint,
                    json_encode($params)
                )
            );

            if(!empty($params)) {
                $params = ['json' => $params];
            }

            $response = $this->client->request($method, $endpoint, $params);
            $content = json_decode($response->getBody()->getContents(), true);

            $this->info(
                sprintf(
                    'Received response from %s endpoint with status code %s and content: %s',
                    $endpoint,
                    $response->getStatusCode(),
                    json_encode($content)
                )
            );

            return $content;
        } catch (ClientErrorResponseException $e) {
            $this->error(
                sprintf(
                    'There was error during request to %s endpoint with status code %s and content: %s',
                    $endpoint,
                    $e->getResponse()->getStatusCode(),
                    json_encode((string) $e->getResponse()->getBody())
                )
            );

            throw new BadResponseException($e->getResponse(), $e);
        }
    }
}
