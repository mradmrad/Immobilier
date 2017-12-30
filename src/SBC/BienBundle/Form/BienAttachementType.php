<?php

namespace SBC\BienBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienAttachementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filePath', \Symfony\Component\Form\Extension\Core\Type\FileType::class, array(
                'required' => false,
                'attr' => array(
                    'data-name' => 'file'
                )

            ))
            ->add('description',TextType::class, array(
                'attr' => array(
                    'data-name' => 'description',
                    'class' => 'md-input',
                    'placeholder' => 'Description obligatoire'
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\BienAttachement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_bienattachement';
    }


}
