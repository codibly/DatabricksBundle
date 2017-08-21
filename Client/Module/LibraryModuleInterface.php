<?php

namespace Codibly\DatabricksBundle\Client\Module;

interface LibraryModuleInterface
{
    public function allClusterStatuses(array $params = []);

    public function clusterStatus(array $params = []);

    public function install(array $params = []);

    public function uninstall(array $params = []);
}
