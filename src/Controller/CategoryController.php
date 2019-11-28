<?php


namespace App\Controller;


use App\Repository\BDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category_list")
     */
    public function listGenre(BDRepository $BDRepository): Response
    {
        return $this->render('pages/category/categoryIndex.html.twig', [
            'bds' => $BDRepository->findByGenre()
        ]);
    }

}