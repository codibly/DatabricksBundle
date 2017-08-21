<?php

namespace Codibly\DatabricksBundle\Utility;

class Text
{
    /**
     * @param string $camelCase
     * @return string
     *
     * @see https://stackoverflow.com/questions/1993721/how-to-convert-camelcase-to-camel-case
     */
    public static function fromCamelCaseToUnderscore(string $camelCase): string
    {
        $matches = [];
        preg_match_all('/([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)/', $camelCase, $matches);

        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode('_', $ret);
    }

    public static function fromUnderscoreToCamelCase(string $underscore): string
    {
        $parts = explode('_', $underscore);

        $camelCase = lcfirst(array_pop($parts));

        foreach ($parts as $part) {
            $camelCase .= ucfirst($part);
        }

        return $camelCase;
    }
}
