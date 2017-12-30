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

class AcceptationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class,array(
            'required' => false ,
            'attr' => array(
//                'class' => 'md-input',
                'data-name' => 'name',
            )
        ))
            ->add('identity',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'identity'
                )
            ))
            ->add($builder
                ->create('delivered', TextType::class, array('attr' => array(

                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
//                    'class' => 'md-input',
                    'data-name' => 'delivered'
                ),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add('quality',ChoiceType::class,array(
                'choices' => array(
                    'Déclare etre Propriétaire' => 'Déclare etre Propriétaire',
                    'En qualité de' => 'En qualité de',

                ),
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                },
                'expanded' => true,
                'attr' => array(
                    'style' => '100%',
//                    'data-md-icheck' => ''
                'data-name' => 'quality'),
                'required' => false,
                'placeholder' => false
            ))
            ->add('society',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'society'
                )
            ))
            ->add('account',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'account'
                )
            ))
            ->add('acte',ChoiceType::class,array(
                'choices' => array(
                    'L\'accepter intégralement' => 'L\'accepter intégralement',
                    'La refuser' => 'La refuser',
                    'L\'accepter sous réserve' => 'L\'accepter sous réserve',
                    'Contre-offre suivante' => 'Contre offre suivante'
                ),
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                },
                'expanded' => true,
                'attr' => array(
//                    'data-md-icheck' => '',
//                    'data-name' => 'acte'
                ),
                'required' => false,
                'placeholder' => false
            ))
            ->add('reserve',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'reserve'
                )
            ))
            ->add('contreOffre',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'contreOffre'
                )
            ))
            ->add('nameO',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'nameO'
                )
            ))
            ->add('identityO',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'identityO'
                )
            ))
            ->add($builder
                ->create('deliveredO', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
//                    'class' => 'md-input',
                    'data-name' => 'deliveredO'
                ),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add('qualityO',ChoiceType::class,array(
                'choices' => array(
                    'Déclare etre Propriétaire' => 'Déclare etre Propriétaire',
                    'En qualité de' => 'En qualité de',
                ),
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                },
                'expanded' => true,
                'attr' => array(
//                    'data-md-icheck' => '',
                    'data-name' => 'qualityO'),
                'required' => false,
                'placeholder' => false
            ))
            ->add('societyO',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'societyO'
                )
            ))
            ->add('accountO',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'accountO'
                )
            ))
            ->add('acteO',ChoiceType::class,array(
                'choices' => array(
                    'L\'accepter intégralement' => 'L\'accepter intégralement',
                    'La refuser' => 'La refuser',
                    'L\'accepter sous réserve' => 'L\'accepter sous réserve',
                    'Contre-offre suivante' => 'Contre offre suivante'
                ),
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                },

                'attr' => array(
//                    'data-md-icheck' => '',
                    'data-name' => 'acteO'),
                'expanded' => true,
                'required' => false,
                'placeholder' => false
            ))
            ->add('reserveO',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'reserveO'
                )
            ))
            ->add('contreOffreO',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                    'class' => 'md-input',
                    'data-name' => 'contreOffreO'
                )
            ));
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $choices = $view->children['acte']->children;
//        die(var_dump($choices));
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'radio_'.$key;
        }
        $view->children['acte']->chidren = $choices;
        $choices = $view->children['acteO']->children;
//        die(var_dump($choices));
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'radioO_'.$key;
        }
        $view->children['acteO']->chidren = $choices;

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\Acceptation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_acceptation';
    }


}
