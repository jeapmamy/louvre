<?php

namespace JV\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BilletterieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('dateReservation',DateType::class, array(
				'widget' 	=> 'single_text',
				'format' 	=> 'dd/MM/yyyy',
				'html5' 	=> false,
				'attr'		=> array(
					'class' 	=> 'form-control input-inline',
					'readonly' 	=> true,)
				)
			)
			->add('journee', 		ChoiceType::class, array(
				'choices' 	=> array('Journée' => true, 'Demi-journée' => false,),
				'expanded' 	=> true,
				'multiple' 	=> false,
				)
			)
			->add('nbTicketNormal', IntegerType::class)
			->add('nbTicketEnfant',	IntegerType::class)
			->add('nbTicketSenior',	IntegerType::class)
			->add('nbTicketReduit',	IntegerType::class)
			->add('nbTickets',		IntegerType::class, array(
				'attr' => array(
					'readonly' 	=> true,)
				)
			)
			->add('montant',		IntegerType::class, array(
				'attr' => array(
					'readonly' 	=> true,)
				)
			)
			->add('email',			EmailType::class)
			->add('visiteurs',		CollectionType::class, array(
				'entry_type' 	=> VisiteurType::class,
				'label'			=> false,
				'allow_add'  	=> true,
				'allow_delete' 	=> true,
				'by_reference' 	=> false,
				)
			)
			->add('validation',     SubmitType::class)
		;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' 	=> 'JV\CoreBundle\Entity\Billetterie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jv_corebundle_billetterie';
    }


}
