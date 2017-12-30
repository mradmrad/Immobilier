<?php

namespace SBC\BienBundle\Form;


use SBC\BienBundle\Entity\Agency;
use SBC\BienBundle\Entity\Goal;
use SBC\PersonnelBundle\Entity\Personnel;
use SBC\UtilsBundle\Utils\DateTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add($builder
                ->create('beginDate', TextType::class, array(
                    'attr' => array(
                        'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
                        'class' => 'md-input uk-form-width-small',
                        'data-parsley-begin' => ''
                    )
                ))
                ->addModelTransformer(new DateTransformer('d/m/Y'))
            )

            ->add($builder
                ->create('finishDate', TextType::class, array(
                    'attr' => array(
                        'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
                        'class' => 'md-input uk-form-width-small',
                        'data-parsley-finish' => ''
                    )
                ))
                ->addModelTransformer(new DateTransformer('d/m/Y'))
            )

            ->add('code', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input',
                    'data-parsley-code' => ''
                )
            ))
            ->add('rechercheGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                ,
                    'data-parsley-goalfor' => ''
                )
            ))
            ->add('nouvelleGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('acquisitionGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('mandatVenteGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))

            ->add('mandatLocationGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('requeteGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('transactionVenteGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('transactionLocationGoal', IntegerType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('agency', EntityType::class, array(
                'class' => Agency::class,
                'placeholder' => 'Choisir une agence',
                'empty_data' => null,
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => ''
                )

            ))
            ->add('goalFor', EntityType::class, array(
                'class' => Personnel::class,
                'placeholder' => 'Objectif pour ...',
                'empty_data' => null,
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => ''
                )

            ))
            ->add('save',SubmitType::class, array(
                'attr' => array(
                    'class' => 'md-btn md-btn-primary'
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
            'data_class' => Goal::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_goal';
    }


}
