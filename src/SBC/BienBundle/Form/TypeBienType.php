<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\Category;
use SBC\BienBundle\Entity\TypeBien;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeBienType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('bedroom', CheckboxType::class, array(
                'required' => false,
                'attr' => array(
                    'data-switchery' => ''
                )
            ))
            ->add('bathroom', CheckboxType::class, array(
                'required' => false,
                'attr' => array(
                    'data-switchery' => ''
                )
            ))
            ->add('furnished', CheckboxType::class, array(
                'required' => false,
                'attr' => array(
                    'data-switchery' => ''
                )
            ))
            ->add('equipped', CheckboxType::class, array(
                'required' => false,
                'attr' => array(
                    'data-switchery' => ''
                )
            ))
            ->add('category'
                ,EntityType::class, array(
                'class' => Category::class,
                'placeholder' => 'Choisir une catégorie',
                'empty_data' => null
            )
            )

            ->add('save',SubmitType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => TypeBien::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_typebien';
    }


}
