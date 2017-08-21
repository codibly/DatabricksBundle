<?php

namespace Codibly\DatabricksBundle\DTO;

class Cluster extends GenericDTO
{
    /**
     * @var string
     */
    protected $clusterId;

    /**
     * @var string
     */
    protected $clusterName;

    /**
     * @var int
     */
    protected $numWorkers;

    /**
     * @var Autoscale
     */
    protected $autoscale;

    /**
     * @var string
     */
    protected $sparkVersion;

    /**
     * @var SparkConfPair[]
     */
    protected $sparkConf;

    /**
     * @var AwsAttributes
     */
    protected $awsAttributes;

    /**
     * @var string
     */
    protected $nodeTypeId;

    /**
     * @var string
     */
    protected $driverNoeTypeId;

    /**
     * @var string[]
     */
    protected $sshPublicKey;

    /**
     * @var ClusterTag[]
     */
    protected $customTags;

    /**
     * @var ClusterLogConf
     */
    protected $clusterLogConf;

    /**
     * @var SparkEnvPair[]
     */
    protected $sparkEnvVars;

    /**
     * @var int
     */
    protected $autoterminationMinutes;

    /**
     * @var bool
     */
    protected $enableElasticDisk;

    public function __construct()
    {
        $this->sparkConf = [];
        $this->sshPublicKey = [];
        $this->customTags = [];
        $this->sparkEnvVars = [];
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $cluster = new Cluster();

        $cluster->setClusterId($rawAPIResponse['cluster_id']);

        return $cluster;
    }

    /**
     * @return string
     */
    public function getClusterId(): string
    {
        return $this->clusterId;
    }

    /**
     * @param string $clusterId
     * @return Cluster
     */
    public function setClusterId(string $clusterId): Cluster
    {
        $this->clusterId = $clusterId;

        return $this;
    }

    /**
     * @return string
     */
    public function getClusterName(): string
    {
        return $this->clusterName;
    }

    /**
     * @param string $clusterName
     * @return Cluster
     */
    public function setClusterName(string $clusterName): Cluster
    {
        $this->clusterName = $clusterName;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumWorkers(): int
    {
        return $this->numWorkers;
    }

    /**
     * @param int $numWorkers
     * @return Cluster
     */
    public function setNumWorkers(int $numWorkers): Cluster
    {
        $this->numWorkers = $numWorkers;

        return $this;
    }

    /**
     * @return Autoscale
     */
    public function getAutoscale(): Autoscale
    {
        return $this->autoscale;
    }

    /**
     * @param Autoscale $autoscale
     * @return Cluster
     */
    public function setAutoscale(Autoscale $autoscale): Cluster
    {
        $this->autoscale = $autoscale;

        return $this;
    }

    /**
     * @return string
     */
    public function getSparkVersion(): string
    {
        return $this->sparkVersion;
    }

    /**
     * @param string $sparkVersion
     * @return Cluster
     */
    public function setSparkVersion(string $sparkVersion): Cluster
    {
        $this->sparkVersion = $sparkVersion;

        return $this;
    }

    /**
     * @return SparkConfPair[]
     */
    public function getSparkConf(): array
    {
        return $this->sparkConf;
    }

    /**
     * @param SparkConfPair[] $sparkConf
     * @return Cluster
     */
    public function setSparkConf(array $sparkConf): Cluster
    {
        $this->sparkConf = $sparkConf;

        return $this;
    }

    public function addSparkConfPair(SparkConfPair $sparkConfPair): Cluster
    {
        $this->sparkConf[] = $sparkConfPair;

        return $this;
    }

    /**
     * @return AwsAttributes
     */
    public function getAwsAttributes(): AwsAttributes
    {
        return $this->awsAttributes;
    }

    /**
     * @param AwsAttributes $awsAttributes
     * @return Cluster
     */
    public function setAwsAttributes(AwsAttributes $awsAttributes): Cluster
    {
        $this->awsAttributes = $awsAttributes;

        return $this;
    }

    /**
     * @return string
     */
    public function getNodeTypeId(): string
    {
        return $this->nodeTypeId;
    }

    /**
     * @param string $nodeTypeId
     * @return Cluster
     */
    public function setNodeTypeId(string $nodeTypeId): Cluster
    {
        $this->nodeTypeId = $nodeTypeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDriverNoeTypeId(): string
    {
        return $this->driverNoeTypeId;
    }

    /**
     * @param string $driverNoeTypeId
     * @return Cluster
     */
    public function setDriverNoeTypeId(string $driverNoeTypeId): Cluster
    {
        $this->driverNoeTypeId = $driverNoeTypeId;

        return $this;
    }

    /**
     * @return \string[]
     */
    public function getSshPublicKey(): array
    {
        return $this->sshPublicKey;
    }

    /**
     * @param \string[] $sshPublicKey
     * @return Cluster
     */
    public function setSshPublicKey(array $sshPublicKey): Cluster
    {
        $this->sshPublicKey = $sshPublicKey;

        return $this;
    }

    /**
     * @return ClusterTag[]
     */
    public function getCustomTags(): array
    {
        return $this->customTags;
    }

    /**
     * @param ClusterTag[] $customTags
     * @return Cluster
     */
    public function setCustomTags(array $customTags): Cluster
    {
        $this->customTags = $customTags;

        return $this;
    }

    /**
     * @return ClusterLogConf
     */
    public function getClusterLogConf(): ClusterLogConf
    {
        return $this->clusterLogConf;
    }

    /**
     * @param ClusterLogConf $clusterLogConf
     * @return Cluster
     */
    public function setClusterLogConf(ClusterLogConf $clusterLogConf): Cluster
    {
        $this->clusterLogConf = $clusterLogConf;

        return $this;
    }

    /**
     * @return SparkEnvPair[]
     */
    public function getSparkEnvVars(): array
    {
        return $this->sparkEnvVars;
    }

    /**
     * @param SparkEnvPair[] $sparkEnvVars
     * @return Cluster
     */
    public function setSparkEnvVars(array $sparkEnvVars): Cluster
    {
        $this->sparkEnvVars = $sparkEnvVars;

        return $this;
    }

    /**
     * @return int
     */
    public function getAutoterminationMinutes(): int
    {
        return $this->autoterminationMinutes;
    }

    /**
     * @param int $autoterminationMinutes
     * @return Cluster
     */
    public function setAutoterminationMinutes(int $autoterminationMinutes): Cluster
    {
        $this->autoterminationMinutes = $autoterminationMinutes;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnableElasticDisk(): bool
    {
        return $this->enableElasticDisk;
    }

    /**
     * @param bool $enableElasticDisk
     * @return Cluster
     */
    public function setEnableElasticDisk(bool $enableElasticDisk): Cluster
    {
        $this->enableElasticDisk = $enableElasticDisk;

        return $this;
    }
}
