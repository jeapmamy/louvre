<?php

// tests/JV/CoreBundle/Entity/CompteurTest.php

namespace tests\JV\CoreBundle\Entity;

use JV\CoreBundle\Entity\Compteur;
use PHPUnit\Framework\TestCase;


class CompteurTest extends TestCase
{
	
	public function testNombre()
    {
        $compteur = new Compteur();
        $compteur->setNombre(120);

        $this->assertEquals(120, $compteur->getNombre());
    }
	
}



