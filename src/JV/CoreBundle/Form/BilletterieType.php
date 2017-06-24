<?php

namespace JV\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
				'widget' => 'single_text',
				'format' => 'dd-MM-yyyy',
				'html5' => false,
				'attr'=> array(
					'class' => 'form-control input-inline',
					'readonly' => true,
					 'data-date-format' => 'dd-mm-yyyy',)
				)
			)
			->add('journee', 		ChoiceType::class, array(
				'choices' => array('Journée' => true, 'Demi-journée' => false,),
				'expanded' => true,
				'multiple' => false,
			))
			->add('nbTicketNormal', IntegerType::class)
			->add('nbTicketEnfant',	IntegerType::class)
			->add('nbTicketSenior',	IntegerType::class)
			->add('nbTicketReduit',	IntegerType::class)
			->add('validation',     SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JV\CoreBundle\Entity\Billetterie'
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
