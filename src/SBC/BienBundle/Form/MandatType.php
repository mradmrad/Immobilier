<?php

namespace SBC\BienBundle\Form;


use Doctrine\ORM\EntityRepository;
use SBC\BienBundle\Entity\Acquisition;
use SBC\BienBundle\Entity\Mandat;
use SBC\BienBundle\Entity\Origine;
use SBC\UtilsBundle\Utils\DateTransformer;
use SBC\UtilsBundle\Utils\MoneyTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MandatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', TextType::class, array('attr' => array(
                'class' => 'md-input',
                'data-parsley-numero' => '3'
            )))
//            ->add('titre', TextType::class, array('attr' => array(
//                'class' => 'md-input'
//            )))
//            ->add('provenance', TextType::class, array('attr' => array(
//                'class' => 'md-input'
//            )))
            ->add('usage', TextType::class, array('attr' => array(
                'class' => 'md-input'
            ),
                'required' => false))
//            ->add('isConforme', ChoiceType::class, array(
//                'choices' => array(
//                    'Conforme aux normes de construction et d\'urbanisme en vigeur' => true,
//                    'Non conforme aux normes de construction d\'urbanisme' => false
//                ),
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                },
//
//                'expanded' => true,
//
//                'attr' => array('data-md-icheck' => '')
//            ))
//            ->add('isNotConformeFor', TextType::class, array('attr' => array(
//                'class' => 'md-input',
//                'required' => false
//            )))
            ->add('hypotheque', ChoiceType::class, array(
                'choices' => array(
                    'Libre de toute hypothèque' => 'Libre de toute hypothèque',
                    'Hypothèque de ' => 'Hypothèque de'
                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded' => true,
                'attr' => array('data-md-icheck' => ''),
                'required' => false,
                'placeholder' => false
            ))
            ->add('hypothequeFor', TextType::class, array('attr' => array(
                'class' => 'md-input'
            ),
                'required' => false))

            ->add($builder
                ->create('fraisDeCorporite', TextType::class, array('attr' => array(
                    'class' => 'md-input money'),
                    'required' => false))
                ->addModelTransformer(new MoneyTransformer()
                )
            )
            ->add('periodeFraisDeCorporite', ChoiceType::class, array(
                    'choices' => array(
                        'Mois' => 'Mois',
                        'Trimestre' => 'Trimestre',
                        'Semestre' => 'Semestre',
                        'Année' => 'Année'
                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
//            ->add($builder
//                ->create('prixDeVenteDemande', TextType::class, array('attr' => array(
//                    'class' => 'md-input money'),
//                    'required' => false))
//                ->addModelTransformer(new MoneyTransformer()
//                )
//            )
//            ->add('prixDeVenteDemandeTexte', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
//                ),
//                    'required' => false
//                )
//            )

            ->add(
                'avance', TextType::class, array(
                    'attr' => array(
                        'style' => 'width:20px'
                    ),
                    'required' => false
                )
            )
            ->add(
               'intervalMinSignatureActe', TextType::class, array(
                            'attr' => array(
                                'style' => 'width:20px'
                            ),
                            'required' => false
                        )
            )
            ->add(
               'intervalMaxSignatureActe', TextType::class, array(
                            'attr' => array(
                                'style' => 'width:20px'
                            ),
                            'required' => false
                        )
            )
            ->add('consigne', ChoiceType::class, array(
                    'choices' => array(
                        'A la signature du contrat' => 'A la signature du contrat',
                        'Le' => 'Le'
                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add($builder
                ->create('dateDebutEffetMandat', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
                    'class' => 'md-input',
                        'onchange'=> 'dateStart()'),
                    'required' => false,

                    )
                )
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add($builder
                ->create('dateExpirationEffetMandat', TextType::class, array(
                    'attr' => array(
                        'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input',
                    'onchange'=> 'dateEnd()'),
                        'required' => false,

                    )
                )
                ->addModelTransformer(new DateTransformer('d/m/Y')
                )
            )
            ->add('resoluOuRenouvele', ChoiceType::class, array(
                    'choices' => array(
                        'Résolu' => 'Résolu',
                        'Tacitement renouvelable' => 'Tacitement renouvelable'
                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('propositions', CollectionType::class, array(
                'entry_type' => OffreVenteType::class,
                'allow_add' => true,
                'by_reference' => false,
                'attr' => array(
                    'class' => 'uk-grid',
                    'data-uk-grid-margin' => ''
                )
            ))
            ->add('propositionsLocation', CollectionType::class, array(
                'entry_type' => OffreLocationType::class,
                'allow_add' => true,
                'by_reference' => false,
                'attr' => array(
                    'class' => 'uk-grid',
                    'data-uk-grid-margin' => ''
                )
            ))
            ->add('origine', ChoiceType::class,array(
                'choices' => array(
                    'Agence' => 'Agence',
                    'Recherche' => 'Recherche'
                ),
                'attr'=> array(
                    'data-md-selectize' => 'data-md-selectize'
                )
            ))
            ->add('isExclusif', ChoiceType::class, array(
                    'choices' => array(
                        'Exclusif' => true,
                        'Non exclusif' => false),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
//            ->add('autresPromotion', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
//                ),
//                    'required' => false,
//                )
//            )
            ->add('visite', ChoiceType::class, array(
                    'choices' => array(
                        'Immediate' => 'Immediate',
                        'A partir du' => 'A partir du',
                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )

//            ->add($builder
//                ->create('montantHonoraireAgent', TextType::class, array('attr' => array(
//                    'class' => 'md-input money')))
//                ->addModelTransformer(new MoneyTransformer()
//                )
//            )
//            ->add('montantHonoraireAgentTexte', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
//                )
//                )
//            )
//            ->add('note')
//            ->add('faitA', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
//                )
//                )
//            )
            ->add($builder
                ->create('contactVisite', TextType::class, array('attr' => array(
                        'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input'),
                        'required' => false
                    )
                )
                ->addModelTransformer(new DateTransformer('d/m/Y'))
            )
//            ->add($builder
//                ->create('faitLe', TextType::class, array('attr' => array(
//                        'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input')
//                    )
//                )
//                ->addModelTransformer(new DateTransformer('d/m/Y'))
//            )
//            ->add('acquisition', null, array(
//
//                    'attr' => array(
//                        'class' => 'kendoComboBox select',
//                        'style' => 'width:100%'
//                    ),
//                    'required' => false
//                )
//            )
            ->add('typeMandat', null, array(
                    'attr' => array(
                        'class' => 'md-input',
                        'data-md-selectize' => '',
                        'data-md-selectize-bottom'=> '',
                        'onchange' => 'mandatType()'
                    ),
                    'placeholder' => '',
                    'required' => false
                )
            )

            ->add(
                'payementLe', TextType::class, array(
                            'attr' => array(
                                'style' => 'width : 20px'
                            ),
                            'required' => false



                    )
            )
            ->add('loyeDe', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('typeContrat', TextType::class, array('attr' => array(
                    'class' => 'md-input',

                ),
                    'required' => false
                )
            )
            ->add('retenueSource', ChoiceType::class, array(
                'choices'=>array(
                    'A la charge du propriétaire' => 'A la charge du propriétaire',
                    'A la charge du locataire' => 'A la charge du locataire'
                ),
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                },
                'expanded' => true,
                'attr' => array('data-md-icheck' => ''),
                'required' => false,
                'placeholder' => false
                )
            )
            ->add('modalitePaiement', ChoiceType::class, array(
                    'choices'=>array(
                        'mois' => 'mois',
                        'trimestre' => 'trimestre',
                        'semestre' => 'semestre' ,
                        'année' => 'année'
                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('caution', TextType::class, array('attr' => array(
                    'class' => 'md-input',

                ),
                    'required' => false
                )
            )
            ->add('augmentationTaux', TextType::class, array('attr' => array(
                    'style' => 'width : 20px'
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('augmentationPer', TextType::class, array('attr' => array(
                    'style' => 'width : 20px'
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcprix', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcloyer', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fctitre', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcaugmentation', TextType::class, array('attr' => array(
                    'style' => 'width : 20px'
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcaugmentationPer', TextType::class, array('attr' => array(
                    'style' => 'width : 20px'
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcretenue', ChoiceType::class, array(
                'choices' => array(
                  'A la charge du propriétaire' => 'A la charge du propriétaire',
                    'A la charge du locataire' =>'A la charge du locataire',

                ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('fcusage', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcgarantie', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcimpot', ChoiceType::class, array(
                    'choices' => array(
                        'Declaré et payé' => 'Declaré et payé',
                        'Non declaré et non payé' =>'Non declaré et non payé',

                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('fcavance', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcavance', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcavanceMin', TextType::class, array('attr' => array(
                'style' => 'width : 5%;text-aligne:center'
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcavanceMax', TextType::class, array('attr' => array(
                        'style' => 'width : 5%'
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('fcconsigne', ChoiceType::class, array(
                'choices' => array(
                    'A la signature du contrat'=> 'A la signature du contrat' ,
                    'A partir du ' => 'A partir du'
                ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('deprix', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('deloyer', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('detype', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('deusage', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )

            ->add('deactivite', TextType::class, array('attr' => array(
                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('deretenue', ChoiceType::class, array(
                'choices' => array(
                    'A la charge du propriétaire' => 'A la charge du propriétaire' ,
                    'A la charge du locataire' => 'A la charge du locataire'
                ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('depaiementPer', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('decaution', TextType::class, array('attr' => array(

                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('deaugmentation', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('deaugmentationPer', TextType::class, array('attr' => array(
//                    'class' => 'md-input'
                ),
                    'required' => false
                )
            )
            ->add('dedisponibilite', ChoiceType::class, array(
                'choices' => array(
                    'Immédiate' => 'Immédiate',
                    'A partir du' => 'A partir du'
                ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('hypothequefc', ChoiceType::class, array(
                    'choices' => array(
                        'Libre de toute hypothéque' => 'Libre de toute hypothéque',
                        'hypothéque d\'un montant ' => 'hypothéque d\'un montant ',
                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add('destate', ChoiceType::class, array(
                    'choices' => array(
                        'Libre de toute hypothèque' => 'Libre de toute hypothèque',
                        'Hypothèque d\'un montant de' => 'Hypothèque d\'un montant de'
                    ),
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    },
                    'expanded' => true,
                    'attr' => array('data-md-icheck' => ''),
                    'required' => false,
                    'placeholder' => false
                )
            )
            ->add($builder
                ->create('consigneDate', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input'),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add($builder
                ->create('fcdateDebut', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input',
                    ),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add($builder
                ->create('fcconsigneDate', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input'),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add($builder
                ->create('dedisponibiliteDate', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input'),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add($builder
                ->create('depaiementDate', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}',
//                    'class' => 'md-input'
                ),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
            ->add($builder
                ->create('destateDate', TextType::class, array('attr' => array(
                    'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input'),
                    'required' => false))
                ->addModelTransformer(new DateTransformer('d/m/Y')))
        ;



//        if ($builder->getData()->getAcquisition() != null) {
//            die(var_dump('here'));
//
//            $builder->add('acquisition', EntityType::class, array(
//                    'class' => Acquisition::class,
//                    'placeholder' => '',
//                    'empty_data' => null,
//                    'attr' => array(
//                        'class' => 'kendoComboBox select',
//                        'style' => 'width:100%'
//                    )
//                )
//            );
//        } else {

            $builder->add('acquisition', AcquisitionType::class);
//        }
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Mandat::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_mandat';
    }


}
