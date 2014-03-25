<?php
namespace Employees\Tests\Helpers;
use Employees\Domain\Employees\Employee;
use Employees\Domain\Employees\Builders\EmployeeBuilder;
use Employees\Domain\Employees\Builders\Factories\EmployeeBuilderFactory;
use UnitTestHelpers\Tests\Helpers\AbstractHelper;
use Entities\Tests\Helpers\EntityBuilderFactoryHelper;
use Uuids\Domain\Uuids\Uuid;
use Strings\Domain\Strings\String;
use DateTimes\Domain\DateTimes\DateTime;

final class EmployeeBuilderFactoryHelper extends AbstractHelper {
    
    private $employeeBuilderMock;
    private $employeeBuilderFactoryMock;
    private $entityBuilderFactoryHelper;
    public function __construct(\PHPUnit_Framework_TestCase $phpunit, EmployeeBuilder $employeeBuilderMock, EmployeeBuilderFactory $employeeBuilderFactoryMock) {
        parent::__construct($phpunit);  
        $this->employeeBuilderMock = $employeeBuilderMock;
        $this->employeeBuilderFactoryMock = $employeeBuilderFactoryMock;
        $this->entityBuilderFactoryHelper = new EntityBuilderFactoryHelper($phpunit, $this->employeeBuilderMock, $this->employeeBuilderFactoryMock);
    }
    
    public function expectsEmployeeBuilderFactory_Success(Employee $returnedEmployee, Uuid $uuid, String $name, DateTime $createdOn) {
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                    ->method('withName')
                                    ->with($name)
                                    ->will($this->phpunit->returnValue($this->employeeBuilderMock));
        
        $this->entityBuilderFactoryHelper->expectsEntityBuilderFactory_Success($returnedEmployee, $uuid, $createdOn);
    }
    
    public function expectsEmployeeBuilderFactory_multiple_Success(array $returnedEmployees, array $uuids, array $names, array $createdOns) {
        
        $this->employeeBuilderMock->expects($this->phpunit->any())
                                    ->method('withName')
                                    ->with($this->getLogicalOr($names))
                                    ->will($this->phpunit->returnValue($this->employeeBuilderMock));
        
        $this->entityBuilderFactoryHelper->expectsEntityBuilderFactory_multiple_Success($returnedEmployees, $uuids, $createdOns);
    }
}