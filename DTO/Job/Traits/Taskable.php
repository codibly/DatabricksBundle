<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 01.09.2017
 * Time: 16:20
 */

namespace Codibly\DatabricksBundle\DTO\Job\Traits;


use Codibly\DatabricksBundle\DTO\Job\NotebookTask;
use Codibly\DatabricksBundle\DTO\Job\SparkJarTask;
use Codibly\DatabricksBundle\DTO\Job\SparkPythonTask;
use Codibly\DatabricksBundle\DTO\Job\SparkSubmitTask;

trait Taskable
{
    /**
     * @var NotebookTask
     */
    protected $notebookTask;

    /**
     * @var SparkJarTask
     */
    protected $sparkJarTask;

    /**
     * @var SparkPythonTask
     */
    protected $sparkPythonTask;

    /**
     * @var SparkSubmitTask
     */
    protected $sparkSubmitTask;

}
