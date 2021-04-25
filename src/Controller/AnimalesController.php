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
/* Muestra Animales DISPONIBLES para ADOPTAR */
    #[Route('/', name: 'animales_disponibles', methods: ['GET'])]
    public function disponibles(AnimalesRepository $animalesRepository): Response
    {
        return $this->render('animales/index.html.twig', [
            'animales' => $animalesRepository->listadoSinAdoptar(),
        ]);
    }
/* LISTA TODOS los Animales */
    #[Route('/listado', name: 'animales_listado', methods: ['GET'])]
    public function index(AnimalesRepository $animalesRepository): Response
    {
        return $this->render('animales/index.html.twig', [
            'animales' => $animalesRepository->findAll(),
        ]);
    }
/*ALTA Nuevo Animal y Su Ficha */
    #[Route('/new', name: 'alta_animal', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $animale = new Animales();
    /*Nueva Ficha se creará simultaneamente con Animal */
        $ficha = new Ficha();
        $form = $this->createForm(AnimalesType::class, $animale);
        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
    /* Inicializa/Crea la Ficha con Datos Predeterminados */
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
/*Muestra Detalle del Animal a Adoptar */
    #[Route('/{id}', name: 'animales_show', methods: ['GET'])]
    public function show(Animales $animale): Response
    {
        return $this->render('animales/show.html.twig', [
            'animale' => $animale,
        ]);
    }
/*EDITA el Animal */
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
/* FALLECIDO */
    #[Route('/{id}', name: 'animales_delete', methods: ['POST'])]
    public function delete(Request $request, Animales $animale, Ficha $ficha): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            /* $entityManager->remove($animale); */
                $animale->getFicha()->setEstado(false);
                $entityManager->flush();



            $entityManager->flush();
        }

        return $this->redirectToRoute('animales_listado');
    }
}
