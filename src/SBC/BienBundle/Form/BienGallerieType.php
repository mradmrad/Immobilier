<?php

namespace SBC\BienBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienGallerieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description',TextType::class,array(
         'attr' => array(
             'class' => 'md-input',
             'data-name' => 'bigDesciption',
             'placeholder' => 'Veuillez entrer votre texte ici'
         )
        ))
            ->add(
            'pictures',CollectionType::class,array(
                'entry_type'=>BienPictureType::class,
                'allow_add'=>true,
                'prototype_name' =>'__second__'
                )
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\BienGallerie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_biengallerie';
    }


}
