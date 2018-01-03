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
        $nationalites = array(
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
            'Tunisienne'  => 'Tunisienne',
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
        sort($nationalites);

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
                                'data-uk-datepicker' => '{format:\'DD.MM.YYYY\'}',
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
                'choices' => array(
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
                'choices' => array(
                    'PDG' => 'PDG',
        'Directeur' => 'Directeur',
        'chef de service' => 'chef de service',
        'assistante' => 'assistante',
        'agent' => 'agent',
        'ouvrier' => 'ouvrier',
        'responsable' => 'responsable',
                    'Education Physique' => 'Education Physique',
                    'Agroalimentaire' => 'Agroalimentaire',
                    'Centres d\'appels' => 'Centres d\'appels',
'Informatique' => 'Informatique',
'Assurances' => 'Assurances',
'Télécommunications' => 'Télécommunications',
'Pétrolière' => 'Pétrolière',
'Automatisme' => 'Automatisme',
'Sante' => 'Sante',
'Textile' => 'Textile',
'Recherche' => 'Recherche',
'Commerce de détail' => 'Commerce de détail',
'Fonction publique' => 'Fonction publique',
'Installation-Entretien-Reparation' => 'Installation-Entretien-Reparation',
'Environnement' => 'Environnement',
'Ingenierie' => 'Ingenierie',
'Developpement des affaires' => 'Developpement des affaires',
'Electronique' => 'Electronique',
'Commerce' => 'Commerce',
'Banque' => 'Banque',
'Technologie de l\'information' => 'Technologie de l\'information',
'Pharmaceutiques' => 'Pharmaceutiques',
'Chimie' => 'Chimie',
'Biotechnologie' => 'Biotechnologie',
'Controle Qualite' => 'Controle Qualite',
'Stage' => 'Stage',
'Media-Journalisme' => 'Media-Journalisme',
'Industrie' => 'Industrie',
'Mécanique' => 'Mécanique',
'Electricité' => 'Electricité',
'Distribution' => 'Distribution',
'Finance' => 'Finance',
'Stratégie-Planification' => 'Stratégie-Planification',
'Vente' => 'Vente',
'Enseignement' => 'Enseignement',
'Marketing' => 'Marketing',
'Immobilier' => 'Immobilier',
'Design' => 'Design',
'Maison' => 'Maison',
'Mécatronique' => 'Mécatronique',
'Formation' => 'Formation',
'Science' => 'Science',
'Esthétique' => 'Esthétique',
'Hôtellerie et Tourisme' => 'Hôtellerie et Tourisme',
'Services a la clientele' => 'Services a la clientele',
'Automobile' => 'Automobile',
'Ressources humaines' => 'Ressources humaines',
'Juridique' => 'Juridique',
'Restauration' => 'Restauration',
'Construction' => 'Construction',
'Consulting' => 'Consulting',
'Comptabilité' => 'Comptabilité',
'Administration' => 'Administration',
'Gestion' => 'Gestion',
'Achat - Approvisionnement' => 'Achat - Approvisionnement',
'Transport' => 'Transport',
                )
            ))
            ->add('preferences',PreferenceType::class)
            ->add('domaine',ChoiceType::class,array(
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => '',
                    'class' => 'md-input'
                ),

                'choices' => array(
                    'Achats' => 'Achats' ,
                    'Logistique' => 'Logistique' ,
                    'Administratio'=> 'Administratio' ,
                    'Secrétariat' => 'Secrétariat' ,
                    'Aéronautiqu'=> 'Aéronautiqu' ,
                    'Aviatio'=> 'Aviatio' ,
                    'Voyages' => 'Voyages' ,
                    'Agent Polyvalen'=> 'Agent Polyvalen' ,
                    'Ouvrier Spécialisé' => 'Ouvrier Spécialisé' ,
                    'Agricuture' => 'Agricuture' ,
                    'Agro-Alimentair'=> 'Agro-Alimentair' ,
                    'Environnement' => 'Environnement' ,
                    'Architectur'=> 'Architectur' ,
                    'Immobilier' => 'Immobilier' ,
                    'Artisanat' => 'Artisanat' ,
                    'Métiers De L\'Art' => 'Métiers De L\'Art' ,
'Automobile' => 'Automobile' ,
'Moteur'=> 'Moteur' ,
'Engins Mécaniques' => 'Engins Mécaniques' ,
'Banque'=> 'Banque' ,
'Assurance'=> 'Assurance' ,
'Finance Marché' => 'Finance Marché' ,
'Bâtiment Travaux Public Btp' => 'Bâtiment Travaux Public Btp' ,
'Call Center'=> 'Call Center' ,
'Télévente' => 'Télévente' ,
'Chimie'=> 'Chimie' ,
'Biologie'=> 'Biologi' ,
'Physique' => 'Physique' ,
'Commercial'=> 'Commercial' ,
'Vente' => 'Vente' ,
'Distribution' => 'Distribution' ,
'Comptabilité' => 'Comptabilité' ,
'Gestion Finance'=> 'Gestion Finance' ,
'Audit' => 'Audit' ,
'Consultant'=> 'Consultant' ,
'Étude'=> 'Étude' ,
'Conseil' => 'Conseil' ,
'Cosmétique'=> 'Cosmétique' ,
'Parfumerie'=> 'Parfumerie' ,
'Luxe' => 'Luxe' ,
'Culture'=> 'Culture' ,
'Audiovisuel' => 'Audiovisuel' ,
'Direction'=> 'Direction' ,
'Management'=> 'Management' ,
'Stratégie' => 'Stratégie' ,
'Droit'=> 'Droit' ,
'Fiscalité' => 'Fiscalité' ,
'Juridique' => 'Juridique' ,
'Électronique'=> 'Électronique' ,
'Électricité ' => 'Électricité' ,
'Énergie' => 'Énergie' ,
'Enseignement'=> 'Enseignement' ,
'Formation' => 'Formation' ,
'Export'=> 'Export' ,
'Transit' => 'Transit' ,
'Gardiennage'=> 'Gardiennage' ,
'Sécurité' => 'Sécurité' ,
'Informatique'=> 'Informatique' ,
'Multimédia' => 'Multimédia' ,
'Ingénieur'=> 'Ingénieur' ,
'Industrie'=> 'Industrie' ,
'Production' => 'Production' ,
'Journalisme'=> 'Journalisme' ,
'Traduction'=> 'Traduction' ,
'Édition' => 'Édition' ,
'Maintenance'=> 'Maintenance' ,
'Qualité' => 'Qualité' ,
'Marketing'=> 'Marketing' ,
'Publicité' => 'Publicité' ,
'Communication' => 'Communication' ,
'Ressources Humaine'=> 'Ressources Humaine' ,
'Sociale' => 'Sociale' ,
'Santé' => 'Santé' ,
'Paramédical'=> 'Paramédical' ,
'Optique' => 'Optique' ,
'Technicien'=> 'Technicien' ,
'Télécome'=> 'Télécome' ,
'Réseaux' => 'Réseaux' ,
'Textile'=> 'Textile' ,
'Cuir' => 'Cuir' ,
'Tourisme'=> 'Tourisme' ,
'Hôtellerie'=> 'Hôtellerie' ,
'Restauration'=> 'Restauration' ,
'Loisirs' => 'Loisirs' ,
'Transport'=> 'Transport' ,
'Livraison'=> 'Livraison' ,
'Manutention' => 'Manutention' ,



                )
            ))
            ->add('origine',ChoiceType::class,array(
                'attr' => array(
                    'data-md-selectize' => '',
                    'data-md-selectize-bottom' => '',
                    'class' => 'md-input'
                ),
                'choices' => array(
                    'Presse' => 'Presse',
                    'Revue' => 'Revue'
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
