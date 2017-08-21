<?php

namespace Codibly\DatabricksBundle\Client\Module;

interface JobModuleInterface
{
    public function create(array $params = []);

    public function list(array $params = []);

    public function delete(array $params = []);

    public function get(array $params = []);

    public function reset(array $params = []);

    public function run(array $params = []);
}
