<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\DTO\Job;
use Codibly\DatabricksBundle\DTO\Job\Run\Submit;
use Codibly\DatabricksBundle\DTO\Run;

interface JobRunModuleInterface
{
    public function now(int $jobId, array $jarParams = [], array $notebookParams = []): Run;

    public function submit(Submit $job): Job;

    /**
     * @param array $params
     * @return array|Run[]
     */
    public function list(array $params = []): array;

    public function get(int $runId): Run;

    public function cancel(int $runId): void;
}
