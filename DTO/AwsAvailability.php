<?php

namespace Codibly\DatabricksBundle\DTO;

class AwsAvailability extends GenericDTO implements ScalarDTOInterface
{
    const ON_DEMAND = 'ON_DEMAND';
    const SPOT_WITH_FALLBACK = 'SPOT';

    protected $spot;

    public function __construct(string $spot)
    {
        if (!in_array($spot, [self::ON_DEMAND, self::SPOT_WITH_FALLBACK])) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Spot %s is not valid spot type, sue %s or %s',
                    (string)$spot,
                    self::ON_DEMAND,
                    self::SPOT_WITH_FALLBACK
                )
            );
        }

        $this->spot = $spot;
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $awsAvailability = new AwsAvailability(AwsAvailability::SPOT_WITH_FALLBACK);

        return $awsAvailability;
    }
}
