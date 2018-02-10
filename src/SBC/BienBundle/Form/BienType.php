<?php

namespace SBC\BienBundle\Form;


use SBC\BienBundle\Entity\Agency;
use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Entity\BienPicture;
use SBC\BienBundle\Entity\Commodite;
use SBC\BienBundle\Entity\EnQualiteDe;
use SBC\BienBundle\Entity\Equipement;
use SBC\BienBundle\Entity\Proprietaire;
use SBC\BienBundle\Entity\ProprietaireSelf;
use SBC\BienBundle\Entity\TypeBien;
use SBC\GeoTunisieBundle\Entity\Adresse;
use SBC\PersonnelBundle\Entity\Personnel;
use SBC\PersonnelBundle\PersonnelBundle;
use SBC\TiersBundle\Entity\Client;
use SBC\UtilsBundle\Utils\DateTransformer;
use SBC\UtilsBundle\Utils\MoneyTransformer;
use SBC\UtilsBundle\Utils\StringNumberTransformer;
use SBC\UtilsBundle\UtilsBundle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title')
            ->add('description', TextareaType::class, array(
                'required' => false,
            ))
            ->add('residence', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('bloc', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('etage', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('nbrEtage', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
//            ->add('espaceCommun', TextType::class,array(
//                'required' => false,
//                'attr'=>array(
//                    'class' => 'md-input'
//                )
//            ))
            ->add('zone', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('coFinanciere', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('coSol', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('numApp', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('vitrine', TextareaType::class, array(
                'required' => false,
            ))
            ->add('largeurFacade', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('titre', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('nomProp', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('provenance', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))

            ->add('usage', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('profondeurFacade', TextType::class,array(
                'required' => false,
                'attr'=>array(
                    'class' => 'md-input'
                )
            ))
            ->add('architecture', ChoiceType::class, array(
                    'choices' => array(
                        'Moderne' => 'Moderne',
                                           ),
//                    'expanded'=> true,
                    'placeholder' => '',

                    'attr' => array(

                        'data-md-selectize'=> 'data-md-selectize'
                    )
                )
            )
            ->add('panorama', ChoiceType::class, array(
                    'choices' => array(
                        'Présence de vis à vis' => 'Présence de vis à vis',
                        'Vue dégagée' => 'Vue dégagée',
                        'Vue panoramique' => 'Vue panoramique',

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

            ->add('exterieur', ChoiceType::class, array(
                    'choices' => array(
                        'Jardin' => 'Jardin',
                        'Cours' => 'Cours',
                        'Escalier' => 'Escalier',
                        'Entrée directe' => 'Entrée directe',
                        'Piscine' => 'Piscine',
                        'Garage' => 'Garage',
                        'Cuisine externe' => 'Cuisine externe',
                        'Cellier' => 'Cellier',
                        'Abris voiture' => 'Abris voiture',
                        'Coin barbercue' => 'Coin barbercue',


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
            ->add('paysage', ChoiceType::class, array(
                    'choices' => array(
                        'Présence de verdures' => 'Présence de verdures',
                        'Absence de verdure' => 'Absence de verdures',

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
            ->add('loisir', ChoiceType::class, array(
                    'choices' => array(
                        'Présence équipements de loisirs' => 'Présence équipements de loisirs',
                        'Absence équipements de loisirs' => 'Absence équipements de loisirs',

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
            ->add('margeNegociation', TextType::class,array(
                'attr'=>array(
                    'class' => 'md-input'
                ),
                'required' => false
            ))
            ->add('style', TextType::class,array(
                'attr'=>array(
                    'class' => 'md-input'
                ),
                'required' => false
            ))
//            ->add('equipements', EntityType::class, array(
//                'class' => Equipement::class,
//                'expanded' => true,
//                'multiple' => true,
//                'required' => false,
//                'choice_attr' => function () {
//                    return ['data-md-icheck' => ''];
//                }
//            ))
            ->add('proximite', ChoiceType::class, array(
                    'choices' => array(
                        'Police' => 'Police',
                        'Poste'=>'Poste'
                    ),
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false,
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    }
                )
            )
            ->add('distanceCV', TextType::class,array(
                'attr'=>array(
                    'class' => 'md-input'
                ),
                'required' => false
            ))
            ->add('influence', ChoiceType::class, array(
                    'choices' => array(
                        'Bruit' => 'Bruit',
                    ),
//                    'expanded'=> true,
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false,
                    'choice_attr' => function () {
                        return ['data-md-icheck' => ''];
                    }
                )
            )
            ->add('statutConstruction', ChoiceType::class, array(
                    'choices' => array(
                        'En construction' => 'En construction',
                        'Nouvelle construction' => 'Nouvelle construction',
                        'Ancienne construction' => 'Ancienne construction',
                        'Renovée' => 'Renovée',
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
            ->add('canalisations',CanalisationType::class)
            ->add('formeTerrain', ChoiceType::class, array(
                    'choices' => array(
                        'Isolé' => 'Isolé',
                        'Jumlé d\' coté' => 'Jumlé d\' coté',
                        'En bande' => 'En bande',
                        'Fait l\'ongle' => 'Fait l\'ongle',
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
            ->add('orientation', ChoiceType::class, array(
                    'choices' => array(
                        'Sud-Est' => ' Sud-Est',
                        'Est' => 'Est',
                        'Nord-Est' => 'Nord-Est',
                        'Nord' => 'Nord',
                        'Ouest' => 'Ouest',
                        'Sud' => 'Sud',
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
            ->add('delimination', ChoiceType::class, array(
                    'choices' => array(
                        'Cloturé' => 'Cloturé',
                        'Non cloturé' => 'Non cloturé',

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
            ->add('stationnement', ChoiceType::class, array(
                    'choices' => array(
                        'Facile' => 'Facile',
                        'Moyen' => 'Moyen',
                        'Difficile' => 'Difficile'

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
            ->add('facade', ChoiceType::class, array(
//                'required'=>false,
                    'choices' => array(
                        'Très bon état' => 'Très bon état',
                        'bon état' => 'bon état',
                        'Etat moyen' => 'Etat moyen',
                        'Mauvais état' => 'Mauvais état',
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
            ->add(
                $builder
                    ->create('construction', TextType::class, array(
                            'attr' => array(
                                'data-uk-datepicker' => '{format:\'DD.MM.YYYY\'}',
                                'class' => 'md-input',
                            ),
                            'required' => false
                        )
                    )
                    ->addModelTransformer(new DateTransformer('d.m.Y')
                    )
            )
            ->add(
                $builder
                    ->create('renovation', TextType::class, array(
                            'attr' => array(
                                'data-uk-datepicker' => '{format:\'DD.MM.YYYY\'}',
                                'class' => 'md-input',
                            ),
                            'required' => false
                        )
                    )
                    ->addModelTransformer(new DateTransformer('d.m.Y')
                    )
            )
            ->add('nature', ChoiceType::class, array(
                    'choices' => array(
                        'Vente' => 'Vente',
                        'Location' => 'Location',
                    ),
                    'placeholder' => '',
                    'empty_data' => null,
//                    'required' => false,
                    'attr' => array(
                        'class' => 'kendoComboBox select',
                        'style' => 'width:100%'
                    )
                )
            )
            ->add(
                $builder
                    ->create('estimatedPrice', TextType::class,array(
                        'attr' => array(
                            'onchange' => 'estimatedPriceChanged()'
                        )
                    ))
                    ->addModelTransformer(new MoneyTransformer()))
            ->add(
                $builder
                    ->create('price', TextType::class,array(
                        'attr' => array(
                            'onchange' => 'priceChanged()'
                        )
                    ))
                    ->addModelTransformer(new MoneyTransformer()))
//            ->add('priceType', ChoiceType::class, array(
//
//                    'choices' => array(
//                        'Prix clair' => 'Prix clair',
//                        'Sur demande' => 'Sur demande',
//                        'Par m²' => 'Par m²',
//                    ),
//                    'placeholder' => '',
//                    'empty_data' => null,
////                    'required' => false,
//                    'attr' => array(
//                        'class' => 'kendoComboBox select',
//                        'style' => 'width:100%'
//                    )
//                )
//            )
            ->add(
                $builder
                    ->create('displayPrice', TextType::class,array(
                        'attr' => array(
                            'onchange' => 'displayedChanged()'
                        )
                    ))
                    ->addModelTransformer(new MoneyTransformer())
            )
            ->add('totalArea')
            ->add('coveredArea')
            ->add('bedroom')
            ->add('piece')
            ->add('sde')
            ->add('bathroom')
//            ->add('reference',null,array(
//                'required' => false
//            ))
            ->add('longitude', HiddenType::class)
            ->add('latitude', HiddenType::class)
//            ->add('furnished', CheckboxType::class, array(
//                'required' => false,
//                'attr' => array(
//                    'data-switchery' => ''
//                )
//            ))
//            ->add('ismapped', CheckboxType::class, array(
//                'required' => false,
//            ))
            ->add('mainPictureFile', \Symfony\Component\Form\Extension\Core\Type\FileType::class, array(
                    'required' => false
                )
            )
            ->add('address', EntityType::class, array(
                'class' => Adresse::class,
                'placeholder' => 'Choisir le numéro',
                'empty_data' => null,
            ))
//            ->add('agency', EntityType::class, array(
//                'class' => Agency::class,
//                'placeholder' => '',
//                'empty_data' => null,
//                'attr' => array(
//                    'class' => 'kendoComboBox select',
//                    'style' => 'width:100%'
//                )
//
//            ))
            ->add('typeBien', EntityType::class, array(
                'class' => TypeBien::class,
                'placeholder' => '',
                'empty_data' => null,
                'group_by' => 'category',
//                'attr' => array(
//                    'class' => 'kendoComboBox select',
//                    'style' => 'width:100%',
//                    'groupe' => 'category'
//                )

            ))
//            ->add('equipements', EntityType::class, array(
//                'class' => Equipement::class,
//                'expanded' => false,
//                'multiple' => true,
//                'required' => false,
//            ))
            ->add('equipements', EntityType::class, array(
                'class' => Equipement::class,
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'choice_attr' => function () {
                    return ['data-md-icheck' => ''];
                }
            ))
            ->add('owners', CollectionType::class, array(
                'entry_type' => ProprietaireSelfType::class,
                'allow_add' => true,
                'by_reference' => false,
                'attr' => array(
                    'class' => 'uk-grid',
                    'data-uk-grid-margin' => ''
                )
            ))
            ->add('procurations', CollectionType::class, array(
                'entry_type' => ProcurationType::class,
                'allow_add' => true,
                'by_reference' => false,
                'attr' => array(
                    'class' => 'uk-grid',
                    'data-uk-grid-margin' => ''
                )
            ))
            ->add('representants',ChoiceType::class,array(
                'choices' => array(
                    'Propriétaire' => 'Propriétaire',
                    'Par procuration' => 'Par procuration',
                    'Représentant de société' => 'Représentant de société'

                ),
                'attr' => array(
                    'data-md-selectize' => 'data-md-selectize',
                    'onchange' => 'qualityChanged()'
                )
            ))
            ->add('societePoste',ChoiceType::class,array(
                'required'=>false,
                'placeholder' => 'Cliquez ici ..',
                'choices' => array(
                    'Agent' => 'Agent',
                    'Responsable' => 'Responsable',
                ),
                'attr' => array(
                    'data-md-selectize' => 'data-md-selectize',
                )
            ))
            ->add('representantNom',TextType::class,array(
                'required'=>false,
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('pictures', CollectionType::class, array(
                'entry_type' => BienGallerieType::class,
                'allow_add' => true,
                'by_reference' => false,
                'attr' => array(
                    'class' => 'uk-grid',
                    'data-uk-grid-margin' => ''
                )
            ))
//            ->add('commodites', EntityType::class, array(
//                'class' => Commodite::class,
//                'expanded' => false,
//                'multiple' => true,
//                'required' => false,
//            ))
            ->add('commision', CommisionType::class)
            ->add('papers',CollectionType::class,array(
                'entry_type'=>BienAttachementType::class,
                'allow_add'=> true
            ))
            ->remove('contrat');
//        die(var_dump('here'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Bien::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_bien';
    }


}
