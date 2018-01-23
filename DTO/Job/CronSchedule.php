<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;

class CronSchedule extends GenericDTO
{
    /**
     * @var string
     */
    protected $quartzCronExpression;

    /**
     * @var string
     */
    protected $timezoneId;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
