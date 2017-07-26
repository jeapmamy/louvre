<?php

// tests/JV/CoreBundle/Controller/BilletterieControllerTest.php

namespace tests\JV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BilltterieControllerTest extends WebTestCase
{
    public function testAccueil()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Musée du Louvre")')->count()
        );
    }
	
	public function testReservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reservation');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Réservation")')->count()
        );
    }
	
	public function testLink()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reservation');	
		$link = $crawler
			->filter('a:contains("Accueil")') 
			->eq(0) 
			->link()
		;

		$crawler = $client->click($link);
		
		$this->assertEquals(
			200, 
			$client->getResponse()->getStatusCode()
		);

	}
}