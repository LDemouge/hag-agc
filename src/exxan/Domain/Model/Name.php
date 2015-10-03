<?php

Class Name implements ValueObject
{
	private $name;
	
	public function __construct($name)
	{
		if(!$this->isValid($name)) throw new InvalidArgumentException;
		$this->name = $name;
	}
	
	private function isValid($name)
	{
		//validation stuff
		return true;
	}
	
	public function get()
	{
		return $this->name;
	}
	
	public function equals(Name $toCompare)
	{
		return $this->name == $toCompare->name;
	}
}
