<?php

// src/JV/CoreBundle/Controller/BilletterieController.php

namespace JV\CoreBundle\Controller;

use JV\CoreBundle\Entity\Billetterie;
use JV\CoreBundle\Form\BilletterieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class BilletterieController extends Controller
{
    public function indexAction()
    {
        return $this->render('JVCoreBundle:Billetterie:index.html.twig');
			
    }

 	public function reservationAction(Request $request)
	{
		// On crée un objet Billetterie
		$billetterie = new Billetterie();

		$form = $this->createForm(BilletterieType::class, $billetterie);
			
		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			/*
				$session = $request->getSession();
				$dateReservation = $session->get('dateReservation');
				$session->set('session_date', $billetterie->getDateReservation());
			*/
			
				// Puis on redirige vers la page suivante
				return $this->redirectToRoute('jv_core_coordonnees');
			
		}
					
		
		
		// À ce stade, le formulaire n'est pas valide car :
		// - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
		// - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
		return $this->render('JVCoreBundle:Billetterie:reservation.html.twig', array(
		  'form' => $form->createView(),
		));
	}
	
 
 	public function coordonneesAction(Request $request)
	{
    // Ici, on récupérera les données précédentes

    // Même mécanisme que pour réservation
    if ($request->isMethod('POST')) {
		  $request->getSession()->getFlashBag()->add('notice', 'Etape 2 bien validée.');

		  return $this->redirectToRoute('jv_core_paiement');
    }

    return $this->render('JVCoreBundle:Billetterie:coordonnees.html.twig');
  	}
	
/*
    public function recapitulatifAction()
	{
		return $this->render('JVCoreBundle:Billetterie:recapitulatif.html.twig');
	}
*/
  	public function paiementAction()
	{
		return $this->render('JVCoreBundle:Billetterie:paiement.html.twig');
	}

  	public function confirmationAction()
	{
		return $this->render('JVCoreBundle:Billetterie:confirmation.html.twig');
	}
}


