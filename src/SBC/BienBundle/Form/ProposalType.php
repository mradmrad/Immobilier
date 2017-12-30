<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\Mandat;
use SBC\BienBundle\Entity\Proposal;
use SBC\TiersBundle\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProposalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mandat', EntityType::class, array(
                'class' => Mandat::class,
                'placeholder' => 'Choisir un mandat'
            ))
            ->add('proposedFor', EntityType::class, array(
                'class' => Client::class,
                'placeholder' => 'Choisir un client'
            ))

        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Proposal::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_proposal';
    }


}
