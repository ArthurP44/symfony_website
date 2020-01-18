<?php

namespace App\Controller;

use App\Entity\BD;
use App\Form\BDType;
use App\Repository\BDRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bd")
 */
class BDController extends AbstractController
{
    /**
     * @Route("/index", name="bd_index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(BDRepository $bDRepository): Response
    {
        return $this->render('bd/index.html.twig', [
            'bds' => $bDRepository->findBD(),
        ]);
    }

    /**
     * @Route("/new", name="bd_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $bD = new BD();
        $form = $this->createForm(BDType::class, $bD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bD);
            $entityManager->flush();

            return $this->redirectToRoute('bd_index');
        }

        return $this->render('bd/new.html.twig', [
            'bd' => $bD,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bd_show", methods={"GET"})
     */
    public function show(BD $bD): Response
    {
        return $this->render('bd/show.html.twig', [
            'bd' => $bD,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bd_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, BD $bD): Response
    {
        $form = $this->createForm(BDType::class, $bD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bd_index');
        }

        return $this->render('bd/edit.html.twig', [
            'bd' => $bD,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bd_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, BD $bD): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bD->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bD);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bd_index');
    }
}
