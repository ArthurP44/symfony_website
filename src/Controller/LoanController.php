<?php


namespace App\Controller;

use App\Repository\BDRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoanController extends AbstractController
{
    /**
     * @Route("/borrow", name="borrow_list")
     */
    public function borrowedBdList(BDRepository $BDRepository): Response
    {
        return $this->render('pages/borrow/borrowIndex.html.twig', [
            'bds' => $BDRepository->isBorrowed()
        ]);
    }
}