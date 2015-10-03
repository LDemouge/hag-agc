<?php

interface ValueObject
{
	public function equals(ValueObject $toCompare);
}
