<?php

namespace Codibly\DatabricksBundle\DTO;

class DbfsStorageInfo extends GenericDTO
{
    /**
     * @var string
     */
    protected $destination;

    public function __construct(string $destination)
    {
        $this->destination = $destination;
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $dbfsStorageInfo = new DbfsStorageInfo($rawAPIResponse['destination']);

        return $dbfsStorageInfo;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }
}
