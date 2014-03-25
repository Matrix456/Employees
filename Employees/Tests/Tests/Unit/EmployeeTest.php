<?php
namespace Employees\Tests\Tests\Unit;

use Employees\Tests\Helpers\EmployeeHelper;
use Employees\Tests\Helpers\EmployeeBuilderFactoryHelper;
use Employees\Tests\Tests\Helpers\EmployeeClass;

final class EmployeeTest extends \PHPUnit_Framework_TestCase {
    
    private $employeeBuilderFactoryMock;
    private $employeeBuilderMock;
    private $employeeMock;
    private $nameMock;
    private $uuidMock;
    private $dateTimeMock;
    private $class;
    private $employeeBuilderFactoryHelper;
    private $employeeHelper;
    
    
    public function setUp() {
        
        $this->employeeBuilderFactoryMock = $this->getMock('Employees\Domain\Employees\Builders\Factories\EmployeeBuilderFactory');
        $this->employeeBuilderMock = $this->getMock('Employees\Domain\Employees\Builders\EmployeeBuilder');
        $this->employeeMock = $this->getMock('Employees\Domain\Employees\Employee');
        $this->nameMock = $this->getMock('Strings\Domain\Strings\String');
        $this->uuidMock = $this->getMock('Uuids\Domain\Uuids\Uuid');
        $this->dateTimeMock = $this->getMock('DateTimes\Domain\DateTimes\DateTime');
        $this->class = new EmployeeClass($this->employeeBuilderFactoryMock, $this->nameMock, $this->uuidMock, $this->dateTimeMock, $this->dateTimeMock);
        $this->employeeHelper = new EmployeeHelper($this, $this->employeeMock);
        $this->employeeBuilderFactoryHelper = new EmployeeBuilderFactoryHelper($this, $this->employeeBuilderMock, $this->employeeBuilderFactoryMock);
    }
    
    public function tearDown() {
        
    }
    
    public function testBuild_Success() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_Success($this->employeeMock, $this->uuidMock, $this->nameMock, $this->dateTimeMock);
        
        $employe = $this->class->build();
        
        $this->assertEquals($this->employeeMock, $employe);
    }
    
    public function testBuild_multiple_Success() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_multiple_Success(
            array($this->employeeMock, $this->employeeMock), 
            array($this->uuidMock, $this->uuidMock),
            array($this->nameMock, $this->nameMock),
            array($this->dateTimeMock, $this->dateTimeMock)
        );
        
        $firstEmployee = $this->class->build();
        $secondEmployee = $this->class->build();
        
        $this->assertEquals($this->employeeMock, $firstEmployee);
        $this->assertEquals($this->employeeMock, $secondEmployee);
    }
    
    public function testGetName_Success() {
        
        $this->employeeHelper->expectsGetName_Success($this->nameMock);
        
        $name = $this->employeeMock->getName();
        $this->assertEquals($this->nameMock, $name);
    }
    
    public function testGetName_multiple_Success() {
        
        $this->employeeHelper->expectsGetName_multiple_Success(array($this->nameMock, $this->nameMock));
        
        $firstName = $this->employeeMock->getName();
        $secondName = $this->employeeMock->getName();
        
        $this->assertEquals($this->nameMock, $firstName);
        $this->assertEquals($this->nameMock, $secondName);
    }
}
