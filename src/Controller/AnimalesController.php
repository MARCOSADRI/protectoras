<?php

namespace App\Controller;

use App\Entity\Fichas;
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
/* LISTAR ANIMALES SIN ADOPTAR */
    #[Route('/', name: 'animales_disponibles', methods: ['GET'])]
    public function index(AnimalesRepository $animalesRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('animales/index.html.twig', [
            'animales' => $animalesRepository->findByDisponible(),
        ]);
    }

/* LISTA TODOS los Animales */
    #[Route('/listado', name: 'animales_listado', methods: ['GET'])]
    public function listado(AnimalesRepository $animalesRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
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
           // Recogemos el fichero de la Foto
            $file=$form['foto']->getData();
            // Sacamos la extensión del fichero
            $ext=$file->guessExtension();   
            // Le ponemos un nombre al fichero
            $file_name=time().".".$ext;  
            // Guardamos el fichero en el directorio img que estará en el directorio /public del framework
            $file->move("img", $file_name);
            // Establecemos el nombre de fichero en el atributo de la entidad
            $animale->setFoto($file_name);
            $entityManager = $this->getDoctrine()->getManager();
        /* Inicializa/Crea la Ficha con Datos Predeterminados */
            $ficha->setFallecido(false);/* ---------------- SE ELIMINARÁ --------- */
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
/*Muestra Detalle del Animal */
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
        // Recogemos el fichero de la Foto
            $file=$form['foto']->getData();
        // Sacamos la extensión del fichero
            $ext=$file->guessExtension();   
        // Le ponemos un nombre al fichero
            $file_name=time().".".$ext;  
        // Guardamos el fichero en el directorio img que estará en el directorio /public del framework
            $file->move("img", $file_name);
        // Establecemos el nombre de fichero en el atributo de la entidad
            $animale->setFoto($file_name);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('animales_listado');
        }
 
        return $this->render('animales/edit.html.twig', [
            'animale' => $animale,
            'form' => $form->createView(),
        ]);
    }

/* Adoptar el Animal*/ 
    #[Route('/{id}', name: 'animales_adoptar', methods: ['POST'])]
    public function adoptarAnimales(Request $request, Animales $animale): Response
    {
        $user = $this->getUser(); //OBTENGO AL USUARIO ACTUALMENTE LOGUEADO
        if ($this->isCsrfTokenValid('adoptar'.$animale->getId(), $request->request->get('_token'))) {
           $animale->setAdoptador($user);
           $this->getDoctrine()->getManager()->flush();
        }

       return $this->redirectToRoute('animales_disponibles');
    }
/* Eliminar el Animal */
    #[Route('/{id}', name: 'animales_delete', methods: ['POST'])]
    public function delete(Request $request, Animales $animale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($animale);
            $entityManager->flush();
        }
        return $this->redirectToRoute('animales_listado');
    }

}
