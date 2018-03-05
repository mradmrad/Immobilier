<?php

namespace SBC\TiersBundle\Form;

use SBC\BienBundle\Entity\Preference;
use SBC\BienBundle\Form\BienPictureType;
use SBC\BienBundle\Form\PreferenceType;
use SBC\UtilsBundle\Utils\DateTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class ClientType extends TiersType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $old_nationalites = array(
            'Française'  => 'Française',
            'Suisse'  => 'Suisse',
            'Belge'  => 'Belge',
            'Allemande'  => 'Allemande',
            'Italienne'   =>  'Italienne',
            'Afghane'  => 'Afghane',
            'Albanaise'  => 'Albanaise',
            'Algerienne'  => 'Algerienne',
            'Americaine'  => 'Americaine',
            'Andorrane'  => 'Andorrane',
            'Angolaise'  => 'Angolaise',
            'Antiguaise et barbudienne'  => 'Antiguaise et barbudienne',
            'Argentine'  => 'Argentine',
            'Armenienne'  => 'Armenienne',
            'Australienne'  => 'Australienne',
            'Autrichienne'  => 'Autrichienne',
            'Azerbaïdjanaise'  => 'Azerbaïdjanaise',
            'Bahamienne'  => 'Bahamienne',
            'Bahreinienne'  => 'Bahreinienne',
            'Bangladaise'  => 'Bangladaise',
            'Barbadienne'  => 'Barbadienne',
            'Belizienne'  => 'Belizienne',
            'Beninoise'  => 'Beninoise',
            'Bhoutanaise'  => 'Bhoutanaise',
            'Bielorusse'  => 'Bielorusse',
            'Birmane'  => 'Birmane',
            'Bissau-Guinéenne'  => 'Bissau-Guinéenne',
            'Bolivienne'  => 'Bolivienne',
            'Bosnienne'  => 'Bosnienne',
            'Botswanaise'  => 'Botswanaise',
            'Bresilienne'  => 'Bresilienne',
            'Britannique'  => 'Britannique',
            'Bulgare'  => 'Bulgare',
            'Burkinabe'  => 'Burkinabe',
            'Burundaise'  => 'Burundaise',
            'Cambodgienne'  => 'Cambodgienne',
            'Camerounaise'  => 'Camerounaise',
            'Canadienne'  => 'Canadienne',
            'Cap-verdienne'  => 'Cap',
            'Centrafricaine'  => 'Centrafricaine',
            'Chilienne'  => 'Chilienne',
            'Chinoise'  => 'Chinoise',
            'Chypriote'  => 'Chypriote',
            'Colombienne'  => 'Colombienne',
            'Comorienne'  => 'Comorienne',
            'Congolaise'  => 'Congolaise',
            'Costaricaine'  => 'Costaricaine',
            'Croate'  => 'Croate',
            'Cubaine'  => 'Cubaine',
            'Danoise'  => 'Danoise',
            'Djiboutienne'  => 'Djiboutienne',
            'Dominicaine'  => 'Dominicaine',
            'Dominiquaise'  => 'Dominiquaise',
            'Egyptienne'  => 'Egyptienne',
            'Emirienne'  => 'Emirienne',
            'Equato-guineenne'  => 'Equato-guineenne',
            'Equatorienne'  => 'Equatorienne',
            'Erythreenne'  => 'Erythreenne',
            'Espagnole'  => 'Espagnole',
            'Est-timoraise'  => 'Est-timoraise',
            'Estonienne'  => 'Estonienne',
            'Ethiopienne'  => 'Ethiopienne',
            'Fidjienne'  => 'Fidjienne',
            'Finlandaise'  => 'Finlandaise',
            'Gabonaise'  => 'Gabonaise',
            'Gambienne'  => 'Gambienne',
            'Georgienne'  => 'Georgienne',
            'Ghaneenne'  => 'Ghaneenne',
            'Grenadienne'  => 'Grenadienne',
            'Guatemalteque'  => 'Guatemalteque',
            'Guineenne'  => 'Guineenne',
            'Guyanienne'  => 'Guyanienne',
            'Haïtienne'  => 'Haïtienne',
            'Hellenique'  => 'Hellenique',
            'Hondurienne'  => 'Hondurienne',
            'Hongroise'  => 'Hongroise',
            'Indienne'  => 'Indienne',
            'Indonesienne'  => 'Indonesienne',
            'Irakienne'  => 'Irakienne',
            'Irlandaise'  => 'Irlandaise',
            'Islandaise'  => 'Islandaise',
            'Ivoirienne'  => 'Ivoirienne',
            'Jamaïcaine'  => 'Jamaïcaine',
            'Japonaise'  => 'Japonaise',
            'Jordanienne'  => 'Jordanienne',
            'Kazakhstanaise'  => 'Kazakhstanaise',
            'Kenyane'  => 'Kenyane',
            'Kirghize'  => 'Kirghize',
            'Kiribatienne'  => 'Kiribatienne',
            'Kittitienne-et-nevicienne'  => 'Kittitienne-et-nevicienne',
            'Kossovienne'  => 'Kossovienne',
            'Koweitienne'  => 'Koweitienne',
            'Laotienne'  => 'Laotienne',
            'Lesothane'  => 'Lesothane',
            'Lettone'  => 'Lettone',
            'Libanaise'  => 'Libanaise',
            'Liberienne'  => 'Liberienne',
            'Libyenne'  => 'Libyenne',
            'Liechtensteinoise'  => 'Liechtensteinoise',
            'Lituanienne'  => 'Lituanienne',
            'Luxembourgeoise'  => 'Luxembourgeoise',
            'Macedonienne'  => 'Macedonienne',
            'Malaisienne'  => 'Malaisienne',
            'Malawienne'  => 'Malawienne',
            'Maldivienne'  => 'Maldivienne',
            'Malgache'  => 'Malgache',
            'Malienne'  => 'Malienne',
            'Maltaise'  => 'Maltaise',
            'Marocaine'  => 'Marocaine',
            'Marshallaise'  => 'Marshallaise',
            'Mauricienne'  => 'Mauricienne',
            'Mauritanienne'  => 'Mauritanienne',
            'Mexicaine'  => 'Mexicaine',
            'Micronesienne'  => 'Micronesienne',
            'Moldave'  => 'Moldave',
            'Monegasque'  => 'Monegasque',
            'Mongole'  => 'Mongole',
            'Montenegrine'  => 'Montenegrine',
            'Mozambicaine'  => 'Mozambicaine',
            'Namibienne'  => 'Namibienne',
            'Nauruane'  => 'Nauruane',
            'Neerlandaise'  => 'Neerlandaise',
            'Neo-zelandaise'  => 'Neo-zelandaise',
            'Nepalaise'  => 'Nepalaise',
            'Nicaraguayenne'  => 'Nicaraguayenne',
            'Nigeriane'  => 'Nigeriane',
            'Nigerienne'  => 'Nigerienne',
            'Nord-coréenne'  => 'Nord-coréenne',
            'Norvegienne'  => 'Norvegienne',
            'Omanaise'  => 'Omanaise',
            'Ougandaise'  => 'Ougandaise',
            'Ouzbeke'  => 'Ouzbeke',
            'Pakistanaise'  => 'Pakistanaise',
            'Palau'  => 'Palau',
            'Palestinienne'  => 'Palestinienne',
            'Panameenne'  => 'Panameenne',
            'Papouane-neoguineenne'  => 'Papouane-neoguineenne',
            'Paraguayenne'  => 'Paraguayenne',
            'Peruvienne'  => 'Peruvienne',
            'Philippine'  => 'Philippine',
            'Polonaise'  => 'Polonaise',
            'Portoricaine'  => 'Portoricaine',
            'Portugaise'  => 'Portugaise',
            'Qatarienne'  => 'Qatarienne',
            'Roumaine'  => 'Roumaine',
            'Russe'  => 'Russe',
            'Rwandaise'  => 'Rwandaise',
            'Saint-Lucienne'  => 'Saint-Lucienne',
            'Saint-Marinaise'  => 'Saint-Marinaise',
            'Saint-Vincentaise-et-Grenadine'  => 'Saint-Vincentaise-et-Grenadine',
            'Salomonaise'  => 'Salomonaise',
            'Salvadorienne'  => 'Salvadorienne',
            'Samoane'  => 'Samoane',
            'Santomeenne'  => 'Santomeenne',
            'Saoudienne'  => 'Saoudienne',
            'Senegalaise'  => 'Senegalaise',
            'Serbe'  => 'Serbe',
            'Seychelloise'  => 'Seychelloise',
            'Sierra-leonaise'  => 'Sierra-leonaise',
            'Singapourienne'  => 'Singapourienne',
            'Slovaque'  => 'Slovaque',
            'Slovene'  => 'Slovene',
            'Somalienne'  => 'Somalienne',
            'Soudanaise'  => 'Soudanaise',
            'Sri-lankaise'  => 'Sri-lankaise',
            'Sud-africaine'  => 'Sud-africaine',
            'Sud-coréenne'  => 'Sud-coréenne',
            'Suedoise'  => 'Suedoise',
            'Surinamaise'  => 'Surinamaise',
            'Swazie'  => 'Swazie',
            'Syrienne'  => 'Syrienne',
            'Tadjike'  => 'Tadjike',
            'Taiwanaise'  => 'Taiwanaise',
            'Tanzanienne'  => 'Tanzanienne',
            'Tchadienne'  => 'Tchadienne',
            'Tcheque'  => 'Tcheque',
            'Thaïlandaise'  => 'Thaïlandaise',
            'Togolaise'  => 'Togolaise',
            'Tonguienne'  => 'Tonguienne',
            'Trinidadienne'  => 'Trinidadienne',
            'Turkmene'  => 'Turkmene',
            'Turque'  => 'Turque',
            'Tuvaluane'  => 'Tuvaluane',
            'Ukrainienne'  => 'Ukrainienne',
            'Uruguayenne'  => 'Uruguayenne',
            'Vanuatuane'  => 'Vanuatuane',
            'Venezuelienne'  => 'Venezuelienne',
            'Vietnamienne'  => 'Vietnamienne',
            'Yemenite'  => 'Yemenite',
            'Zambienne'  => 'Zambienne',
            'Zimbabweenne'  => 'Zimbabweenne'

        );
        sort($old_nationalites);
        $nationalites = array();
        $nationalites['Tunisienne'] = 'Tunisienne';
        foreach ($old_nationalites as $value) {
            $nationalites[$value] = $value;

        }


        parent::buildForm($builder, $options);
        $builder
            ->add('sexe',ChoiceType::class,array(
                'attr' => array(
                    'class' => 'md-input',
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => '',
                    'placeholder' => 'Sexe'
                ),
                'choices' => array(
                    'Homme' => 'Homme',
                    'Femme' => 'Femme'
                )
            ))
            ->add(
                $builder
                    ->create('naissance', TextType::class, array(
                            'attr' => array(
                                'data-uk-datepicker' => '{

                                format:\'DD-MM.YYYY\',
                               , changeYear: true, 
                               yearRange: \'1950:2010\'
                                }',
                                'class' => 'md-input',
                            ),
                            'required' => false
                        )
                    )
                    ->addModelTransformer(new DateTransformer('d.m.Y')
                    )
            )
            ->add('etude',ChoiceType::class,array(
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => '',
                    'class' => 'md-input'
                ),
                'empty_data'=> true,
//                'placeholder' => true,
                'required'=> false,
                'choices' => array(
                    '-'=>null,
                    'Doctorat' => 'Doctorat',
'Universitaire' => 'Universitaire' ,
'Diplôme de Formation Professionnelle' => 'Diplôme de Formation Professionnelle' ,
'Bac' => 'Bac' ,
'Secondaire' => 'Secondaire' ,
'Primaire' => 'Primaire'

                )
            ))
            ->add('travail',ChoiceType::class,array(
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => '',
                    'class' => 'md-input'
                ),
                'placeholder' => 'Choisissez le travail ...',
                'required'=> false,
                'choices' => array(
                    '-'=>null,
                    'Directeur Général' => 'Directeur Général',
        'Gérant' => 'Gérant',
        'Directeur' => 'Directeur',
        'Chef Département' => 'Chef Département',
        'Chef Service' => 'Chef Service',
        'Responsable' => 'Responsable',
        'Assistant (e)' => 'Assistant (e)',
                    'Secrétaire' => 'Secrétaire',
                    'Agent' => 'Agent',
                    'Ouvrier' => 'Ouvrier')
            ))
            ->add('preferences',PreferenceType::class)
            ->add('domaine',ChoiceType::class,array(
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => '',
                    'class' => 'md-input',

                ),
                'placeholder' => 'Choisissez un domaine ...',
                'required'=> false,
                'choices' => array(
                    '-'=>null,
                    'Agricultures' => 'Agricultures',
                    'Agro-alimentaire' => 'Agro-alimentaire',
                    'Environnement' => 'Environnement',
                    'Artisanat' => 'Artisanat',
                    'Métiers De L\'art' => 'Métiers De L\'art',
'Automobile' => 'Automobile',
'Moteurs' => 'Moteurs',
'Engins Mécaniques' => 'Engins Mécaniques',
'Banque' => 'Banque',
'Assurances' => 'Assurances',
'Finance Marché' => 'Finance Marché',
'Centres d\'appels' => 'Centres d\'appels',
'Télévente' => 'Télévente',
'Télécommunications' => 'Télécommunications',
'Chimie' => 'Chimie',
'Biologie' => 'Biologie',
'Physique' => 'Physique',
'Pharmaceutiques ' => 'Pharmaceutiques',
'Commerce' => 'Commerce',
'Vente' => 'Vente',
'Distribution' => 'Distribution',
'Comptabilité' => 'Comptabilité',
'Gestion' => 'Gestion',
'Finance' => 'Finance',
'Audit' => 'Audit',
'Consulting' => 'Consulting',
'Administration ' => 'Administration',
'Cosmétique' => 'Cosmétique',
'Parfumerie' => 'Parfumerie',
'Beauté' => 'Beauté',
'Culture' => 'Culture',
'Audiovisuel' => 'Audiovisuel',
'Droit juridique' => 'Droit juridique',
'Fiscalité' => 'Fiscalité',
'Électronique' => 'Électronique',
'électricité' => 'électricité',
'énergie' => 'énergie',
'Enseignement' => 'Enseignement',
'Formation' => 'Formation',
'Puériculture' => 'Puériculture',
'Education Physique' => 'Education Physique',
'Export' => 'Export',
'Transit' => 'Transit',
'Informatique' => 'Informatique',
'Multimédia' => 'Multimédia',
'Industrie' => 'Industrie',
'Production' => 'Production',
'Immobilier' => 'Immobilier',
'BTP' => 'BTP',
'Travaux Public' => 'Travaux Public',
'Design Maison' => 'Design Maison',
'Architecture' => 'Architecture',
'Construction' => 'Construction',
'Journalisme' => 'Journalisme',
'Traduction' => 'Traduction',
'édition' => 'édition',
'Marketing' => 'Marketing',
'Publicité' => 'Publicité',
'Communication' => 'Communication',
'Technologie de l\'information' => 'Technologie de l\'information',
'Ressources Humaines' => 'Ressources Humaines',
'Social' => 'Social',
'Santé' => 'Santé',
'Paramédical' => 'Paramédical',
'Optique' => 'Optique',
'Secteur Public' => 'Secteur Public',
'Fonction publique' => 'Fonction publique',
'Textile' => 'Textile',
'Mode et habillement' => 'Mode et habillement',
'Cuir' => 'Cuir',
'Tourisme' => 'Tourisme',
'Hôtellerie' => 'Hôtellerie',
'Restauration' => 'Restauration',
'Loisirs' => 'Loisirs',
'Transport' => 'Transport',
'Livraison' => 'Livraison',
'Pétrolière Automatisme' => 'Pétrolière Automatisme',
'Secrétariat Aéronautique' => 'Secrétariat Aéronautique',
'Aviation' => 'Aviation',
'Voyages Agent Polyvalent' => 'Voyages Agent Polyvalent',
'Recherche' => 'Recherche',
'Installation' => 'Installation',
'Entretien' => 'Entretien',
'Réparation' => 'Réparation',
'Ingénierie' => 'Ingénierie',
'Développement des affaires' => 'Développement des affaires',
'Contrôle Qualité' => 'Contrôle Qualité',
'Stage' => 'Stage',
                )
            ))
            ->add('origine',ChoiceType::class,array(
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => '',
                    'class' => 'md-input'
                ),
                'choices' => array(
                    'Agence' =>'Agence',
                    'Presse' => 'Presse',
                    'Revue' => 'Revue',
                    'Site Web' =>'Site Web',
                    'Facebook' => 'Facebook',
                    'Twitter' => 'Twitter',
                    'Youtube' =>'Youtube',
                    'Google+' => 'Google+',
                    'Instagram' => 'Instagram',
                    'Linkedin' =>'Linkedin',
                    'Foires' => 'Foires',
                    'Zone' => 'Zone',
                    'Autres agence' =>'Autres agence',
                    'Affichage urbain' => 'Affichage urbain',
                    'Action GSM' => 'Action GSM',
                )
            ))


            ->add('secondtel', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('thirdtel', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('telbureau', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('birthplace',TextType::class,array(
               'required' => false,
                'attr'=>array(
                    'class'=>'md-input'
                )
            ))
            ->add('nationalite',ChoiceType::class,array(
                'choices'=>array_flip($nationalites),
                'attr'=>array(
                    'data-md-selectize'=>'',
                    'class'=>'md-input'
                )
            ))
            ->add('familySituation',ChoiceType::class,array(
                'choices'=>array(
                    'Célibataire' => 'Célibataire',
                    'Marié (e)' => 'Marié (e)',
                    'Divorcé (e)' => 'Divorcé (e)',
                    'Veuf (ve)' => 'Veuf (ve)'
                ),
                'attr'=>array(
                    'data-md-selectize'=>'',
                    'class'=>'md-input'
                )
            ))
            ->add('cinRecto',BienPictureType::class)
            ->add('cinVerso',BienPictureType::class)
            ->remove('code')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\TiersBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_tiersbundle_client';
    }


}
