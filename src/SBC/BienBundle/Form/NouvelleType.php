<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\Agency;
use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Entity\BienPicture;
use SBC\BienBundle\Entity\Equipement;
use SBC\BienBundle\Entity\TypeBien;
use SBC\GeoTunisieBundle\Entity\Adresse;
use SBC\PersonnelBundle\Entity\Personnel;
use SBC\PersonnelBundle\PersonnelBundle;
use SBC\TiersBundle\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NouvelleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Nouvelle confirmée' => Bien::NOUVELLE_CONFIRMEE,
                    'Nouvelle non confirmée' => Bien::NOUVELLE_NON_CONFIRMEE,
                ),
                'placeholder' => '',
                'empty_data' => null,
//                'required' => true,
                'attr' => array(
                    'class' => 'md-input',
                    'style' => 'width:100%',
                    'data-md-selectize' => '',
                    'onchange' => 'reset_parsley()'
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
            'data_class' => Bien::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_nouvelle';
    }

 public function getParent()
    {
        return BienType::class;
    }

}
