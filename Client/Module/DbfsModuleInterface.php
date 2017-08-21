<?php

namespace Codibly\DatabricksBundle\Client\Module;

interface DbfsModuleInterface
{
    public function addBlock(array $params = []);

    public function close(array $params = []);

    public function create(array $params = []);

    public function delete(array $params = []);

    public function getStatus(array $params = []);

    public function list(array $params = []);

    public function mkDirs(array $params = []);

    public function move(array $params = []);

    public function put(array $params = []);

    public function read(array $params = []);
}
