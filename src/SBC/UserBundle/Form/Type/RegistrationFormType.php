<?php

namespace SBC\UserBundle\Form\Type;

use FOS\UserBundle\Event\FormEvent;
use SBC\PersonnelBundle\Entity\Personnel;
use SBC\PersonnelBundle\Form\PersonnelType;
use SBC\PersonnelBundle\Repository\PersonnelRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormEvents;


class RegistrationFormType extends BaseType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        // add your custom field

        $builder
            ->remove('email')


            ->add('roles', CollectionType::class, array(
                    'entry_type' => ChoiceType::class,
                    'label' => 'roles',
                    'entry_options' => array(
                        'choices' => array(
                            'Agent' => 'ROLE_AGENT',
                            'Coordinateur' => 'ROLE_COORDINATEUR',
                            'Superviseur' => 'ROLE_SUPERVISEUR',
                            'Web marketing' => 'ROLE_WEB_MARKETING',
                            'Administrateur' => 'ROLE_SUPER_ADMIN',

                        ),
                        'placeholder' => 'Choisir le rôle de l\'utilisateur',
                        'empty_data' => null,
                        'expanded' => false,
                        'multiple' => false,

                    )
                )
            )
            ->add('personnel',PersonnelType::class)
            ->add('save', SubmitType::class);

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    public function getBlockPrefix()
    {
        return 'user_registration';
    }


}
