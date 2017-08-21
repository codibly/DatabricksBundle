<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\Adapter\AdapterInterface;
use Codibly\DatabricksBundle\Client\ClientInterface;
use Codibly\DatabricksBundle\DTO\DTOInterface;

abstract class GenericModule implements ModuleInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * GenericModule constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function makePostDTORequest(string $endpoint, DTOInterface $dto)
    {
        $errors = $this->client->validate($dto);

        if(count($errors)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Data provided for the request to %s are incorrect. Error details: %s',
                    $endpoint,
                    json_encode($errors)
                )
            );
        }

        return $this->client->getAdapter()->makeRequest(
            Request::METHOD_POST,
            $endpoint,
            $dto->getParams()
        );
    }
}
