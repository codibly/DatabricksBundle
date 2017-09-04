<?php

namespace Codibly\DatabricksBundle\DTO\Job\Run;

use Codibly\DatabricksBundle\DTO\Job\Traits\Clusterable;
use Codibly\DatabricksBundle\DTO\Job\Traits\Taskable;
use Codibly\DatabricksBundle\DTO\Library;

class Submit
{
    use Clusterable;
    use Taskable;

    /**
     * @var string
     */
    protected $runName;

    /**
     * @var Library[]
     */
    protected $libraries;

    /**
     * @var int
     */
    protected $timeoutSeconds;
}
