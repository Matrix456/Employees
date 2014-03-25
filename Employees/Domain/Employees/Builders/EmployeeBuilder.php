<?php
namespace Employees\Domain\Employees\Builders;
use Strings\Domain\Strings\String;
use Entities\Domain\Entities\Builders\EntityBuilder;

interface EmployeeBuilder extends EntityBuilder {
    public function withName(String $name);
}
