<?php

namespace Codibly\DatabricksBundle\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ClusterTag extends GenericDTO
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="1", max="127")
     */
    protected $key;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="1", max="255")
     */
    protected $value;

    /**
     * ClusterTag constructor.
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
        $clusterTag = new ClusterTag($rawAPIResponse['key'], $rawAPIResponse['value']);

        return $clusterTag;
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
