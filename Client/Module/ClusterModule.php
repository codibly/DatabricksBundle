<?php

namespace Codibly\DatabricksBundle\Client\Module;

use Codibly\DatabricksBundle\DTO\Cluster;
use Symfony\Component\HttpFoundation\Request;

class ClusterModule extends GenericModule implements ClusterModuleInterface
{
    public function create(Cluster $cluster)
    {
        return $this->makePostDTORequest(
            ClusterModuleInterface::ENDPOINT_CREATE,
            $cluster
        );
    }

    public function start(string $clusterId)
    {
        return $this->adapter->makeRequest(
            Request::METHOD_POST,
            ClusterModuleInterface::ENDPOINT_START,
            [
                'cluster_id' => $clusterId
            ]
        );
    }

    public function restart(string $clusterId)
    {
        return $this->adapter->makeRequest(
            Request::METHOD_POST,
            ClusterModuleInterface::ENDPOINT_RESTART,
            [
                'cluster_id' => $clusterId
            ]
        );
    }

    public function resize(string $clusterId, int $workersNumber)
    {
        return $this->adapter->makeRequest(
            Request::METHOD_POST,
            ClusterModuleInterface::ENDPOINT_RESIZE,
            [
                'cluster_id' => $clusterId,
                'num_workers' => $workersNumber
            ]
        );
    }

    public function delete(string $clusterId)
    {
        return $this->adapter->makeRequest(
            Request::METHOD_POST,
            ClusterModuleInterface::ENDPOINT_DELETE,
            [
                'cluster_id' => $clusterId
            ]
        );
    }

    public function get(string $clusterId)
    {
        return $this->adapter->makeRequest(
            Request::METHOD_GET,
            ClusterModuleInterface::ENDPOINT_GET,
            [
                'cluster_id' => $clusterId
            ]
        );
    }

    public function list()
    {
        return $this->adapter->makeRequest(
            Request::METHOD_GET,
            ClusterModuleInterface::ENDPOINT_LIST
        );
    }

    public function listZones()
    {
        return $this->adapter->makeRequest(
            Request::METHOD_GET,
            ClusterModuleInterface::ENDPOINT_LIST_ZONES
        );
    }

    public function listNodeTypes()
    {
        return $this->adapter->makeRequest(
            Request::METHOD_GET,
            ClusterModuleInterface::ENDPOINT_LIST_NODE_TYPES
        );
    }

    public function sparkVersions()
    {
        return $this->adapter->makeRequest(
            Request::METHOD_GET,
            ClusterModuleInterface::ENDPOINT_SPARK_VERSIONS
        );
    }
}
