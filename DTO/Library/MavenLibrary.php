<?php

namespace Codibly\DatabricksBundle\DTO\Library;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class MavenLibrary extends GenericDTO
{
    /**
     * @var string
     */
    protected $coordinates;

    /**
     * @var string
     */
    protected $repo;

    /**
     * @var string[]
     */
    protected $exclusions;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }

}
