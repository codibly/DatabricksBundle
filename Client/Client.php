<?php

namespace Codibly\DatabricksBundle\Client;

use Codibly\DatabricksBundle\Adapter\AdapterInterface;
use Codibly\DatabricksBundle\Client\Module\ClusterModule;
use Codibly\DatabricksBundle\Client\Module\ClusterModuleInterface;
use Codibly\DatabricksBundle\Client\Module\DbfsModuleInterface;
use Codibly\DatabricksBundle\Client\Module\GroupsModuleInterface;
use Codibly\DatabricksBundle\Client\Module\InstanceProfileModuleInterface;
use Codibly\DatabricksBundle\Client\Module\JobModuleInterface;
use Codibly\DatabricksBundle\Client\Module\LibraryModuleInterface;
use Codibly\DatabricksBundle\Client\Module\WorkspaceModuleInterface;
use Codibly\DatabricksBundle\Client\Traits\Loggable;
use Codibly\DatabricksBundle\DTO\DTOInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilderInterface;

class Client implements ClientInterface
{
    use Loggable;

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getLogger(): LoggerInterface
    {
       return $this->logger;
    }

    /**
     * @inheritDoc
     */
    public function getAdapter(): AdapterInterface
    {
        return $this->adapter;
    }

    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return ValidatorInterface
     */
    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    public function validate(DTOInterface $dto): ConstraintViolationListInterface
    {
        if(!is_null($this->validator)) {
            $result = $this->validator->validate($dto);
            $this->info(
                sprintf(
                    'Validation of the %s class with errors: %s',
                    get_class($dto),
                    json_encode($result)
                )
            );

            return $result;
        } else {
            $this->info('No validator provided. Skipping.');
        }

        return new ConstraintViolationList();
    }

    public function cluster(): ClusterModuleInterface
    {
        return new ClusterModule($this);
    }

    public function dbfs(): DbfsModuleInterface
    {
        // TODO: Implement dbfs() method.
    }

    public function groups(): GroupsModuleInterface
    {
        // TODO: Implement groups() method.
    }

    public function instanceProfile(): InstanceProfileModuleInterface
    {
        // TODO: Implement instanceProfile() method.
    }

    public function job(): JobModuleInterface
    {
        // TODO: Implement job() method.
    }

    public function library(): LibraryModuleInterface
    {
        // TODO: Implement library() method.
    }

    public function workspace(): WorkspaceModuleInterface
    {
        // TODO: Implement workspace() method.
    }

}
