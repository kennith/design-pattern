<?php
// Chain of Responsibility design pattern. 
// Each object is tied in to another object. 

abstract class PurchasePower {
	protected $successor;
	protected $title;

	abstract function getAllowance();
	abstract function getSuccessor();
	abstract function setTitle();
	
	function getTitle() {
		return $this->title;
	}

	function setSuccessor($successor) {
		$this->successor = $successor;
	}

	function request($amount) {
		if($amount < $this->getAllowance()) {
			echo "Purchase Approved by {$this->getTitle()}";
		} elseif($this->successor != NULL) {
			$this->successor->request($amount);
		} else {
			echo "No one can purchase.";
		}
	}
}


class Manager extends PurchasePower {
	function getAllowance() {
		return 10;
	}

	function setTitle() {
		$this->title = "Manager";
	}

	function getSuccessor() {
		return $this->successor;
	}

}

class Director extends PurchasePower {
	function getAllowance() {
		return 20;
	}

	function setTitle() {
		$this->title = "Director";
		// var_dump($this->getSuccessor());
	}

	function getSuccessor() {
		return $this->successor;
	}
}

$manager  = new Manager(); $manager->setTitle("Manager");
$director = new Director(); $director->setTitle("Director");

$manager->setSuccessor($director);
$manager->request(9);
// var_dump();
// $manager->getSuccessor();