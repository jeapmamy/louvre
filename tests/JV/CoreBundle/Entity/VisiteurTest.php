<?php

// tests/JV/CoreBundle/Entity/VisiteurTest.php

namespace tests\JV\CoreBundle\Entity;

use JV\CoreBundle\Entity\Visiteur;
use PHPUnit\Framework\TestCase;


class VisiteurTest extends TestCase
{
    public function testNom()
    {
        $visiteur = new Visiteur();
        $visiteur->setNom('FONTAINE');

        $this->assertEquals('FONTAINE', $visiteur->getNom());
    }
	
	public function testDateNaissance()
    {
        $visiteur = new Visiteur();
        $dateNaissance = new\ DateTime("15-02-1965");
        $visiteur->setDateNaissance($dateNaissance);
		
        $this->assertEquals($dateNaissance, $visiteur->getDateNaissance());
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



