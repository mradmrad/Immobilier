<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\BienPicture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienPictureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description',TextType::class, array(
                'required'=>false,
                'attr' => array(
                    'data-name' => 'description',
                    'class' => 'md-input',
                    'placeholder' => 'Description obligatoire',

                )
            ))

            ->add('file', \Symfony\Component\Form\Extension\Core\Type\FileType::class, array(
                'required' => false,
                'attr' => array(
                    'data-name' => 'picture'
                )

            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => BienPicture::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_bienpicture';
    }


}
