<?php

class Person extends AggregateRoot
{
	private $issetGender;
	private $issetTitle;
	
	public function __construct(PersonId $personId, PersonIdentity $identity)
	{
		if(isset($identity->getGender())) $this->issetGender = true;
		if(isset($identity->getTitle())) $this->issetTitle = true;
	}
	
	public function CorrectNameAndTitle(PersonName $name);
	
	public function ChangeName(PersonName $name, $reason, DateTime $since = null);
	
	public function CorrectBirthdate(Birthdate $birthdate);
	
	public function CorrectTitle(PersonTitle $title);
	
	public function ChangeTitle(PersonTitle $title, $reason, DateTime $since = null);
	
	public function CorrectGender(PersonGender $gender, PersonTitle $title);
	
}
