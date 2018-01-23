<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\DTO\Job;
use Codibly\DatabricksBundle\DTO\Job\JobSettings;

interface JobModuleInterface
{
    const ENDPOINT_CREATE = 'jobs/create';
    const ENDPOINT_LIST = 'jobs/list';
    const ENDPOINT_DELETE = 'jobs/delete';
    const ENDPOINT_GET = 'jobs/get';
    const ENDPOINT_RESET = 'jobs/reset';
    const ENDPOINT_RUN_NOW = 'jobs/run-now';

    public function create(JobSettings $jobSettings): Job;

    public function list(): array;

    public function delete(int $jobId): void;

    public function get(int $jobId): Job;

    public function reset(int $jobId, JobSettings $jobSettings): Job;

    public function run(int $jobId, array $jarParams = [], array $notebookParams = []);

    public function runAndSubmit(JobSettings $jobSettings);
}
