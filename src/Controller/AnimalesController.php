<?php

namespace App\Controller;

use App\Entity\Ficha;
use App\Entity\Animales;
use App\Form\AnimalesType;
use App\Repository\AnimalesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/animales')]
class AnimalesController extends AbstractController
{
    #[Route('/', name: 'animales_index', methods: ['GET'])]
    public function index(AnimalesRepository $animalesRepository): Response
    {
        return $this->render('animales/index.html.twig', [
            'animales' => $animalesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'alta_animal', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $animale = new Animales();
        $ficha = new Ficha();
        $form = $this->createForm(AnimalesType::class, $animale);
       /*  $form1 = $this->createForm(FichaType::class, $ficha); */
        $form->handleRequest($request); 
        /* $form1->handleRequest($request);  */

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $ficha->setEstado(true);
            $ficha->setEsterilizado(false);
            $ficha->setAnimal($animale);
            $entityManager->persist($ficha);
            $entityManager->persist($animale);
            $entityManager->flush();

            return $this->redirectToRoute('animales_index');
        }

        return $this->render('animales/new.html.twig', [
            'animale' => $animale,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'animales_show', methods: ['GET'])]
    public function show(Animales $animale): Response
    {
        return $this->render('animales/show.html.twig', [
            'animale' => $animale,
        ]);
    }

    #[Route('/{id}/edit', name: 'animales_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Animales $animale): Response
    {
        $form = $this->createForm(AnimalesType::class, $animale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('animales_index');
        }

        return $this->render('animales/edit.html.twig', [
            'animale' => $animale,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'animales_delete', methods: ['POST'])]
    public function delete(Request $request, Animales $animale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($animale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('animales_index');
    }
}
