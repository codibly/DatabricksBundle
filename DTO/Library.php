<?php

namespace Codibly\DatabricksBundle\DTO;

use Codibly\DatabricksBundle\DTO\Library\MavenLibrary;
use Codibly\DatabricksBundle\DTO\Library\PythonPyPiLibrary;

class Library extends GenericDTO
{
    /**
     * @var string
     */
    protected $jar;

    /**
     * @var string
     */
    protected $egg;

    /**
     * @var PythonPyPiLibrary
     */
    protected $pypi;

    /**
     * @var MavenLibrary
     */
    protected $maven;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
