<?php

namespace Codibly\DatabricksBundle\DTO;

class EbsVolumeType extends GenericDTO
{
    const THROUGHPUT_OPTIMIZED_HDD = 'THROUGHPUT_OPTIMIZED_HDD';

    protected $ebs;

    public function __construct(string $type)
    {
        if(!in_array($type, [self::THROUGHPUT_OPTIMIZED_HDD])) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Ebs type %s is not valid ebs type, sue %s',
                    (string) $type,
                    self::THROUGHPUT_OPTIMIZED_HDD
                )
            );
        }

        $this->ebs = $type;
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $ebsVolumeType = new EbsVolumeType($rawAPIResponse['ebs_volume_type']);

        return $ebsVolumeType;
    }
}
