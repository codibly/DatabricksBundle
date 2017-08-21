<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\Client\ClientInterface;

interface ModuleInterface
{
    public function __construct(ClientInterface $client);
}
