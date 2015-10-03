<?php

namespace Acme\DemoBundle\TestService;
use Acme\DemoBundle\TestService\TenantGreeter;

class EnglishTenantGreeter extends TenantGreeter
{
	public function greet()
	{
		return 'hello '.$this->tenantId.', glad to see you again !!!';
	}
}
