<?php
namespace Employees\Domain\Employees;
use Entities\Domain\Entities\Entity;

interface Employee extends Entity {
    public function getName();
}