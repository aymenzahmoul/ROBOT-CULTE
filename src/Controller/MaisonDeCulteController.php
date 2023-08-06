<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MaisonDeCulteController extends AbstractController
{
    #[Route('/maison/de/culte', name: 'app_maison_de_culte')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MaisonDeCulteController.php',
        ]);
    }
}
