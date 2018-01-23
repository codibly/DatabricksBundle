<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\Adapter\AdapterInterface;
use Codibly\DatabricksBundle\Client\ClientInterface;
use Codibly\DatabricksBundle\Client\Exception\ValidationException;
use Codibly\DatabricksBundle\Client\Traits\Loggable;
use Codibly\DatabricksBundle\DTO\DTOInterface;
use Psr\Log\LoggerInterface;

abstract class GenericModule implements ModuleInterface
{
    use Loggable;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * GenericModule constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->logger = $client->getLogger();
    }

    public function makePostDTORequest(string $endpoint, DTOInterface $dto)
    {
        $this->info(
            sprintf(
                'Preparing request to the %s endpoint with data: %s',
                $endpoint,
                json_encode($dto->getParams())
            )
        );

        $errors = $this->client->validate($dto);

        if (count($errors)) {
            $this->info(
                sprintf(
                    'There was errors during request to the %s endpoint. Error list: %s',
                    $endpoint,
                    json_encode($errors)
                )
            );

            throw new ValidationException($errors);
        }

        return $this->client->getAdapter()->makeRequest(
            Request::METHOD_POST,
            $endpoint,
            $dto->getParams()
        );
    }
}
