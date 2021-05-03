<?php

namespace App\Controller;

use App\Entity\Fichas;
use App\Form\FichasType;
use App\Repository\FichasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fichas')]
class FichasController extends AbstractController
{
    #[Route('/', name: 'fichas_index', methods: ['GET'])]
    public function index(FichasRepository $fichasRepository): Response
    {
        return $this->render('fichas/index.html.twig', [
            'fichas' => $fichasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'fichas_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $ficha = new Fichas();
        $form = $this->createForm(FichasType::class, $ficha);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficha);
            $entityManager->flush();

            return $this->redirectToRoute('fichas_index');
        }

        return $this->render('fichas/new.html.twig', [
            'ficha' => $ficha,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'fichas_show', methods: ['GET'])]
    public function show(Fichas $ficha): Response
    {
        return $this->render('fichas/show.html.twig', [
            'ficha' => $ficha,
        ]);
    }

    #[Route('/{id}/edit', name: 'fichas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fichas $ficha): Response
    {
        $form = $this->createForm(FichasType::class, $ficha);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fichas_index');
        }

        return $this->render('fichas/edit.html.twig', [
            'ficha' => $ficha,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'fichas_delete', methods: ['POST'])]
    public function delete(Request $request, Fichas $ficha): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficha->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ficha);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fichas_index');
    }
}
