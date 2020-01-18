<?php


namespace App\Controller;


use App\Repository\BDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/author", name="author_list")
     */
    public function listAuthor(BDRepository $BDRepository) : Response
    {
        return $this->render('pages/author/authorIndex.html.twig', [
            'bds' => $BDRepository->findByAuthor()
        ]);
    }

    public function showComicsByAuthor(BDRepository $BDRepository) : Response
    {
        return $this->render('pages/author/authorIndex.html.twig', [
            'bds' => $BDRepository->findAllByAuthor()
        ]);
    }
}