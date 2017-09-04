<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class SparkJarTask extends GenericDTO
{
    /**
     * @var string
     */
    protected $jarUri;

    /**
     * @var string
     */
    protected $mainClassName;

    /**
     * @var string[]
     */
    protected $baseParameters;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
