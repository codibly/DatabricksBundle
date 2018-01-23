<?php

namespace Codibly\DatabricksBundle\DTO;

class Autoscale extends GenericDTO
{
    /**
     * @var int
     */
    protected $minWorkers;

    /**
     * @var int
     */
    protected $maxWorkers;

    /**
     * Autoscale constructor.
     * @param int $minWorkers
     * @param int $maxWorkers
     */
    public function __construct(int $minWorkers, int $maxWorkers)
    {
        $this->minWorkers = $minWorkers;
        $this->maxWorkers = $maxWorkers;
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $autoscale = new Autoscale(1, 2);

        return $autoscale;
    }

    /**
     * @return int
     */
    public function getMinWorkers(): int
    {
        return $this->minWorkers;
    }

    /**
     * @return int
     */
    public function getMaxWorkers(): int
    {
        return $this->maxWorkers;
    }
}
