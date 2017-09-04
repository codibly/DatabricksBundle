<?php

namespace Codibly\DatabricksBundle\DTO;

class LogSyncStatus
{
    /**
     * @var int
     */
    protected $lastAttempted;

    /**
     * @var string
     */
    protected $lastException;

    public function __construct(int $lastAttempted, string $lastException)
    {
        $this->lastAttempted = $lastAttempted;
        $this->lastException = $lastException;
    }

    /**
     * @return int
     */
    public function getLastAttempted(): int
    {
        return $this->lastAttempted;
    }

    /**
     * @return string
     */
    public function getLastException(): string
    {
        return $this->lastException;
    }
}
