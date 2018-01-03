<?php

namespace SBC\TiersBundle\Form;

use Symfony\Component\Form\AbstractType;
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
//            ->add('title', TextType::class, array(
//                'required' => true,
//                'attr' => array(
//                    'class' => 'md-input',
//                )
//            ))
            ->add('address', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                )
            ))
            ->add('city', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                )
            ))
            ->add('governorate', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                )
            ))
            ->add('zipCode', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
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
            'data_class' => 'SBC\TiersBundle\Entity\Address'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_tiersbundle_address';
    }


}
