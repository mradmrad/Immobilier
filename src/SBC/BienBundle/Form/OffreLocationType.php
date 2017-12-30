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

class OffreLocationType extends OffreType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder,$options);
        $builder->add('contratType',TextType::class,array(
            'required' => false ,
            'attr' => array(
//                'class' => 'md-input',
                'data-name' => 'contratType'
            )
        ))
            ->add('usage',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'usage'
                )
            ))
            ->add('loyerHT',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'loyerHT'
                )
            ))
            ->add('loyerTTC',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'loyerTTC'
                )
            ))
            ->add('retenue',ChoiceType::class,array(
                'choices' => array(
                    'A la charge du propriétaire des murs' => 'A la charge du propriétaire des murs',
                    'A la charge du locataire' => 'A la charge du locataire'
                ),
                'expanded' => true,
                'attr' => array(
                    'data-name' => 'retenue'),
                'required' => false,
                'placeholder' => false
            ))
            ->add('modalite',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'modalite'
                )
            ))
            ->add('modalitePer',ChoiceType::class,array(
                'choices' => array(
                    'mois' => 'mois',
                    'trimestre' => 'trimestre',
                    'semestre' => 'semestre',
                    'année' => 'année'
                ),
                'expanded' => true,
                'attr' => array(
                    'data-name' => 'modalitePer'),
                'required' => false,
                'placeholder' => false
            ))
            ->add('garantie',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'garantie'
                )
            ))
            ->add('augmentation',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'augmentation'
                )
            ))
            ->add('augmentationPer',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'augmentationPer'
                )
            ))
            ->add($builder
                ->create('entryDate', TextType::class, array(
                    'attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
//                    'class' => 'md-input',
                    'data-name' => 'entryDate'
                ),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add('entry',ChoiceType::class,array(
                'choices' => array(
                    'mois' => 'mois',
                    'trimestre' => 'trimestre',
                    'semestre' => 'semestre',
                    'année' => 'année'
                ),
                'expanded' => true,
                'attr' => array(
                    'data-name' => 'entry'),
                'required' => false,
                'placeholder' => false
            ))
            ->add('prixDEHT',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'prixDEHT'
                )
            ))
            ->add('entryDETTC',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'entryDETTC'
                )
            ))
            ->add('moyenDE',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'moyenDE'
                )
            ))
            ->add('moyenDEType',ChoiceType::class,array(
                'choices' => array(
                    'chèque' => 'chèque',
                    'espèce' => 'espèce',
                ),
                'expanded' => true,
                'attr' => array(
                    'data-name' => 'moyenDEType'),
                'required' => false,
                'placeholder' => false
            ))
            ->add('avanceDE',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'avanceDE'
                )
            ))
            ->add('avanceType',ChoiceType::class,array(
                'choices' => array(
                    'mois' => 'mois',
                    'trimestre' => 'trimestre',
                    'semestre' => 'semestre',
                    'année' => 'année'
                ),
                'expanded' => true,
                'attr' => array(
                    'data-name' => 'avanceType'),
                'required' => false,
                'placeholder' => false
            ))
            ->add('modaliteDE',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'modaliteDE'
                )
            ))
            ->add('conditionDE',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'conditionDE'
                )
            ))
            ->add('irrevocabilite',TextType::class,array(
                'required' => false ,
                'attr' => array(
//                'class' => 'md-input',
                    'data-name' => 'irrevocabilite'
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
        $choices = $view->children['retenue']->children;
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'retenue_'.$key;
        }
        $view->children['retenue']->chidren = $choices;

        $choices = $view->children['modalitePer']->children;
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'modalitePer_'.$key;
        }
        $view->children['modalitePer']->chidren = $choices;

        $choices = $view->children['entry']->children;
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'entry_'.$key;
        }
        $view->children['entry']->chidren = $choices;

        $choices = $view->children['moyenDEType']->children;
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'moyenDEType_'.$key;
        }
        $view->children['moyenDEType']->chidren = $choices;

        $choices = $view->children['avanceType']->children;
        foreach ($choices as $key => $choice){

            $choice->vars['attr']['data-name'] = 'avanceType_'.$key;
        }
        $view->children['avanceType']->chidren = $choices;


    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\OffreLocation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_offrelocation';
    }


}
