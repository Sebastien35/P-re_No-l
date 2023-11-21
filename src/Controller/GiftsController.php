<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GiftsController extends AbstractController
{
    #[Route('/gifts', name: 'app_gifts')]
    public function index(): Response
    {
        return $this->render('gifts/index.html.twig', [
            'controller_name' => 'GiftsController',
        ]);
    }
}
