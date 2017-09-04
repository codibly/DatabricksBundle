<?php

namespace Codibly\DatabricksBundle\Client\Traits;

use Psr\Log\LoggerInterface;

/**
 * Trait Loggable
 * @package Codibly\DatabricksBundle\Client\Traits
 * @property LoggerInterface $logger
 */
trait Loggable
{
    protected function info(string $message): void {
        if(is_null($this->logger)) {
            return;
        }

        $this->logger->info($message.' In '.__DIR__.'/'.__FILE__);
    }

    protected function error(string $message): void {
        if(is_null($this->logger)) {
            return;
        }

        $this->logger->error($message.' In '.__DIR__.'/'.__FILE__);
    }
}
