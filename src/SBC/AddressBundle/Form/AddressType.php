<?php

namespace SBC\AddressBundle\Form;

use SBC\AddressBundle\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('title')
            ->add('address', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            )
            )
            ->add('city', TextType::class, array(
                    'attr' => array(
                        'class' => 'md-input'
                    )
                )
            )
            ->add('governorate', TextType::class, array(
                    'attr' => array(
                        'class' => 'md-input'
                    )
                )
            )
            ->add('zipCode', TextType::class, array(
                    'attr' => array(
                        'class' => 'md-input'
                    )
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
            'data_class' => Address::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_addressbundle_address';
    }


}
