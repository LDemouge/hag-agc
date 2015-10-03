<?php

Class PersonName implements ValueObject
{
	private $firstName;
	private $lastName;
	
	public function __construct(Name $lastname, Name $firstname)
	{
		$this->lastName = $lastname;
		$this->firstName = $firstname;
	}
	
	public function equals(PersonName $toCompare)
	{
		return ($this->firstName->equals($toCompare->firstName) && $this->lastName->equals($toCompare->lastName));
	}
}
