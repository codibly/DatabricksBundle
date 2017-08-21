<?php

namespace Codibly\DatabricksBundle\DTO;

class AwsAttributes extends GenericDTO
{
    /**
     * @var int
     */
    protected $firstOnDemand;

    /**
     * @var AwsAvailability
     */
    protected $availability;

    /**
     * @var string
     */
    protected $zoneId;

    /**
     * @var string
     */
    protected $instanceProfileArn;

    /**
     * @var int
     */
    protected $spotBidPricePercent;

    /**
     * @var EbsVolumeType
     */
    protected $ebsVolumeType;

    /**
     * @var int
     */
    protected $ebsVolumeCount;

    /**
     * @var int
     */
    protected $ebsVolumeSize;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $awsAttributes = new AwsAttributes();

        return $awsAttributes;
    }

    /**
     * @return int
     */
    public function getFirstOnDemand(): int
    {
        return $this->firstOnDemand;
    }

    /**
     * @param int $firstOnDemand
     * @return AwsAttributes
     */
    public function setFirstOnDemand(int $firstOnDemand): AwsAttributes
    {
        $this->firstOnDemand = $firstOnDemand;

        return $this;
    }

    /**
     * @return AwsAvailability
     */
    public function getAvailability(): AwsAvailability
    {
        return $this->availability;
    }

    /**
     * @param AwsAvailability $availability
     * @return AwsAttributes
     */
    public function setAvailability(AwsAvailability $availability): AwsAttributes
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * @return string
     */
    public function getZoneId(): string
    {
        return $this->zoneId;
    }

    /**
     * @param string $zoneId
     * @return AwsAttributes
     */
    public function setZoneId(string $zoneId): AwsAttributes
    {
        $this->zoneId = $zoneId;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstanceProfileArn(): string
    {
        return $this->instanceProfileArn;
    }

    /**
     * @param string $instanceProfileArn
     * @return AwsAttributes
     */
    public function setInstanceProfileArn(string $instanceProfileArn): AwsAttributes
    {
        $this->instanceProfileArn = $instanceProfileArn;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpotBidPricePercent(): int
    {
        return $this->spotBidPricePercent;
    }

    /**
     * @param int $spotBidPricePercent
     * @return AwsAttributes
     */
    public function setSpotBidPricePercent(int $spotBidPricePercent): AwsAttributes
    {
        $this->spotBidPricePercent = $spotBidPricePercent;

        return $this;
    }

    /**
     * @return EbsVolumeType
     */
    public function getEbsVolumeType(): EbsVolumeType
    {
        return $this->ebsVolumeType;
    }

    /**
     * @param EbsVolumeType $ebsVolumeType
     * @return AwsAttributes
     */
    public function setEbsVolumeType(EbsVolumeType $ebsVolumeType): AwsAttributes
    {
        $this->ebsVolumeType = $ebsVolumeType;

        return $this;
    }

    /**
     * @return int
     */
    public function getEbsVolumeCount(): int
    {
        return $this->ebsVolumeCount;
    }

    /**
     * @param int $ebsVolumeCount
     * @return AwsAttributes
     */
    public function setEbsVolumeCount(int $ebsVolumeCount): AwsAttributes
    {
        $this->ebsVolumeCount = $ebsVolumeCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getEbsVolumeSize(): int
    {
        return $this->ebsVolumeSize;
    }

    /**
     * @param int $ebsVolumeSize
     * @return AwsAttributes
     */
    public function setEbsVolumeSize(int $ebsVolumeSize): AwsAttributes
    {
        $this->ebsVolumeSize = $ebsVolumeSize;

        return $this;
    }
}
