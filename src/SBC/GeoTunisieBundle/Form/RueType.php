<?php

namespace SBC\GeoTunisieBundle\Form;

use SBC\GeoTunisieBundle\Entity\Localite;
use SBC\GeoTunisieBundle\Entity\Rue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('localite', EntityType::class, array(
                    'class' => Localite::class,
                    'attr' => array(
                        'required' => true
                    )
//                ,
//                    'placeholder' => 'Choisir une localité',
//                    'empty_data' => null
                )
            )
//            ->add('save', SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Rue::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_geotunisiebundle_rue';
    }


}
