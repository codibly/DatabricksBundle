<?php

namespace Codibly\DatabricksBundle\Client;

use Codibly\DatabricksBundle\Adapter\AdapterInterface;
use Codibly\DatabricksBundle\Client\Module\ClusterModuleInterface;
use Codibly\DatabricksBundle\Client\Module\DbfsModuleInterface;
use Codibly\DatabricksBundle\Client\Module\GroupsModuleInterface;
use Codibly\DatabricksBundle\Client\Module\InstanceProfileModuleInterface;
use Codibly\DatabricksBundle\Client\Module\JobModuleInterface;
use Codibly\DatabricksBundle\Client\Module\LibraryModuleInterface;
use Codibly\DatabricksBundle\Client\Module\WorkspaceModuleInterface;

interface ClientInterface
{
    public function __construct(AdapterInterface $adapter);

    /**
     * @return AdapterInterface
     */
    public function getAdapter(): AdapterInterface;

    public function cluster(): ClusterModuleInterface;

    public function dbfs(): DbfsModuleInterface;

    public function groups(): GroupsModuleInterface;

    public function instanceProfile(): InstanceProfileModuleInterface;

    public function job(): JobModuleInterface;

    public function library(): LibraryModuleInterface;

    public function workspace(): WorkspaceModuleInterface;
}
