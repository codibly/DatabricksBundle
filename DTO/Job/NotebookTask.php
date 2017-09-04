<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class NotebookTask extends GenericDTO
{
    /**
     * @var string
     */
    protected $notebookPath;

    /**
     * @var ParamPair[]
     */
    protected $baseParameters;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
