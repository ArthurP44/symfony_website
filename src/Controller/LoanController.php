<?php


namespace App\Controller;

use App\Repository\BDRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoanController extends AbstractController
{
    /**
     * @var BDRepository
     */
    private $repository;

    public function __construct(BDRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/borrow", name="borrow_list")
     */
    public function borrowedBdList(Request $request, PaginatorInterface $paginator): Response
    {
        $totalGenre = $this->repository->countBdOnLoan();

        $bds = $paginator->paginate(
            $this->repository->isBorrowed(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('pages/borrow/borrowIndex.html.twig', [
            'bds' => $bds,
            'total_on_loan' => $totalGenre,
        ]);
    }
}