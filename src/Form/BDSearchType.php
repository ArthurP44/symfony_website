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
        $authors = $this->BDRepository->findByAuthor();
        $genres = $this->BDRepository->findByGenre();
        $series = $this->BDRepository->findBySerie();
        var_dump($authors);
        /*$this->BDRepository->findByAuthor()*/

        $builder
            ->add('auteur', ChoiceType::class, [
                'required' => false,
                'label' => 'Auteur :',
                'placeholder' => 'Choisissez un Auteur',
                'choices' => $authors,
            ])
            ->add('categorie', ChoiceType::class, [
                'required' => false,
                'label' => 'Genre :',
                'placeholder' => 'Choisissez un Genre',
                'choices' => $genres,
            ])
            ->add('serie', ChoiceType::class, [
                'required' => false,
                'label' => 'Série :',
                'placeholder' => 'Choisissez une Série',
                'choices' => $series,
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
