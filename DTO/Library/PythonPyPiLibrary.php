<?php

namespace Codibly\DatabricksBundle\DTO\Library;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class PythonPyPiLibrary extends GenericDTO
{
    /**
     * @var string
     */
    protected $package;

    /**
     * @var string
     */
    protected $repo;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }

}
