<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;
use Codibly\DatabricksBundle\DTO\Job\Traits\Clusterable;
use Codibly\DatabricksBundle\DTO\Job\Traits\Taskable;
use Codibly\DatabricksBundle\DTO\Library;

class JobSettings extends GenericDTO
{
    use Clusterable;
    use Taskable;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Library[]
     */
    protected $libraries;

    /**
     * @var JobEmailNotifications
     */
    protected $emailNotifications;

    /**
     * @var int
     */
    protected $timeoutSeconds;

    /**
     * @var int
     */
    protected $maxRetries;

    /**
     * @var int
     */
    protected $minRetryIntervalMillis;

    /**
     * @var bool
     */
    protected $retryOnTimeout;

    /**
     * @var CronSchedule
     */
    protected $schedule;

    /**
     * @var int
     */
    protected $maxConcurrentRuns;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
