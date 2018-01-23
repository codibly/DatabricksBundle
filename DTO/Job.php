<?php

namespace Codibly\DatabricksBundle\DTO;

use Codibly\DatabricksBundle\DTO\Job\JobSettings;

class Job extends GenericDTO
{
    /**
     * @var string
     */
    protected $jobId;

    /**
     * @var string
     */
    protected $creatorUserName;

    /**
     * @var JobSettings
     */
    protected $settings;

    /**
     * @var int
     */
    protected $createdTime;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
    }
}
