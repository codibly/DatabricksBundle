<?php

namespace Codibly\DatabricksBundle\Client\Module;

interface InstanceProfileModuleInterface
{
    public function add(array $params = []);

    public function list(array $params = []);

    public function remove(array $params = []);
}
