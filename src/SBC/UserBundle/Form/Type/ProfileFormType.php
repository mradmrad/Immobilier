<?php

namespace SBC\UserBundle\Form\Type;

use SBC\PersonnelBundle\Entity\Personnel;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


class ProfileFormType extends BaseType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
//            ->add('roles', CollectionType::class, array(
//                    'entry_type' => ChoiceType::class,
////                    'label' => 'roles',
//                    'entry_options' => array(
//                        'choices' => array(
//                            'Agent' => 'ROLE_AGENT',
//                            'Coordinateur' => 'ROLE_COORDINATEUR',
//                            'Administrateur' => 'ROLE_SUPER_ADMIN',
//                        ),
//                        'placeholder' => 'Choisir le rôle de l\'utilisateur',
//                        'empty_data' => null,
//                        'expanded' => false,
//                        'multiple' => false,
//
//                    )
//                )
//            )
            ->add('personnel', EntityType::class, array(
                'class' => Personnel::class,
                'placeholder' => 'Choisir un personnel',
                'empty_data' => null
            ))

            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Nouveau mot de passe','attr' => array('class'=> 'md-input') ),
                'second_options' => array('label' => 'Confirmer le mot de passe','attr' => array('class'=> 'md-input')),
                'invalid_message' => 'Mots de passes non indentiques',
                'required' => false
            ))
            ->add('save', SubmitType::class);
    }

    public function getBlockPrefix()
    {
        return 'user_profile';
    }

}
