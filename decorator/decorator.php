<?php
// A decorator pattern allows us to extend the behavior of an object without 
// the need to change the other object.

interface iceCream {
	function getDescription();
}

class Chocolate implements iceCream {
	public function getDescription()
	{
		return 'chocolate';
	}
}

class Sprinkle implements iceCream {
	protected $iceCream;

	function __construct(iceCream $iceCream) {
		$this->iceCream = $iceCream;
	}

	public function getDescription() {
		return 'Sprinkle is added on '.$this->iceCream->getDescription();
	}
}

$icecream = new Chocolate;

echo $icecream->getDescription();

$icecreamWithSprinkle = new Sprinkle(new Chocolate);
echo $icecreamWithSprinkle->getDescription();