<?php

namespace SBC\TiersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('denomination', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('description', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('mail', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
            ->add('tel', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input'
                )
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\TiersBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_tiersbundle_contact';
    }


}
