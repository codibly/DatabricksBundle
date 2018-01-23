<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class JobEmailNotifications extends GenericDTO
{
    /**
     * @var string
     */
    protected $onStart;

    /**
     * @var string
     */
    protected $onSuccess;

    /**
     * @var string
     */
    protected $onFailure;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
