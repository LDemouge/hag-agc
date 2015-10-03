<?php

namespace Acme\DemoBundle\TestService;

class TenantGreeter
{
	protected $tenantId;
	
	public function __construct($tenantId)
	{
		$this->tenantId=$tenantId;
	}
	
	
}
