<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\EnQualiteDe;
use SBC\TiersBundle\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnQualiteDeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('representant', EntityType::class, array(
                'placeholder' => '',
                'class' => Client::class,
                'attr' => array(
                    'data-name' => 'representant',
                    'class' => 'kendoComboBox select',
                    'style' => 'width:100%'
                )
            ))
            ->add('client', EntityType::class, array(
                'placeholder' => '',
                'class' => Client::class,
                'attr' => array(
                    'data-name' => 'client',
                    'class' => 'kendoComboBox select',
                    'style' => 'width:100%'
                )
            ))
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => EnQualiteDe::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_enqualitede';
    }


}
