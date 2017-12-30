<?php

namespace SBC\GeoTunisieBundle\Form;

use SBC\GeoTunisieBundle\Entity\Adresse;
use SBC\GeoTunisieBundle\Entity\Rue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AdresseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('rue',
                EntityType::class, array(
                    'class' => Rue::class,
                    'attr' => array(
                        'required' => true
                    ),
                    'placeholder' => 'Choisir une rue',
                    'empty_data' => null,

                )
            )
           ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Adresse::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_geotunisiebundle_adresse';
    }


}
