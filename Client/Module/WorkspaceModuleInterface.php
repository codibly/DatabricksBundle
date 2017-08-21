<?php

namespace Codibly\DatabricksBundle\Client\Module;

interface WorkspaceModuleInterface
{
    public function delete(array $params = []);

    public function export(array $params = []);

    public function getStatus(array $params = []);

    public function import(array $params = []);

    public function list(array $params = []);

    public function mkDirs(array $params = []);
}
