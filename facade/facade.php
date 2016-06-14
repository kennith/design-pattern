<?php

// Facade defines a new interface. (Adapter uses an old interface)
// The intent of Facade is to produce a simpler interface.

class Company {
	private static $companyName;

	public static function getCompanyName() {
		self::$companyName = "MAI";
		return self::$companyName;
	}
}

class Employee {
	private static $employeeName;

	public static function getEmployeeName() {
		self::$employeeName = "Kennith";
		return self::$employeeName;
	}
}

class PersonFacade {
	public static function getDetail() {
		$companyName = Company::getCompanyName();
		$employeeName = Employee::getEmployeeName();

		return $companyName.' '.$employeeName;
	}
}

// var_dump(Employee::getEmployeeName());
var_dump(PersonFacade::getDetail());

// Is class private by default?
class MyClass {

	private $var1;

	function __construct() {

	}

	private function myPrivateFunction() {
		return 'private';
	}

	function myPublicFunction() {
		return 'public '.$this->myPrivateFunction();
	}
}
