<?php

namespace SBC\GeoTunisieBundle\Form;

use SBC\GeoTunisieBundle\Entity\Gouvernorat;
use SBC\GeoTunisieBundle\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VilleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('postCode')
            ->add('gouvernorat', EntityType::class, array(
                    'class' => Gouvernorat::class,
                    'attr' => array(
                        'required' => true
                    )
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Ville::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_geotunisiebundle_ville';
    }


}
