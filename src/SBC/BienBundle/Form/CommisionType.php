<?php

namespace SBC\BienBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommisionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('commisionPercent',TextType::class,array(
            'required' => false,
            'attr' => array(
                'style' => 'width : 30px'
//                'class' => 'md-input',
            )
        ))
            ->add('comissionHt',ChoiceType::class,array(
                'choices' => array(
                  'HT' => true,
                    'TTC' => false
                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded' => true,
                'attr' => array('data-md-icheck' => ''),
                'required' => false,
                'placeholder' => false
            ))
//            ->add('comissionTtc',TextType::class,array(
//                'attr' => array(
////                    'class' => 'md-input',
//                )
//            ))
            ->add('remise',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px'
//                    'class' => 'md-input',
                )
            ))
            ->add('montant',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                    'placeholder' => 'en chiffres'
                )
            ))
            ->add('montantLettres',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                    'placeholder' => 'en lettres'
                )
            ))
            ->add('coordiantriceNom',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('coordiantricePercent',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px'
//                    'class' => 'md-input',
                )
            ))
            ->add('coordiantriceMontant',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('marketingNom',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('marketingPercent',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px'
//                    'class' => 'md-input',
                )
            ))
            ->add('marketingMontant',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('responsableNom',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('responsablePercent',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px'
//                    'class' => 'md-input',
                )
            ))
            ->add('responsableMontant',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('responsablepNom',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('responsablepPercent',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px'
//                    'class' => 'md-input',
                )
            ))
            ->add('responsablepMontant',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('superviseurNom',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('superviseurPercent',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px'
//                    'class' => 'md-input',
                )
            ))
            ->add('superviseurMontant',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('responsablemNom',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('responsablemPercent',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px'
//                    'class' => 'md-input',
                )
            ))
            ->add('responsablemMontant',TextType::class,array(
                'required' => false,
                'attr' => array(
//                    'class' => 'md-input',
                )
            ))
            ->add('intervenantNom',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                )
            ))
            ->add('intervenantPercent',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'style' => 'width : 30px',
//                    'class' => 'md-input',
                    'placeholder' => '%'
                )
            ))
            ->add('intervenantHt',ChoiceType::class,array(
                'choices' => array(
                    'HT' => true,
                    'TTC' => false
                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded' => true,
                'attr' => array('data-md-icheck' => ''),
                'required' => false,
                'placeholder' => false
            ))

            ->add('intervenantMontant',TextType::class,array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input',
                    'placeholder' => 'Le montant'
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\Commision'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_commision';
    }


}
