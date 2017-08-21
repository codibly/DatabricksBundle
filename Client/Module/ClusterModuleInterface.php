<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\DTO\Cluster;

interface ClusterModuleInterface extends ModuleInterface
{
    const ENDPOINT_CREATE = '/clusters/create';
    const ENDPOINT_START = '/clusters/start';
    const ENDPOINT_RESTART = '/clusters/restart';
    const ENDPOINT_RESIZE = '/clusters/resize';
    const ENDPOINT_DELETE = '/clusters/delete';
    const ENDPOINT_GET = '/clusters/get';
    const ENDPOINT_LIST = '/clusters/list';
    const ENDPOINT_LIST_ZONES = '/clusters/list-zones';
    const ENDPOINT_LIST_NODE_TYPES = '/clusters/list-node-types';
    const ENDPOINT_SPARK_VERSIONS = '/clusters/spark-versions';

    public function create(Cluster $cluster);

    public function start(string $clusterId);

    public function restart(string $clusterId);

    public function resize(string $clusterId, int $workersNumber);

    public function delete(string $clusterId);

    public function get(string $clusterId);

    public function list();

    public function listZones();

    public function listNodeTypes();

    public function sparkVersions();
}
