<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 01.09.2017
 * Time: 16:20
 */

namespace Codibly\DatabricksBundle\DTO\Job\Traits;

use Codibly\DatabricksBundle\DTO\Job\NewCluster;

trait Clusterable
{
    /**
     * @var string
     */
    protected $existingClusterId;

    /**
     * @var NewCluster
     */
    protected $newCluster;

}
