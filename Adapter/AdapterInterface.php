<?php

namespace Codibly\DatabricksBundle\Adapter;

interface AdapterInterface
{
    public function __construct(string $username, string $password, string $host);

    public function makeRequest(string $method, string $endpoint, array $params = []);
}
