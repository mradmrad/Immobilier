<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\Acquisition;
use SBC\BienBundle\Entity\Bien;
use SBC\UtilsBundle\Utils\MoneyTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AcquisitionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder
//            ->add(
//                $builder
//                    ->create('clientEstimation', TextType::class, array(
//                        'attr' => array(
//                            'class' => 'md-input money'
//                        )
//                    ))
//                    ->addModelTransformer(new MoneyTransformer()))
//            ->add(
//                $builder
//                    ->create('agencyEstimation', TextType::class, array(
//                        'attr' => array(
//                            'class' => 'md-input money'
//                        )
//                    ))
//                    ->addModelTransformer(new MoneyTransformer()))
//            ->add('description');
//
//        if ($builder->getData() != null && $builder->getData()->getBien() != null) {
//
//            $builder->add('bien', EntityType::class, array(
//                    'class' => Bien::class,
//                    'placeholder' => '',
//                    'empty_data' => null,
//                    'attr' => array(
//                        'class' => 'kendoComboBox select',
//                        'style' => 'width:100%'
//                    )
//
//                )
//            );
//        }
//        else {
            $builder->add('bien', BienType::class)
            ->add('evaluations',CollectionType::class,array(
                'entry_type' => EvaluationType::class,
                'allow_add' => true,
                'by_reference' => false,

            ))
            ;
//        };
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Acquisition::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_acquisition';
    }


}
