<?php

namespace App\Form;

use App\Entity\Cursus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CursusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('min_participants')
            ->add('max_participants')
            ->add('start_date')
            ->add('end_date')
            ->add('price')
            ->add('cursus_type')
            ->add('location')
            ->add('leader')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cursus::class,
        ]);
    }
}
