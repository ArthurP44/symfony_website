<?php

namespace App\Form;

use App\Entity\BD;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BDType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genre')
            ->add('serie')
            ->add('title')
            ->add('image')
            ->add('author')
            ->add('edition')
            ->add('collection')
            ->add('creation_date')
            ->add('owned_bd_date')
            ->add('value')
            ->add('price')
            ->add('comment')
            ->add('ISBN')
            ->add('on_loan')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BD::class,
        ]);
    }
}
