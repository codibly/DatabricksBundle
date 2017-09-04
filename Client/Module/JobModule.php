<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\DTO\Job;
use Codibly\DatabricksBundle\DTO\Job\JobSettings;

class JobModule implements JobModuleInterface
{
    public function create(JobSettings $jobSettings): Job
    {

    }

    /**
     * @return array|Job[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    public function delete(int $jobId): void
    {
        // TODO: Implement delete() method.
    }

    public function get(int $jobId): Job
    {
        // TODO: Implement get() method.
    }

    public function reset(int $jobId, JobSettings $jobSettings): Job
    {
        // TODO: Implement reset() method.
    }

    public function run(int $jobId, array $jarParams = [], array $notebookParams = [])
    {
        // TODO: Implement run() method.
    }

    public function runAndSubmit(JobSettings $jobSettings)
    {

    }
}
