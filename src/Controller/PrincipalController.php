<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    #[Route('/principal', name: 'principal')]
    public function index(): Response
    {
        return $this->render('principal/index.html.twig', [
            'controller_name' => 'Bienvenido a Protectora S.O.N.P',
        ]);
    }
    #[Route('/dashbord', name: 'inicio')]
    public function inicio(): Response
    {
        return $this->render('principal/index1.html.twig', [
            'controller_name' => 'Bienvenido a Protectora S.O.N.P',
        ]);
    }
}
