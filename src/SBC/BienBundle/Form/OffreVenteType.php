<?php

namespace SBC\BienBundle\Form;

use SBC\UtilsBundle\Utils\DateTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreVenteType extends OffreType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder,$options);
        $builder->add('avance',TextType::class,array(
            'required' => false ,
            'attr' => array(
                'style' => 'width : 10%',
//                'class' => 'md-input',
                'data-name' => 'avance'
            )
        ))
            ->add('avanceType',ChoiceType::class,array(
                    'choices' => array(
                        'Espèce' => 'Espèce',
                        'Chèque' => 'Chèque'
                    ),
//                    'choice_attr' => function () {
//                        return ['data-md-icheck' => ''];
//                    },
                    'expanded' => true,
                    'attr' => array(
//                        'data-md-icheck' => '',
                        'data-name' => 'avanceType'),
                    'required' => false,
                    'placeholder' => false

            ))
            ->add('soldeType',ChoiceType::class,array(
                'choices' => array(
                    'Espèce' => 'Espèce',
                    'Chèque' => 'Chèque'
                ),
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                },
                'expanded' => true,
                'attr' => array(
//                    'data-md-icheck' => '',
                    'data-name' => 'soldeType'),
                'required' => false,
                'placeholder' => false

            ))
            ->add('modalite',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'modalite',
                    'style'=> 'width : 60%'
                )
            ))
            ->add('acteMin',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'acteMin',
                    'style' => 'width : 4%'
                )
            ))
            ->add('acteMax',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'acteMax',
                    'style' => 'width : 4%'
                )
            ))
            ->add('consigne',ChoiceType::class,array(
                'choices' => array(
                    'A la signature du contrat' => 'A la signature du contrat',
                    'Le' => 'Le',
                    'Occupé du locataire avec l\'accord de l\'acheteur tout en respectant le contrat de location en cours'
                    =>'Occupé du locataire avec l\'accord de l\'acheteur tout en respectant le contrat de location en cours',

                ),
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                },
                'expanded' => true,
                'attr' => array(
//                    'data-md-icheck' => '',
                    'data-name' => 'consigne'),
                'required' => false,
                'placeholder' => false

            ))
            ->add($builder
                ->create('consigneDate', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
//                    'class' => 'md-input',
                    'data-name' => 'consigneDate'
                ),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add('conditions',TextType::class,array(
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'conditions',
                    'style' => 'width : 90%'
                )
            ))
            ->add('proposedPrice',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'proposedPrice'
                )
            ))
            ->add('proposedPriceText',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'proposedPriceText',
                    'style' => 'width : 90%'
                )
            ))
            ->add('honorairesTTC',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'honorairesTTC'
                )
            ))
            ->add('honorairesHT',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'honorairesHT'
                )
            ))
            ->add('acompteTTC',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'acompteTTC'
                )
            ))
            ->add('acompteHT',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'acompteHT'
                )
            ));
    }
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $choices = $view->children['consigne']->children;
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'consigne_'.$key;
        }
        $view->children['consigne']->chidren = $choices;


    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\OffreVente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_offrevente';
    }


}
