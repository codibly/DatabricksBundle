<?php

namespace Codibly\DatabricksBundle\DTO;

class TerminationReason extends GenericDTO
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var ParameterPair[]
     */
    protected $parameters;

    public function __construct(string $code, array $parameters = [])
    {
        $this->code = $code;

        foreach ($parameters as $parameter) {
            $this->addParameter($parameter);
        }
    }

    /**
     * @param array $rawAPIResponse
     * @return TerminationReason
     */
    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $terminationReason = new TerminationReason($rawAPIResponse['code']);

        foreach ($rawAPIResponse['parameters'] as $key => $value) {
            $terminationReason->addParameter(new ParameterPair($key, $value));
        }

        return $terminationReason;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    public function addParameter(ParameterPair $parameter)
    {
        $this->parameters[] = $parameter;
    }

    /**
     * @return ParameterPair[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }


}
