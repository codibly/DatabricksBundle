<?php

namespace Codibly\DatabricksBundle\DTO;

class SparkNode extends GenericDTO
{
    /**
     * @var string
     */
    protected $privateIp;

    /**
     * @var string
     */
    protected $publicDns;

    /**
     * @var string
     */
    protected $nodeId;

    /**
     * @var string
     */
    protected $instanceId;

    /**
     * @var string
     */
    protected $startTimestamp;

    /**
     * @var SparkNodeAwsAttributes
     */
    protected $nodeAwsAttributes;

    /**
     * @var string
     */
    protected $hostPrivateIp;

    /**
     * @param array $rawAPIResponse
     * @return SparkNode
     */
    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $node = new SparkNode();

        $node
            ->setPublicDns($rawAPIResponse['public_dns'])
            ->setNodeId($rawAPIResponse['node_id'])
            ->setNodeAwsAttributes(SparkNodeAwsAttributes::hydrate($rawAPIResponse['node_aws_attributes']))
            ->setInstanceId($rawAPIResponse['instance_id'])
            ->setStartTimestamp($rawAPIResponse['start_timestamp'])
            ->setHostPrivateIp($rawAPIResponse['host_private_ip'])
            ->setPrivateIp($rawAPIResponse['private_ip']);

        return $node;
    }

    /**
     * @return string
     */
    public function getPrivateIp(): string
    {
        return $this->privateIp;
    }

    /**
     * @param string $privateIp
     * @return SparkNode
     */
    public function setPrivateIp(string $privateIp): SparkNode
    {
        $this->privateIp = $privateIp;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicDns(): string
    {
        return $this->publicDns;
    }

    /**
     * @param string $publicDns
     * @return SparkNode
     */
    public function setPublicDns(string $publicDns): SparkNode
    {
        $this->publicDns = $publicDns;

        return $this;
    }

    /**
     * @return string
     */
    public function getNodeId(): string
    {
        return $this->nodeId;
    }

    /**
     * @param string $nodeId
     * @return SparkNode
     */
    public function setNodeId(string $nodeId): SparkNode
    {
        $this->nodeId = $nodeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstanceId(): string
    {
        return $this->instanceId;
    }

    /**
     * @param string $instanceId
     * @return SparkNode
     */
    public function setInstanceId(string $instanceId): SparkNode
    {
        $this->instanceId = $instanceId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartTimestamp(): string
    {
        return $this->startTimestamp;
    }

    /**
     * @param string $startTimestamp
     * @return SparkNode
     */
    public function setStartTimestamp(string $startTimestamp): SparkNode
    {
        $this->startTimestamp = $startTimestamp;

        return $this;
    }

    /**
     * @return SparkNodeAwsAttributes
     */
    public function getNodeAwsAttributes(): SparkNodeAwsAttributes
    {
        return $this->nodeAwsAttributes;
    }

    /**
     * @param SparkNodeAwsAttributes $nodeAwsAttributes
     * @return SparkNode
     */
    public function setNodeAwsAttributes(SparkNodeAwsAttributes $nodeAwsAttributes): SparkNode
    {
        $this->nodeAwsAttributes = $nodeAwsAttributes;

        return $this;
    }

    /**
     * @return string
     */
    public function getHostPrivateIp(): string
    {
        return $this->hostPrivateIp;
    }

    /**
     * @param string $hostPrivateIp
     * @return SparkNode
     */
    public function setHostPrivateIp(string $hostPrivateIp): SparkNode
    {
        $this->hostPrivateIp = $hostPrivateIp;

        return $this;
    }
}
