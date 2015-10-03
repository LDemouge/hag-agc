<?php

namespace Hager\TransformationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ActionPlanControllerTest extends WebTestCase
{
	public function test_NewItem_shouldnt_accept_GET()
	{
		$client = static::createClient();

        $crawler = $client->request('GET', '/api/action-plan/add-item');
		
		$this->assertEquals(405, $client->getResponse()->getStatusCode());
		
	}
	
	public function test_newItem_should_accept_POST()
	{
		$client = static::createClient();
		$crawler = $client->request('POST', '/api/action-plan/add-item', array('data'=>'toto'));
		$this->assertTrue($client->getResponse()->isSuccessful());
	}
	
	public function test_newItem_handles_request()
	{
		$data = json_encode(array(
						'activity'=>'une activité',
						'description'=>'Pellentesque sem urna, viverra pulvinar. Aenean id lorem...',
						'leader'=>'Mark Otto',
						'deadline'=>'2015-12-15'
						));
		$client = static::createClient();
		$crawler = $client->request('POST', 
									'/api/action-plan/add-item',
									 array(),
    								array(),
    								array('CONTENT_TYPE' => 'application/json'), 
									$data);
		$expected = '{
			activity: "une activité",
			description: "Pellentesque sem urna, viverra pulvinar. Aenean id lorem...",
			leader: "Mark Otto",
			deadline: "2015-12-15"
		}';
		$this->assertEquals($expected, $client->getResponse()->getContent());
	}
	
	public function test_newItem_shouldnt_accept_anonymous_post()
	{
		$data = json_encode(array(
						'activity'=>'une activité',
						'description'=>'Pellentesque sem urna, viverra pulvinar. Aenean id lorem...',
						'leader'=>'Mark Otto',
						'deadline'=>'2015-12-15'
						));
		$client = static::createClient();
		$crawler = $client->request('POST', 
									'/api/action-plan/add-item',
									 array(),
    								array(),
    								array('CONTENT_TYPE' => 'application/json'), 
									$data);
		$this->assertEquals(401, $client->getResponse()->getStatusCode());
	}
}
