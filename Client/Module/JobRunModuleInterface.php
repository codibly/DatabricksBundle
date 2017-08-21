<?php

namespace Codibly\DatabricksBundle\Client\Module;

interface JobRunModuleInterface
{
    public function now(array $params = []);

    public function submit(array $params = []);

    public function list(array $params = []);

    public function get(array $params = []);

    public function cancel(array $params = []);
}
