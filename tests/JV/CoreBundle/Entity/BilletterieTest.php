<?php

// tests/JV/CoreBundle/Entity/BilletterieTest.php

namespace tests\JV\CoreBundle\Entity;

use JV\CoreBundle\Entity\Billetterie;
use JV\CoreBundle\Entity\Visiteur;
use PHPUnit\Framework\TestCase;


class BilletterieTest extends TestCase
{
    public function testJournee()
    {
        $billetterie = new Billetterie();
        //$billetterie->setJournee(true);

        $this->assertEquals(true, $billetterie->getJournee());
    }
	
	public function testCreationCodeReservation()
	{
        $billetterie = new Billetterie();
		
        $this->assertNotNull($billetterie->getCodeReservation());
    }
	
	public function testVisiteur()
	{
        $billetterie = new Billetterie();
        $visiteur = new Visiteur();
		
        $this->assertEquals($billetterie->getId(), $visiteur->getBilletterie());
    }
	
	/*
	public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
	*/
}



