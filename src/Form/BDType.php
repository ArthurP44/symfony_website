<?php

namespace App\Form;

use App\Entity\BD;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BDType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genre',TextType::class, [
                'label' => 'Genre :'
            ])
            ->add('serie',TextType::class, [
                'label' => 'Série :',
                'required' => false
            ])
            ->add('title',TextType::class, [
                'label' => 'Titre :'
            ])
            ->add('image',FileType::class, [
                'label' => 'Couverture :',
                'required' => false
            ])
            ->add('author',TextType::class, [
                'label' => 'Auteur :'
            ])
            ->add('edition',TextType::class, [
                'label' => 'Édition :',
                'required' => false
            ])
            ->add('collection',TextType::class, [
                'label' => 'Collection :',
                'required' => false
            ])
            ->add('creation_date',DateType::class, [
                'label' => 'Date de création :',
                'required' => false
            ])
            ->add('owned_bd_date',DateType::class, [
                'label' => 'Date de mon exemplaire :',
                'required' => false
            ])
            ->add('value',IntegerType::class, [
                'label' => 'Cote :',
                'required' => false
            ])
            ->add('price',IntegerType::class, [
                'label' => 'Prix :',
                'required' => false
            ])
            ->add('comment',TextType::class, [
                'label' => 'Commentaire :',
                'required' => false
            ])
            ->add('ISBN',TextType::class, [
                'label' => 'ISBN :',
                'required' => false
            ])
            ->add('on_loan',CheckboxType::class, [
                'label' => 'En prêt',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BD::class,
        ]);
    }
}
