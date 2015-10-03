<?php
use Address; //to be complete

interface JobApplicant
{
	public static function register(NaturalPerson $naturalPerson);
	public function addAddress(Address $address);
	public function disableAddress(AddressId $addressId);
	
}
