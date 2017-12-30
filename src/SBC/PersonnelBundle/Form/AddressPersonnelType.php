<?php

namespace SBC\PersonnelBundle\Form;


use SBC\AddressBundle\Form\AddressType;
use SBC\PersonnelBundle\Entity\AddressPersonnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddressPersonnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->remove('title');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => AddressPersonnel::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_personnelbundle_address_personnel';
    }

    public function getParent()
    {
        return AddressType::class; // TODO: Change the autogenerated stub
    }

}