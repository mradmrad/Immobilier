<?php

namespace SBC\BienBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CanalisationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('steg',ChoiceType::class,array(
            'choices' => array(
                'oui' => 'oui',
                'non' => 'non',
                'autre'=> 'autre'
            ),
//            'attr' => array(
//                'class' => 'md-input'
//            ),
            'choice_attr' => function () {
                return ['data-md-icheck' => ''];
            },
            'expanded'=>true
        ))
            ->add('sonede',ChoiceType::class,array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                    'autre'=> 'autre'
                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
//                'attr' => array(
//                    'class' => 'md-input'
//                ),
                'expanded'=>true
            ))
            ->add('gaz',ChoiceType::class,array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                    'autre'=> 'autre'
                ),
//                'attr' => array(
//                    'class' => 'md-input'
//                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded'=>true
            ))
            ->add('onas',ChoiceType::class,array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                    'autre'=> 'autre'
                ),
//                'attr' => array(
//                    'class' => 'md-input'
//                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded'=>true
            ))
            ->add('eclairage',ChoiceType::class,array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                    'autre'=> 'autre'
                ),
//                'attr' => array(
//                    'class' => 'md-input'
//                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded'=>true
            ))
            ->add('telephone',ChoiceType::class,array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                    'autre'=> 'autre'
                ),
//                'attr' => array(
//                    'class' => 'md-input'
//                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded'=>true
            ))
            ->add('route',ChoiceType::class,array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                    'autre'=> 'autre'
                ),
//                'attr' => array(
//                    'class' => 'md-input'
//                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded'=>true
            ))
            ->add('trottoir',ChoiceType::class,array(
                    'choices' => array(
                        'oui' => 'oui',
                        'non' => 'non',
                        'autre'=> 'autre'
                    ),
//                    'attr' => array(
//                        'class' => 'md-input'
//                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded'=>true
                )

            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\Canalisation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_canalisation';
    }


}
