<?php

namespace Codibly\DatabricksBundle\Client\Module;

interface GroupsModuleInterface
{
    public function addMember(array $params = []);

    public function create(array $params = []);

    public function listMembers(array $params = []);

    public function list(array $params = []);

    public function listParents(array $params = []);

    public function removeMembers(array $params = []);

    public function delete(array $params = []);
}
