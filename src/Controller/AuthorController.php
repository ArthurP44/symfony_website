<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/author", name="app.author")
     */
    public function showAuthor(): Response
    {
        return $this->render('pages/author/authorIndex.html.twig');
    }

}