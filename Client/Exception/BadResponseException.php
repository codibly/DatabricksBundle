<?php

namespace Codibly\DatabricksBundle\Client\Exception;

use Guzzle\Http\Message\Response;

class BadResponseException extends \Exception
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response, \Throwable $previous = null, string $message = 'Invalid response from remote server')
    {
        $this->response = $response;

        parent::__construct($message, $response->getStatusCode(), $previous);
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}
