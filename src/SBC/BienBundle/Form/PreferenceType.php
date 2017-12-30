<?php

namespace SBC\BienBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PreferenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('lundi', CheckboxType::class, array(
            'required'=>false,
            'attr' => array(
                'data-md-icheck'=>''
            )
        ))->add('mardi', CheckboxType::class, array(
            'required'=>false,
            'attr' => array(
                'data-md-icheck'=>''
            )
        ))->add('mercredi', CheckboxType::class, array(
            'required'=>false,
            'attr' => array(
                'data-md-icheck'=>''
            )
        ))->add('jeudi', CheckboxType::class, array(
            'required'=>false,
            'attr' => array(
                'data-md-icheck'=>''
            )
        ))->add('vendredi', CheckboxType::class, array(
            'required'=>false,
            'attr' => array(
                'data-md-icheck'=>''
            )
        ))->add('samedi', CheckboxType::class, array(
            'required'=>false,
            'attr' => array(
                'data-md-icheck'=>''
            )
        ))->add('dimanche', CheckboxType::class, array(
            'required'=>false,
            'attr' => array(
                'data-md-icheck'=>''
            )
        ))
        ->add('note' , TextareaType::class,array(
            'required'=>false,
            'attr'=>array(
                'class'=>'md-input'
            )
        )
        )->add('heure',TimeType::class)
            ->add('heureFin',TimeType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\Preference'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_preference';
    }


}
