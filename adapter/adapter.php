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

$t = new NameAdapter(new NameGenerator('kennith', 'leung'));
echo $t->getName();