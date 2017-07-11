<?php

// src/JV/CoreBundle/Controller/BilletterieController.php

namespace JV\CoreBundle\Controller;

use JV\CoreBundle\Entity\Billetterie;
use JV\CoreBundle\Entity\Visiteur;
use JV\CoreBundle\Entity\Compteur;
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
			
			// Veriication des 1000 places...
			$compteur = $this
				->getDoctrine()
  				->getManager()
  				->getRepository('JVCoreBundle:Compteur')
  				->findOneByDate($billetterie->getDateReservation())
			;

			if (null === $compteur) {
				$compteur = new Compteur();
				$compteur->setDate($billetterie->getDateReservation());
				$compteur->setNombre($billetterie->getNbTickets());
			}
			else {
				$nbResa = $billetterie->getNbTickets();
				$nbBdd = $compteur->getNombre();
				$nbTotal = $nbResa+$nbBdd;
				if ($nbTotal > 1000) {
					return $this->render('JVCoreBundle:Billetterie:reservation.html.twig', array(
					  	'billetterie' => $billetterie,
						'form' => $form->createView(),
					));
				}
				else {
					$compteur->setNombre($nbTotal);
				}
			}
			
			//$billetterie->setCodeReservation('ESSAI0000');
			// On enregistre notre objet $billetterie dans la base de données
			$em = $this->getDoctrine()->getManager();
			$em->persist($compteur);
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
/*
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
		
*/
		return $this->render('JVCoreBundle:Billetterie:paiement.html.twig', array(
			'billetterie' => $billetterie,
			//'form' => $form->createView(),
		));
		
	}
	
	public function checkoutAction($id, Request $request, \Swift_Mailer $mailer)
    {
        $billetterie = $this->getDoctrine()
  			->getManager()
  			->getRepository('JVCoreBundle:Billetterie')
  			->find($id)
		;
		
		if (null === $billetterie) {
			throw new NotFoundHttpException("La réservation d'id ".$id." n'existe pas.");
		}
		
		\Stripe\Stripe::setApiKey("sk_test_qrE9oszVPUZtg6BNexIhTSvB");

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $billetterie->getMontant()*100, // Amount in cents
                "currency" => "eur",
                "source" => $token,
                "description" => "Paiement Stripe - Musée du Louvre"
            ));
            $this->addFlash("success","Bravo ça marche !");
			
			// Envoi d'un email
			$email = $billetterie->getEmail();
			$message = (new \Swift_Message('Hello Email'))
				->setSubject('Confirmation de votre commande')
				->setFrom('contact@louvre.fr')
				->setTo($email)
				->setBody(
					$this->renderView(
						'JVCoreBundle:Billetterie:mail.html.twig', array(
							'billetterie' => $billetterie,)
					),
					'text/html'
				)
			;

			$mailer->send($message);
		
            return $this->redirectToRoute("jv_corebundle_confirmation", array('id'=>$billetterie->getId()));
			
			
        } catch(\Stripe\Error\Card $e) {

            $this->addFlash("error","Snif ça marche pas :(");
            return $this->redirectToRoute("jv_corebundle_paiement", array('id'=>$billetterie->getId()));
            // The card has been declined
        }
    }
	

  	public function confirmationAction($id, Request $request)
	{
		$session = $request->getSession();
		
		$billetterie = $this->getDoctrine()
  			->getManager()
  			->getRepository('JVCoreBundle:Billetterie')
  			->find($id)
		;
		
		if (null === $billetterie) {
			throw new NotFoundHttpException("La réservation d'id ".$id." n'existe pas.");
		}
		
		$email = $billetterie->getEmail();
		
		$message = \Swift_Message::newInstance()
			->setSubject('Confirmation de votre commande')
			->setFrom(['contact@louvre.fr' => 'Musée du Louvre'])
			->setTo($email)
			->setBody($this->renderView(
				'Emails/mail.html.twig', array(
					'billetterie' => $billetterie,)
				),
				'text/html'
			)
		;
		
		$this->get('mailer')->send($message);
		
		$session->getFlashBag()->add('success', 'Votre commande est validée avec succes');
		
		return $this->redirectToRoute('jv_core_coordonnees', array('id'=>$billetterie->getId()));
	}
}


