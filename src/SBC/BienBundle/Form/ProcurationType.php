<?php

namespace SBC\BienBundle\Form;


use SBC\BienBundle\Entity\Procuration;
use SBC\TiersBundle\Entity\Client;
use SBC\UtilsBundle\Utils\DateTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProcurationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add($builder
                ->create('dateProcuration', TextType::class, array(
                        'attr' => array(
                            'data-uk-datepicker' => '{format:\'DD/MM/YYYY\'}', 'class' => 'md-input',
                            'data-name' => 'dateProcuration'
                        ),

                    )
                )
                ->addModelTransformer(new DateTransformer('d/m/Y')
                )
            )
            ->add('lieu', TextType::class, array(
                'attr' => array(
                    'class' => 'md-input',
                    'data-name' => 'lieu'
                )
            ))
            ->add('representant', EntityType::class, array(
                'placeholder' => '',
                'class' => Client::class,
                'attr' => array(
                    'data-name' => 'representant',
                    'class' => 'kendoComboBox select',
                    'style' => 'width:100%'
                )
            ))

            ->add('client', EntityType::class, array(
                'placeholder' => '',
                'class' => Client::class,
                'attr' => array(
                    'data-name' => 'client',
                    'class' => 'kendoComboBox select',
                    'style' => 'width:100%'
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Procuration::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_procuration';
    }


}
