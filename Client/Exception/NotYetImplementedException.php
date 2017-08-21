<?php

namespace Codibly\DatabricksBundle\Client\Exception;

class NotYetImplementedException extends \Exception
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'This method is not yet implemented, stay tuned!',
            0,
            $previous
        );
    }
}
