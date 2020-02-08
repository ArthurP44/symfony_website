<?php


namespace App\Controller;


use App\Repository\BDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(BDRepository $BDRepository): Response
    {
        $bds = $BDRepository->findByDate();
        $totalBd = $BDRepository->countBD();
        $totalAuthor = $BDRepository->countAuthor();
        $totalLoan = $BDRepository->countBD();
        $totalGenre = $BDRepository->countBdGenre();
        return $this->render('pages/home/homePage.html.twig', [
            'bds' => $bds,
            'total_bd' => $totalBd,
            'total_author' => $totalAuthor,
            'total_loan' => $totalLoan,
            'total_genre' => $totalGenre,
        ]);
    }
}