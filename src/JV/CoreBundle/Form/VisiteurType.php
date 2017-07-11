<?php

namespace JV\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisiteurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('nom',			TextType::class, array(
				'label' => 'Nom : ',
				'attr' => array(
					'class' => 'col-md-6',)
				)
			)
			->add('prenom',			TextType::class, array(
				'label' => 'Prénom : ',
				'attr' => array(
					'class' => 'col-md-6',)
				)
			)
			->add('pays',			TextType::class, array(
				'label' => 'Pays : ',
				'attr' => array(
					'class' => 'col-md-6',)
				)
			)
			->add('dateNaissance',	BirthdayType::class, array(
				'label' => 'Date de naissance : ',
				'attr' => array(
					'class' => 'col-md-6',
					'placeholder' => 'jj/mm/aaaa',
				),				
				'format' => 'dd/MM/yyyy',
				'widget' => 'single_text',
				)
			)
			->add('ticket',			TextType::class, array(
				'label' => 'Ticket : ',	
				'attr' => array(
					'class' => 'col-md-6',
					'id' => 'ticket',
					'readonly' => true,)
				)
			)
			->add('prix',			IntegerType::class, array(
				'label' => 'Prix : ',	
				'attr' => array(
					'class' => 'col-md-6',
					'id' => 'prix',
					'readonly' => true,)
				)
			);		
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JV\CoreBundle\Entity\Visiteur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jv_corebundle_visiteur';
    }


}
