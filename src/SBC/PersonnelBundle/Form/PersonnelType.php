<?php

namespace SBC\PersonnelBundle\Form;




use SBC\BienBundle\Entity\Agency;
use SBC\PersonnelBundle\Entity\Personnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('cin')
            ->add('code')
            ->add('phonenumber')
            ->add('agencyPhoneNumber')
            ->add('email')
            ->add('pictureFile', \Symfony\Component\Form\Extension\Core\Type\FileType::class, array(
                    'required' => false,
                )
            )
            ->add('address', AddressPersonnelType::class, array(
                    'required' => true
                )
            )

            ->add('agency', EntityType::class, array(
                'class' => Agency::class,
                'placeholder' => 'Choisir l\'agence',
                'empty_data' => null,
            ))

            ->add('save', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Personnel::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sbc_personnelbundle_personnel';
    }


}
