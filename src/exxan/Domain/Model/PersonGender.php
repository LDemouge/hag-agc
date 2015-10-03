<?php

class PersonGender implements ValueObject
{
	private $gender;
	
	const MALE = 'male';
	const FEMALE = 'female';
	const NS = 'not_specified';
	
	public function __construct($gender)
	{
		if(!$this->isValid($gender)) throw new InvalidArgumentException;
		$this->gender = $gender;
	}
	
	private function isValid($gender)
	{
		if(!in_array($gender, array(self::FEMALE, self::MALE, self::NS))) return false;
		return true;
	}
	
	public function get()
	{
		return $this->gender;
	}
}
