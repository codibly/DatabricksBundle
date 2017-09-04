<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class SparkSubmitTask extends GenericDTO
{
    /**
     * @var string[]
     */
    protected $baseParameters;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
