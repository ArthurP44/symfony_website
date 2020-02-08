<?php

namespace App\Form;

use App\Entity\BD;
use App\Entity\BDSearch;
use App\Repository\BDRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BDSearchType extends AbstractType
{
    private $BDRepository;

    public function __construct(BDRepository $BDRepository)
    {
        $this->BDRepository = $BDRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$this->BDRepository->findByAuthor()*/

        $builder
            ->add('auteur', EntityType::class, [
                'class' => BD::class,
                'required' => false,
                'label' => 'Auteur :',
                'placeholder' => 'Choisissez un Auteur',
                'choice_label' => 'author',
            ])
            ->add('categorie', EntityType::class, [
                'class' => BD::class,
                'required' => false,
                'label' => 'Genre :',
                'placeholder' => 'Choisissez un Genre',
                'choice_label' => 'genre',
            ])
            ->add('serie', EntityType::class, [
                'class' => BD::class,
                'required' => false,
                'label' => 'Série :',
                'placeholder' => 'Choisissez une Série',
                'choice_label' => 'serie',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BDSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }
}
