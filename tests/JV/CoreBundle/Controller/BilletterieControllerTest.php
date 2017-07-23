<?php

// tests/JV/CoreBundle/Controller/BilletterieControllerTest.php

namespace tests\JV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BilltterieControllerTest extends WebTestCase
{
    public function testReservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reservation');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("reservation")')->count()
        );
    }
}