<?php
// Adapter is abut creating an intermediary abstraction that translates, or 
// maps, the old component to the new system. 

class NameGenerator {
	private $firstName;
	private $lastName;

	function __construct($firstName, $lastName) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	function firstName() {
		return $this->firstName;
	}

	function lastName() {
		return $this->lastName;
	}
}

class NameAdapter {
	private $ng;

	function __construct(NameGenerator $ng) {
		$this->ng = $ng;
	}

	function getName() {
		return $this->ng->firstName().$this->ng->lastName();
	}
}

class Civic implements Car {
	function start() 
	{
		return 'turn on the key';
	}

	function lock() 
	{
		return 'press the lock key on remote.';
	}
}

class CivicAdapter implements ElectricCar {
	private $car;

	function __construct(Car $car) 
	{
		$this->car = $car;
	}

	function turnOn() 
	{
		return $this->car->start();
	}

	function parked() 
	{
		return $this->car->lock();
	}

}

class Tesla implements ElectricCar {
	function turnOn() {
		return 'press a button.';
	}

	function parked() 
	{
		return 'Tesla will find a parking itself.';
	}

}

class Person {
	private $ec;
	function __construct(ElectricCar $ec)
	{
		$this->ec = $ec;
	}

	function getOffCar()
	{
		return $this->ec->parked();
	}
}

interface Car {
	function start();
	function lock();
}

interface ElectricCar {
	function turnOn();
	function parked();
}

$t = new NameAdapter(new NameGenerator('kennith', 'leung'));
echo $t->getName();

$person = (new Person(new Tesla));
echo $person->getOffCar();

$person = (new Person(new CivicAdapter(new Civic)));
echo $person->getOffCar();
