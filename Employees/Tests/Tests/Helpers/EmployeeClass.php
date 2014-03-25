<?php
namespace Employees\Tests\Tests\Helpers;
use Employees\Domain\Employees\Builders\Factories\EmployeeBuilderFactory;
use Strings\Domain\Strings\String;
use Uuids\Domain\Uuids\Uuid;
use DateTimes\Domain\DateTimes\DateTime;

final class EmployeeClass {
    private $employeeBuilderFactory;
    private $name;
    private $uuid;
    private $createdOn;
    private $lastUpdatedOn;
    
    public function __construct(EmployeeBuilderFactory $employeeBuilderFactory, String $name, Uuid $uuid, DateTime $createdOn, DateTime $lastUpdatedOn) {
        $this->employeeBuilderFactory = $employeeBuilderFactory;
        $this->uuid = $uuid;
        $this->createdOn = $createdOn;
        $this->lastUpdatedOn = $lastUpdatedOn;
        $this->name = $name;
    }
    
    public function build() {
        return $this->employeeBuilderFactory->create()
                                            ->create()
                                            ->withUuid($this->uuid)
                                            ->withName($this->name)
                                            ->createdOn($this->createdOn)
                                            ->now();
    }
    
    public function build_lastUpdatedOn() {
        return $this->employeeBuilderFactory->create()
                                            ->create()
                                            ->withUuid($this->uuid)
                                            ->withName($this->name)
                                            ->createdOn($this->createdOn)
                                            ->lastUpdatedOn($this->lastUpdatedOn)
                                            ->now();
    }
}

