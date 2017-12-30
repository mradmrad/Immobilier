<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\Commodite;
use SBC\BienBundle\Entity\Equipement;
use SBC\BienBundle\Entity\Origine;
use SBC\BienBundle\Entity\Requete;
use SBC\BienBundle\Entity\TypeBien;
use SBC\GeoTunisieBundle\Entity\Gouvernorat;
use SBC\GeoTunisieBundle\Entity\Ville;
use SBC\PersonnelBundle\Entity\Personnel;
use SBC\TiersBundle\Entity\Client;
use SBC\UtilsBundle\Utils\DateTransformer;
use SBC\UtilsBundle\Utils\MoneyTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequeteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('description')
            ->add('furnished', CheckboxType::class, array(
                'required'=>false,
                    'attr' => array(
                        'data-md-icheck'=>''
                    )
                )
            )
            ->add('notfurnished', CheckboxType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-md-icheck'=>''
                    )
                )
            )
            ->add($builder
                ->create('budgetMin', TextType::class)
                ->addModelTransformer(new MoneyTransformer()))
            ->add($builder
                ->create('budgetMax', TextType::class)
                ->addModelTransformer(new MoneyTransformer()))
            ->add('bedroom',TextType::class,array(
                'required'=>false,
            ))
            ->add('bathroom')
            ->add('totalAreaMin')
            ->add('coveredAreaMin')

            ->add(
                $builder
                    ->create('entryDate', TextType::class, array(
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
            ->add('natureRequete', ChoiceType::class, array(
                    'choices' => array(
                        'Achat' => 'Achat',
                        'Location' => 'Location',
                    ),

                    'placeholder' => 'Choisir le type de requête         ',
                    'empty_data' => null
                )
            )
            ->add('view', ChoiceType::class, array(
                    'choices' => array(
                        'Sur mer' => 'Sur mer',
                        'Location' => 'Location',
                    ),
                    'required'=>false,
                    'placeholder' => 'Choisir la vue',
                    'empty_data' => null,
                    'attr' => array(
                        'class' => 'md-input',
                        'data-md-selectize'=> ''
                    )
                )
            )
            ->add('orientation', ChoiceType::class, array(
                    'choices' => array(
                        'Sud' => 'Sud',
                        'Nord' => 'Nord',
                    ),

                    'required'=>false,
                    'placeholder' => 'Choisir l\'orientation',
                    'empty_data' => null,
                    'attr' => array(
                        'class' => 'md-input',
                        'data-md-selectize'=> ''
                    )
                )
            )
            ->add('client', EntityType::class, array(
                'class' => Client::class,
                'placeholder' => 'Choisir le demandeur',
                'empty_data' => null,

            ))

            ->add('gouvernorats', EntityType::class, array(
                'class' => Gouvernorat::class,
                'expanded' => false,
                'multiple' => true,
                'required' => false,
            ))
            ->add('villes', EntityType::class, array(
                'class' => Ville::class,
                'expanded' => false,
                'multiple' => true,
                'required' => false,
                'group_by' => 'gouvernorat',
            ))
            ->add('equipements', EntityType::class, array(
                'class' => Equipement::class,
                'expanded' => false,
                'multiple' => true,
                'required' => false,
            ))
            ->add('typeBiens', EntityType::class, array(
                'class' => TypeBien::class,
                'expanded' => false,
                'multiple' => true,
                'required' => false,
                'group_by' => 'category',
            ))
            ->add('origines', EntityType::class, array(
                'class' => Origine::class,
                'expanded' => false,
                'multiple' => true,
                'required' => false,
            ))
            ->add('commodites', EntityType::class, array(
                'class' => Commodite::class,
                'expanded' => false,
                'multiple' => true,
                'required' => false,
            ))

        ;

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Requete::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_requete';
    }


}
