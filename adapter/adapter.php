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

class CivicAdapter {
	private $civic;

	function __construct(Civic $civic) 
	{
		$this->civic = $civic;
	}
}

interface Car {
	function start();
	function lock();
}

$t = new NameAdapter(new NameGenerator('kennith', 'leung'));
echo $t->getName();

$car = new Civic;
echo $car->start();