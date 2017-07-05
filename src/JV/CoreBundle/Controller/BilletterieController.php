<?php

// src/JV/CoreBundle/Controller/BilletterieController.php

namespace JV\CoreBundle\Controller;

use JV\CoreBundle\Entity\Billetterie;
use JV\CoreBundle\Entity\Visiteur;
use JV\CoreBundle\Form\BilletterieType;
use JV\CoreBundle\Form\VisiteurType;
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
			
			// On enregistre notre objet $billetterie dans la base de données
			$em = $this->getDoctrine()->getManager();
			$em->persist($billetterie);
			$em->flush();


			// Puis on redirige vers la page suivante
			return $this->redirectToRoute('jv_core_coordonnees', array('id'=>$billetterie->getId()));
			
		}
					
		
		
		// À ce stade, le formulaire n'est pas valide car :
		// - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
		// - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
		return $this->render('JVCoreBundle:Billetterie:reservation.html.twig', array(
		  'form' => $form->createView(),
		));
	}
	
 
 	public function coordonneesAction($id, Request $request)
	{
		$billetterie = $this->getDoctrine()
  			->getManager()
  			->getRepository('JVCoreBundle:Billetterie')
  			->find($id)
		;
		
		if (null === $billetterie) {
			throw new NotFoundHttpException("La réservation d'id ".$id." n'existe pas.");
		}

		$form = $this->createForm(BilletterieType::class, $billetterie);
		
		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			
			// On enregistre notre objet $visiteur dans la base de données
			$em = $this->getDoctrine()->getManager();
			//$visiteur->setBilletterie($billetterie);
			$em->persist($billetterie);
			$em->flush();


			// Puis on redirige vers la page suivante
			return $this->redirectToRoute('jv_core_paiement', array('id'=>$billetterie->getId()));
			
		}
			
		
		return $this->render('JVCoreBundle:Billetterie:coordonnees.html.twig', array(
			'billetterie' => $billetterie,
			'form' => $form->createView(),
		));

	}
	
/*
    public function recapitulatifAction()
	{
		return $this->render('JVCoreBundle:Billetterie:recapitulatif.html.twig');
	}
*/
  	public function paiementAction($id, Request $request)
	{
		$billetterie = $this->getDoctrine()
  			->getManager()
  			->getRepository('JVCoreBundle:Billetterie')
  			->find($id)
		;
		
		if (null === $billetterie) {
			throw new NotFoundHttpException("La réservation d'id ".$id." n'existe pas.");
		}

		$form = $this->createForm(BilletterieType::class, $billetterie);
		
		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			
			// On enregistre notre objet $visiteur dans la base de données
			$em = $this->getDoctrine()->getManager();
			//$visiteur->setBilletterie($billetterie);
			$em->persist($billetterie);
			$em->flush();


			// Puis on redirige vers la page suivante
			return $this->redirectToRoute('jv_core_paiement', array('id'=>$billetterie->getId()));
			
		}
		return $this->render('JVCoreBundle:Billetterie:paiement.html.twig', array(
			'billetterie' => $billetterie,
			'form' => $form->createView(),
		));
		
	}

  	public function confirmationAction()
	{
		return $this->render('JVCoreBundle:Billetterie:confirmation.html.twig');
	}
}


