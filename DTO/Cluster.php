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
     * @var string
     */
    protected $creatorUserName;

    /**
     * @var int
     */
    protected $numWorkers;

    /**
     * @var Autoscale
     */
    protected $autoscale;

    /**
     * @var SparkNode
     */
    protected $driver;

    /**
     * @var SparkNode[]
     */
    protected $executors;

    /**
     * @var int
     */
    protected $jdbcPort;

    /**
     * @var string
     */
    protected $sparkVersion;

    /**
     * @var SparkConfPair[]
     */
    protected $sparkConf;

    /**
     * @var string
     */
    protected $sparkContextId;

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

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $stateMessage;

    /**
     * @var int
     */
    protected $startTime;

    /**
     * @var int
     */
    protected $terminatedTime;

    /**
     * @var int
     */
    protected $lastStateLossTime;

    /**
     * @var int
     */
    protected $lastActivityTime;

    /**
     * @var int
     */
    protected $clusterMemoryMb;

    /**
     * @var float
     */
    protected $clusterCores;

    /**
     * @var ClusterTag[]
     */
    protected $defaultTags;

    /**
     * @var LogSyncStatus
     */
    protected $clusterLogStatus;

    /**
     * @var TerminationReason
     */
    protected $terminationReason;

    public function __construct()
    {
        $this->sparkConf = [];
        $this->sshPublicKey = [];
        $this->customTags = [];
        $this->sparkEnvVars = [];
        $this->executors = [];
        $this->defaultTags = [];
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $cluster = new Cluster();

        $defaultTags = [];
        if (isset($rawAPIResponse['default_tags'])) {
            foreach ($rawAPIResponse['default_tags'] as $key => $value) {
                $defaultTags[] = ClusterTag::hydrate(
                    [
                        'key' => $key,
                        'value' => $value,
                    ]
                );
            }
        }

        $cluster
            ->setClusterId($rawAPIResponse['cluster_id'])
            ->setSparkContextId($rawAPIResponse['cluster_id'])
            ->setClusterName($rawAPIResponse['cluster_name'])
            ->setSparkVersion($rawAPIResponse['spark_version'])
            ->setAwsAttributes(AwsAttributes::hydrate($rawAPIResponse['aws_attributes']))
            ->setNodeTypeId($rawAPIResponse['node_type_id'])
            ->setDriverNoeTypeId($rawAPIResponse['driver_node_type_id'])
            ->setAutoterminationMinutes($rawAPIResponse['autotermination_minutes'])
            ->setEnableElasticDisk($rawAPIResponse['enable_elastic_disk'])
            ->setCreatorUserName($rawAPIResponse['creator_user_name'])
            ->setState($rawAPIResponse['state'])
            ->setStateMessage($rawAPIResponse['state_message'])
            ->setStartTime($rawAPIResponse['start_time'])
            ->setTerminatedTime($rawAPIResponse['terminated_time'])
            ->setLastStateLossTime($rawAPIResponse['last_state_loss_time'])
            ->setLastActivityTime($rawAPIResponse['last_activity_time'])
            ->setNumWorkers($rawAPIResponse['num_workers'])
            ->setClusterMemoryMb($rawAPIResponse['cluster_memory_mb'])
            ->setClusterCores($rawAPIResponse['cluster_cores'])
            ->setDefaultTags($defaultTags);

        if(isset($rawAPIResponse['termination_reason'])) {
            $cluster
                ->setTerminationReason(TerminationReason::hydrate($rawAPIResponse['termination_reason']));
        }


        if (ClusterState::RUNNING === $cluster->getState()) {
            $cluster->setDriver(SparkNode::hydrate($rawAPIResponse['driver']));

            foreach ($rawAPIResponse['executors'] as $rawExecutor) {
                $cluster->addExecutor(SparkNode::hydrate($rawExecutor));
            }
        }

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

    /**
     * @return string
     */
    public function getCreatorUserName(): string
    {
        return $this->creatorUserName;
    }

    /**
     * @param string $creatorUserName
     * @return Cluster
     */
    public function setCreatorUserName(string $creatorUserName): Cluster
    {
        $this->creatorUserName = $creatorUserName;

        return $this;
    }

    /**
     * @return SparkNode
     */
    public function getDriver(): SparkNode
    {
        return $this->driver;
    }

    /**
     * @param SparkNode $driver
     * @return Cluster
     */
    public function setDriver(SparkNode $driver): Cluster
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * @return SparkNode[]
     */
    public function getExecutors(): array
    {
        return $this->executors;
    }

    /**
     * @param SparkNode[] $executors
     * @return Cluster
     */
    public function setExecutors(array $executors): Cluster
    {
        foreach ($this->executors as $executor) {
            $this->addExecutor($executor);
        }

        return $this;
    }

    /**
     * @param SparkNode $node
     * @return Cluster
     */
    public function addExecutor(SparkNode $node): Cluster
    {
        $this->executors[] = $node;

        return $this;
    }

    /**
     * @return int
     */
    public function getJdbcPort(): int
    {
        return $this->jdbcPort;
    }

    /**
     * @param int $jdbcPort
     * @return Cluster
     */
    public function setJdbcPort(int $jdbcPort): Cluster
    {
        $this->jdbcPort = $jdbcPort;

        return $this;
    }

    /**
     * @return string
     */
    public function getSparkContextId(): string
    {
        return $this->sparkContextId;
    }

    /**
     * @param string $sparkContextId
     * @return Cluster
     */
    public function setSparkContextId(string $sparkContextId): Cluster
    {
        $this->sparkContextId = $sparkContextId;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Cluster
     */
    public function setState(string $state): Cluster
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getStateMessage(): string
    {
        return $this->stateMessage;
    }

    /**
     * @param string $stateMessage
     * @return Cluster
     */
    public function setStateMessage(string $stateMessage): Cluster
    {
        $this->stateMessage = $stateMessage;

        return $this;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * @param int $startTime
     * @return Cluster
     */
    public function setStartTime(int $startTime): Cluster
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getTerminatedTime(): int
    {
        return $this->terminatedTime;
    }

    /**
     * @param int $terminatedTime
     * @return Cluster
     */
    public function setTerminatedTime(int $terminatedTime): Cluster
    {
        $this->terminatedTime = $terminatedTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getLastStateLossTime(): int
    {
        return $this->lastStateLossTime;
    }

    /**
     * @param int $lastStateLossTime
     * @return Cluster
     */
    public function setLastStateLossTime(int $lastStateLossTime): Cluster
    {
        $this->lastStateLossTime = $lastStateLossTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getLastActivityTime(): int
    {
        return $this->lastActivityTime;
    }

    /**
     * @param int $lastActivityTime
     * @return Cluster
     */
    public function setLastActivityTime(int $lastActivityTime): Cluster
    {
        $this->lastActivityTime = $lastActivityTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getClusterMemoryMb(): int
    {
        return $this->clusterMemoryMb;
    }

    /**
     * @param int $clusterMemoryMb
     * @return Cluster
     */
    public function setClusterMemoryMb(int $clusterMemoryMb): Cluster
    {
        $this->clusterMemoryMb = $clusterMemoryMb;

        return $this;
    }

    /**
     * @return float
     */
    public function getClusterCores(): float
    {
        return $this->clusterCores;
    }

    /**
     * @param float $clusterCores
     * @return Cluster
     */
    public function setClusterCores(float $clusterCores): Cluster
    {
        $this->clusterCores = $clusterCores;

        return $this;
    }

    /**
     * @return ClusterTag[]
     */
    public function getDefaultTags(): array
    {
        return $this->defaultTags;
    }

    /**
     * @param ClusterTag[] $defaultTags
     * @return Cluster
     */
    public function setDefaultTags(array $defaultTags): Cluster
    {
        $this->defaultTags = $defaultTags;

        return $this;
    }

    /**
     * @return LogSyncStatus
     */
    public function getClusterLogStatus(): LogSyncStatus
    {
        return $this->clusterLogStatus;
    }

    /**
     * @param LogSyncStatus $clusterLogStatus
     * @return Cluster
     */
    public function setClusterLogStatus(LogSyncStatus $clusterLogStatus): Cluster
    {
        $this->clusterLogStatus = $clusterLogStatus;

        return $this;
    }

    /**
     * @return TerminationReason
     */
    public function getTerminationReason(): TerminationReason
    {
        return $this->terminationReason;
    }

    /**
     * @param TerminationReason $terminationReason
     * @return Cluster
     */
    public function setTerminationReason(TerminationReason $terminationReason): Cluster
    {
        $this->terminationReason = $terminationReason;

        return $this;
    }
}
