<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\Offre;
use SBC\TiersBundle\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('code', TextType::class, array(
                    'required' => false ,
                    'attr' => array(
                        'class' => 'md-input',
                        'data-name' => 'code'
                    ))
            )
            ->add('proposedBy', EntityType::class, array(
                'class' => Client::class,
                'placeholder' => 'Choisir le client',
                'empty_data' => null,
                'attr' => array(
                    'class' => 'kendoComboBox select',
                    'style' => 'width:100%',
                    'data-name' => 'proposedBy'
                )

            ))
        ->add('acceptation',AcceptationType::class,array(
        ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Offre::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_offre';
    }


}
