<?php

class PersonTitle implements ValueObject
{
	private $title;
	
	const MISTER = 'mister';
	const MISS = 'miss';
	const MISSES = 'misses';
	
	public function __construct($title)
	{
		if(!$this->isValid($title)) throw new InvalidArgumentException;
		$this->title=$title;
	}
	
	private function isValid($title)
	{
		if(!in_array($title, array(self::MISTER, self::MISSES, self::MISS))) return false;
		return true;
	}
	
	public function get()
	{
		return $this->title;
	}
	
	public function equals(PersonTitle $toCompare)
	{
		return $this->title == $toCompare->title;
	}
}
