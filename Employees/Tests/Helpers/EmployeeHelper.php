<?php
namespace Employees\Tests\Helpers;
use Employees\Domain\Employees\Employee;
use UnitTestHelpers\Tests\Helpers\AbstractHelper;
use Strings\Domain\Strings\String;

final class EmployeeHelper extends AbstractHelper {
    
    private $employeeMock;
    public function __construct(\PHPUnit_Framework_TestCase $phpunit, Employee $employeeMock) {
        parent::__construct($phpunit);
        $this->employeeMock = $employeeMock;
    }
    
    public function expectsGetName_Success(String $returnedName) {
        
        $this->employeeMock->expects($this->phpunit->once())
                            ->method('getName')
                            ->will($this->phpunit->returnValue($returnedName));
        
    }
    
    public function expectsGetName_multiple_Success(array $returnedNames) {
        
        $this->employeeMock->expects($this->phpunit->any())
                            ->method('getName')
                            ->will($this->getOnConsecutiveCalls($returnedNames));
        
    }
}