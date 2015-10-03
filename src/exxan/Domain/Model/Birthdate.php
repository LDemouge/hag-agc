<?php

class Birthdate implements ValueObject
{
	private $birthdate;
	
	public function __construct(DateTime $birthdate)
	{
		if(!$this->isValid($birthdate)) throw new InvalidArgumentException;
		$this->birthdate = $birthdate;
	}
	
	private function isValid($birthdate)
	{
		if($birthdate >= new DateTime) return false;
		return true;
	}
	
	public function get()
	{
		return $this->birthdate;
	}
	
	public function equals(Birthdate $toCompare)
	{
		return $this->birthdate == $toCompare->birthdate;
	}
}
