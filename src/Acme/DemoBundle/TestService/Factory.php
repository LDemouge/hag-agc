<?php

namespace Acme\DemoBundle\TestService;

class Factory
{
	private $tenantId;
	
	public function __construct($tenantId)
	{
		$this->tenantId=$tenantId;
	}
	
	public function get()
	{
		switch($this->tenantId)
		{
			case 123:
				return new EnglishTenantGreeter($this->tenantId);
				break;
			case 456:
				return new FrenchTenantGreeter($this->tenantId);
				break;
		}
	}
}
