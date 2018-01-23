<?php

namespace Codibly\DatabricksBundle\DTO;

class SparkEnvPair extends GenericDTO
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $value;

    /**
     * SparkEnvPair constructor.
     * @param string $key
     * @param string $value
     */
    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $sparkEnvPair = new SparkEnvPair($rawAPIResponse['key'], $rawAPIResponse['value']);

        return $sparkEnvPair;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
