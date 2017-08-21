<?php

namespace Codibly\DatabricksBundle\DTO;

use Codibly\DatabricksBundle\Utility\Text;

abstract class GenericDTO implements DTOInterface
{
    public function getParams(): array
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties(
            \ReflectionProperty::IS_PRIVATE |
            \ReflectionProperty::IS_PROTECTED
        );

        $params = [];

        /** @var \ReflectionProperty $property */
        foreach ($properties as $property) {
            $name = $property->getName();
            $normalizedName = Text::fromCamelCaseToUnderscore($name);

            $value = $this->$name;

            if (empty($value)) {
                continue;
            }

            if (is_object($value)) {
                if ($value instanceof ScalarDTOInterface) {
                    //codecept_debug($value->getParams());
                    $params = $value->getParams();
                    $params[$normalizedName] = array_pop($params);

                    continue;
                }
                if ($value instanceof DTOInterface) {
                    $params[$normalizedName] = $value->getParams();

                    continue;
                }

                throw new \InvalidArgumentException(
                    sprintf(
                        'Class %s doesn\'t implement %s interface',
                        get_class($value),
                        DTOInterface::class
                    )
                );
            }

            if (is_array($value)) {
                $params[$normalizedName] = [];
                //codecept_debug('fewfwef_'.$normalizedName);
                foreach ($value as $item) {
                    //codecept_debug('    ... iterate item');
                    //codecept_debug($item);
                    if (is_object($item)) {
                        //codecept_debug('    ... is object');
                        if ($item instanceof DTOInterface) {
                            //codecept_debug('    ... is dto');
                            //codecept_debug('    ... ... getting params');
                            $params[$normalizedName] = array_merge($params[$normalizedName], $item->getParams());
                            //codecept_debug('    ... ... params: ');
                            //codecept_debug($item->getParams());

                            continue;
                        }

                        throw new \InvalidArgumentException(
                            sprintf(
                                'Class %s doesn\'t implement %s interface',
                                get_class($value),
                                DTOInterface::class
                            )
                        );
                    }
                    //codecept_debug('    ... is not a object');

                    $params[$normalizedName][] = $item;
                }

                continue;
            }

            //codecept_debug('    ... normall');
            $params[$normalizedName] = $value;
        }

        return $params;
    }

    public function hydrateWIP(array $rawAPIResponse): DTOInterface
    {
        $reflection = new \ReflectionClass($this);

        foreach ($rawAPIResponse as $name => $value) {
            $normalizedName = Text::fromUnderscoreToCamelCase($name);
            $setterName = 'set' . ucfirst($normalizedName);

            if ($reflection->hasMethod($setterName)) {
                $method = new \ReflectionMethod($this, $setterName);

                if (is_array($value)) {
                    $methodParameters = $method->getParameters();

                    foreach ($methodParameters as $methodParameter) {
                        // indicated collection of objects
                        if($methodParameter->isArray()) {

                        }

                        // object
                        if(!is_null($methodParameter->getClass())) {
                            $childrenClass = $methodParameter->getClass()->getName();
                        }
                    }
                }

                $method->invokeArgs($this, [$value]);

                continue;
            }

            throw new \InvalidArgumentException(
                sprintf(
                    'API response element %s, don\'t have corresponding setter. Generated setter name: %s',
                    $name,
                    $setterName
                )
            );
        }
    }
}
