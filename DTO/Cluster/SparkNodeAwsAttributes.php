<?php

namespace Codibly\DatabricksBundle\DTO;

class SparkNodeAwsAttributes extends GenericDTO
{
    /**
     * @var bool
     */
    protected $isSpot;

    public function __construct(bool $isSpot)
    {
        $this->isSpot = $isSpot;
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        return new SparkNodeAwsAttributes((bool) $rawAPIResponse['is_spot']);
    }

    public function getIsSpot(): bool
    {
        return $this->isSpot;
    }
}
