<?php

namespace Codibly\DatabricksBundle\DTO;

class SparkConfPair extends KeyValueDTO
{
    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $sparkConfPair = new SparkConfPair($rawAPIResponse['key'], $rawAPIResponse['value']);

        return $sparkConfPair;
    }
}
