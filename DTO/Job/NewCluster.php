<?php

namespace Codibly\DatabricksBundle\DTO\Job;

use Codibly\DatabricksBundle\DTO\Autoscale;
use Codibly\DatabricksBundle\DTO\AwsAttributes;
use Codibly\DatabricksBundle\DTO\ClusterLogConf;
use Codibly\DatabricksBundle\DTO\ClusterTag;
use Codibly\DatabricksBundle\DTO\DTOInterface;
use Codibly\DatabricksBundle\DTO\GenericDTO;
use Codibly\DatabricksBundle\DTO\SparkConfPair;
use Codibly\DatabricksBundle\DTO\SparkEnvPair;

class NewCluster extends GenericDTO
{
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

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        // TODO: Implement hydrate() method.
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
     * @return $this
     */
    public function setClusterName($clusterName)
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
     * @return $this
     */
    public function setNumWorkers($numWorkers)
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
     * @return $this
     */
    public function setAutoscale($autoscale)
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
     * @return $this
     */
    public function setSparkVersion($sparkVersion)
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
     * @return $this
     */
    public function setSparkConf($sparkConf)
    {
        $this->sparkConf = $sparkConf;

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
     * @return $this
     */
    public function setAwsAttributes($awsAttributes)
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
     * @return $this
     */
    public function setNodeTypeId($nodeTypeId)
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
     * @return $this
     */
    public function setDriverNoeTypeId($driverNoeTypeId)
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
     * @return $this
     */
    public function setSshPublicKey($sshPublicKey)
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
     * @return $this
     */
    public function setCustomTags($customTags)
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
     * @return $this
     */
    public function setClusterLogConf($clusterLogConf)
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
     * @return $this
     */
    public function setSparkEnvVars($sparkEnvVars)
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
     * @return $this
     */
    public function setAutoterminationMinutes($autoterminationMinutes)
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
     * @return $this
     */
    public function setEnableElasticDisk($enableElasticDisk)
    {
        $this->enableElasticDisk = $enableElasticDisk;

        return $this;
    }
}
