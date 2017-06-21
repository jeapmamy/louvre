<?php

// src/JV/CoreBundle/Controller/BilletterieController.php

namespace JV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BilletterieController extends Controller
{
    public function indexAction()
    {
        return $this->render('JVCoreBundle:Billetterie:index.html.twig');
			
    }

 	public function reservationAction()
	{
		return $this->render('JVCoreBundle:Billetterie:reservation.html.twig');
	}
 
 	public function coordonneesAction()
	{
		return $this->render('JVCoreBundle:Billetterie:coordonnees.html.twig');
	}

    public function recapitulatifAction()
	{
		return $this->render('JVCoreBundle:Billetterie:recapitulatif.html.twig');
	}

  	public function paiementAction()
	{
		return $this->render('JVCoreBundle:Billetterie:paiement.html.twig');
	}

  	public function confirmationAction()
	{
		return $this->render('JVCoreBundle:Billetterie:confirmation.html.twig');
	}
}


