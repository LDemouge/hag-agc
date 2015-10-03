<?php

Class PersonIdentity
{
	private $name;
	private $gender;
	private $title;
	private $birthdate;
	
	public function __construct(PersonName $name, PersonGender $gender = null, PersonTitle $title = null, Birthdate $birthdate = null)
	{
		if(!$this->areCompatible($gender, $title)) throw new InvalidArgumentException;
		
		$this->name = $name;
		$this->gender = $gender;
		$this->title = $title;
		$this->birthdate = $birthdate;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getGender()
	{
		return $this->gender;
	}
	
	public function getBirthdate()
	{
		return $this->birthdate;
	}
	
	private function areCompatible($gender, $title)
	{
		if(isset($gender) && isset($title))
		{
			$compatibles = array(
								'mister' => 'male',
								'miss' => 'female',
								'misses'=>'female'
								);
			
			if(isset($compatibles[$title]) && !in_array($gender, $compatibles[$title])) return FALSE;
			
			return TRUE;
		}
		return true;
	}	
	
}
