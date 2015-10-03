<?php

class Word
{
	private $word;
	
	public function __construct($word)
	{
		if(!$this->isValid($word)) throw new InvalidArgumentException;
		$this->word = $word;
	}
	
	private function isValid($word)
	{
		//validation stuff
		return true;
	}
	
}
