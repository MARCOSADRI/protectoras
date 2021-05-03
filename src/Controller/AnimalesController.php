<?php

namespace App\Controller;

use App\Entity\Fichas;
use App\Entity\Animales;
use App\Entity\Especies;
use App\Form\AnimalesType;
use App\Repository\AnimalesRepository;
use App\Repository\EspeciesRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/animales')]
class AnimalesController extends AbstractController
{
    #[Route('/', name: 'animales_disponibles', methods: ['GET'])]
    public function index(AnimalesRepository $animalesRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('animales/index.html.twig', [
            'animales' => $animalesRepository->findAll(),/* SIN ADOPTAR */
        ]);
    }

/* LISTA TODOS los Animales */
    #[Route('/listado', name: 'animales_listado', methods: ['GET'])]
    public function listado(AnimalesRepository $animalesRepository): Response
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
        $ficha = new Fichas();
        $form = $this->createForm(AnimalesType::class, $animale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
        /* Inicializa/Crea la Ficha con Datos Predeterminados */
            $ficha->setFallecido(false);
            $ficha->setEsterilizado(false);
            $entityManager->persist($ficha);
            $animale->setFicha($ficha);
            $entityManager->persist($animale);
            $entityManager->flush();

            return $this->redirectToRoute('animales_listado');
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

            return $this->redirectToRoute('animales_listado');
        }

        return $this->render('animales/edit.html.twig', [
            'animale' => $animale,
            'form' => $form->createView(),
        ]);
    }
/* FALLECIDO */
    #[Route('/{id}', name: 'animales_delete', methods: ['POST'])]
    public function delete(Request $request, Animales $animale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
             /* $entityManager->remove($animale); */
             $animale->getFicha()->setFallecido(true);
            $entityManager->flush();
        }

        return $this->redirectToRoute('animales_listado');
    }


    /** Filtrar / Buscar Animal según Características
     * 
     * @Route("/buscador", name="app_buscador")
     */
    public function buscarAnimal (int $e, int $r, int $t, int $s, int $ed, AnimalesRepository $animalesRepository)
    { 
        $especie=$animalesRepository->find($e);
        $raza=$animalesRepository->find($r);
        $tamano=$animalesRepository->find($t);
        $sexo=$animalesRepository->find($s);
        $edad=$animalesRepository->find($ed);

          return $this->render('animales/listaFiltrada.html.twig', [
            'animal' => $animal,

        ]); 
    }




}
