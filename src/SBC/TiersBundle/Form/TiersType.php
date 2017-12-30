<?php

namespace SBC\TiersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TiersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))

            ->add('denomination', TextType::class, array(
                'required' => true,
                'attr' => array(
                    'class' => 'md-input',
                    'onchange'=> 'fill_labels()'
                )
            ))
            ->add('prenom', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                    'onchange'=> 'fill_labels()'
                )
            ))
            ->add('identifier', TextType::class, array(

                'required' => false,
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
//            ->add('activity', TextType::class, array(
//                'required' => false,
//                'attr' => array(
//                    'class' => 'md-input'
//                )
//            ))
            ->add('fax', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('tel', TextType::class, array(
                'required' => true,
                'attr' => array(
                    'class' => 'md-input',
                    'onchange'=> 'fill_labels()'
                )
            ))
            ->add('website', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                    'onchange'=> 'fill_labels()'
                )
            ))
            ->add('mainAddress', AddressType::class)
            ->add('moreInformations', TextareaType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input'
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
            'data_class' => 'SBC\TiersBundle\Entity\Tiers'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_tiersbundle_tiers';
    }


}
