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
            'controller_name' => 'Página Principal de Bienvenida',
        ]);
    }
}
