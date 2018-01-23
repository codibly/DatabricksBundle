<?php

namespace Codibly\DatabricksBundle\Client\Exception;

use Guzzle\Http\Message\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException extends \Exception
{
    /**
     * @var ConstraintViolationListInterface
     */
    private $errors;

    public function __construct(ConstraintViolationListInterface $errors, string $message = 'Validation error', \Throwable $previous = null)
    {
        $this->$errors = $errors;

        parent::__construct($message, 0, $previous);
    }

    /**
     * @return ConstraintViolationListInterface
     */
    public function getErrors(): ConstraintViolationListInterface
    {
        return $this->errors;
    }
}
