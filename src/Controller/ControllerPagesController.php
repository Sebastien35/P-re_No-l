<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllerPagesController extends AbstractController
{
    #[Route('/controller/pages', name: 'app_controller_pages')]
    public function index(): Response
    {
        return $this->render('controller_pages/index.html.twig', [
            'controller_name' => 'ControllerPagesController',
        ]);
    }
}
