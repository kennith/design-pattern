<?php
// Template method is a design pattern that allows sub class to be reuse
// with minimal changes. 

abstract class BasicPlay {
	function __construct()
	{
	}

	private function setup()
	{
		var_dump('PG at top');
		return $this;
	}

	abstract protected function decisionPoint();

	private function attemptFG() 
	{
		var_dump('shoot');
		return $this;
	}

	public function execute()
	{
		return $this->setup()->decisionPoint()->attemptFG();

	}
}

class Elbow extends BasicPlay {

	protected function decisionPoint()
	{
		var_dump('pass to top');
		return $this;
	}
}

(new Elbow)->execute();