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
use Codibly\DatabricksBundle\DTO\DTOInterface;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilderInterface;

class Client implements ClientInterface
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
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

    /**
     * @return ValidatorInterface
     */
    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    public function validate(DTOInterface $dto)
    {
        if(!is_null($this->validator)) {
            return $this->validator->validate($dto);
        }

        return [];
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
