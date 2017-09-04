<?php

namespace Codibly\DatabricksBundle\DTO\Job;

class ParamPair
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $value;

    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
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
