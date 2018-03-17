<?php

namespace SBC\BienBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        if ($builder->getData() != null)
//        {
            $builder->add('supTerrainMin',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supTerrainMin',
                        'onchange' => 'areaChanged(this)',
                        'style' => 'width: 80px',
//                'value' => '0'
                    )
                )
            )
                ->add('supTerrainPMin',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supTerrainPMin',
                        'onchange' => 'priceEChanged(this)',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supTerrainTMin',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supTerrainTMin',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supCouvertMin',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supCouvertMin',
                        'onchange' => 'areaChanged(this)',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supCouvertPMin',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supCouvertPMin',
                        'onchange' => 'priceEChanged(this)',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supCouvertTMin',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supCouvertTMin',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supTerrainMax',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supTerrainMax',
                        'onchange' => 'areaChanged(this)',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supTerrainPMax',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supTerrainPMax',
                        'onchange' => 'priceEChanged(this)',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supTerrainTMax',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supTerrainTMax',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supCouvertMax',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supCouvertMax',
                        'onchange' => 'areaChanged(this)',
                        'style' => 'width: 80px',
//                    'value' => '0'

                    )
                ))
                ->add('supCouvertPMax',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supCouvertPMax',
                        'onchange' => 'priceEChanged(this)',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ))
                ->add('supCouvertTMax',TextType::class, array(
                    'required'=>false,
                    'attr' => array(
                        'data-name' => 'supCouvertTMax',
                        'style' => 'width: 80px',
//                    'value' => '0'
                    )
                ));
//        }
//        else {
//            $builder->add('supTerrainMin',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supTerrainMin',
//                        'onchange' => 'areaChanged(this)',
//                        'style' => 'width: 80px',
//                'value' => '0'
//                    )
//                )
//            )
//                ->add('supTerrainPMin',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supTerrainPMin',
//                        'onchange' => 'priceEChanged(this)',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supTerrainTMin',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supTerrainTMin',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supCouvertMin',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supCouvertMin',
//                        'onchange' => 'areaChanged(this)',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supCouvertPMin',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supCouvertPMin',
//                        'onchange' => 'priceEChanged(this)',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supCouvertTMin',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supCouvertTMin',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supTerrainMax',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supTerrainMax',
//                        'onchange' => 'areaChanged(this)',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supTerrainPMax',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supTerrainPMax',
//                        'onchange' => 'priceEChanged(this)',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supTerrainTMax',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supTerrainTMax',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supCouvertMax',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supCouvertMax',
//                        'onchange' => 'areaChanged(this)',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//
//                    )
//                ))
//                ->add('supCouvertPMax',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supCouvertPMax',
//                        'onchange' => 'priceEChanged(this)',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ))
//                ->add('supCouvertTMax',TextType::class, array(
//                    'required'=>false,
//                    'attr' => array(
//                        'data-name' => 'supCouvertTMax',
//                        'style' => 'width: 80px',
//                    'value' => '0'
//                    )
//                ));
//        }

//        die(var_dump($builder));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SBC\BienBundle\Entity\Evaluation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_evaluation';
    }


}
