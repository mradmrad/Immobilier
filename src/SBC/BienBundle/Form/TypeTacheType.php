<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\TypeTache;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeTacheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('icon', ChoiceType::class, array(
                    'choices' => array(
//                        appel
                        'Appel effectué' => 'phone',
                        'Le client ne répond pas' => 'ring_volume',

//                        mail
                        'Email' => 'email',
                        //rappel
                        'Rappel' => 'alarm_add',
                        //rappel
                        'ContactDirect' => 'nature_people',

                    ),
                    'choice_attr' => function($choice, $key, $index) {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => '')

                )
            )
//            ->add('category', ChoiceType::class, array(
//                    'choices' => array(
//                        'Téléphone' => 'Achat',
//                        'Location' => 'Location',
//                    ),
//
//                    'placeholder' => 'Choisir la catégorie de cette tache',
//                    'empty_data' => null
//                )
//            )
            ->add('showCalendar', CheckboxType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-md-icheck'=>''
                    )
                )
            )
            ->add('class', ChoiceType::class, array(
                    'choices' => array(
                        'Rouge' => 'danger',
                        'Verte' => 'success',
                        'Orangée' => 'warning',
                        'Grise' => '',
                        'Bleue' => 'primary',
                    ),
                    'placeholder' => 'Choisir la couleur        ',
                    'empty_data' => null,
                    'required' => false,
                )
            )
            ->add('title')
            ->add('save',SubmitType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => TypeTache::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_typetache';
    }

}
