<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class SparkPythonTask extends GenericDTO
{
    /**
     * @var string
     */
    protected $pythonFile;

    /**
     * @var string[]
     */
    protected $baseParameters;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
