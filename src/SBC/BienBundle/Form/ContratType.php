<?php

namespace SBC\BienBundle\Form;

use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Entity\Contrat;
use SBC\BienBundle\Entity\TypeContrat;
use SBC\BienBundle\Repository\BienRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('reference')
            ->add('description')
            ->add('file', \Symfony\Component\Form\Extension\Core\Type\FileType::class, array(
                    'required' => false,
                )
            )
            ->add('typeContrat', EntityType::class, array(
                'class' => TypeContrat::class,
                'placeholder' => 'Choisir un type de contrat',
                'empty_data' => null,
            ))
            ->add('bien', EntityType::class, array(
                'class' => Bien::class,
                'placeholder' => 'Choisir un bien',
                'empty_data' => null,
                'query_builder' => function(BienRepository $repository)
                {
                    return $repository->getAllQuery(Bien::MANDAT);
                }
            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contrat::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_bienbundle_contrat';
    }


}
