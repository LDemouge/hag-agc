<?php

namespace Acme\DemoBundle\TestService;

class FrenchTenantGreeter extends TenantGreeter
{
	public function greet()
	{
		return 'Bonjour '.$this->tenantId.', content de vous revoir !!!';
	}
}
