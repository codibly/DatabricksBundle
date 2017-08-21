<?php

namespace Codibly\DatabricksBundle\DTO;

interface DTOInterface
{
    public function getParams(): array;

    public static function hydrate(array $rawAPIResponse): DTOInterface;
}
